@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <!-- Card Daftar Admin -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Admin</h5>
            <!-- Search Form -->
            <form method="GET" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="admin" class="form-control" placeholder="Cari nama admin, email, atau nomor telepon..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Nomor pegawai</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data admin akan ditampilkan di sini -->
                        @foreach ($admin as $min)


                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $min->profile->name }}</td>
                            <td>{{ $min->profile->nomor_pegawai }}</td>
                            <td>{{ $min->profile->email }}</td>
                            <td>{{ $min->profile->phone ?? "-" }}</td>
                            <td>
                                <img src="{{ asset('storage') }}/{{ $min->profile->foto ?? "" }}" alt="Foto Andi Pratama" width="50">
                            </td>
                            <td>
                                <form action="{{ route("admin.ubah.role",[$min->id,"super_admin"]) }}" method="post">
                                    @csrf
                                    <button type="button" class="btn btn-warning btn-sm btn-konfirmasi-role">Ubah jadi Superadmin</button>
                                </form>
                                <form action="{{ route("admin.hapus.admin.aksi",$min->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-konfirmasi" >Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{ $admin->links("pagination::bootstrap-5") }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Card Daftar Super Admin -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Super Admin</h5>
            <!-- Search Form -->
            <form method="GET" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="superadmin" class="form-control" placeholder="Cari nama super admin, email, atau nomor telepon..." value="{{ request('search_superadmin') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Super Admin</th>
                            <th>Nomor Pegawai</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data super admin akan ditampilkan di sini -->
                        @foreach ($superadmin as $min)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $min->profile->name }}</td>
                            <td>{{ $min->profile->nomor_pegawai }}</td>
                            <td>{{ $min->profile->email }}</td>
                            <td>{{ $min->profile->phone }}</td>
                            <td>
                                <img src="{{ asset('storage') }}/{{ $min->profile->foto ?? "" }}" alt="" width="50">
                            </td>
                            <td>
                                <form action="{{ route("admin.ubah.role",[$min->id,"admin"]) }}" method="post">
                                    @csrf
                                    <button type="button" class="btn btn-primary btn-sm btn-konfirmasi-role-admin">Ubah jadi Admin</button>
                                </form>
                            </td>
                        </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push("script")
    <script>
  document.querySelectorAll('.btn-konfirmasi').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data ini tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

document.querySelectorAll('.btn-konfirmasi-role').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Ubah Role Admin?",
            text: "Apakah kamu yakin ingin menjadikan admin ini sebagai Superadmin?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, ubah!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
document.querySelectorAll('.btn-konfirmasi-role-admin').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Ubah Role Admin?",
            text: "Apakah kamu yakin ingin menjadikan admin ini sebagai Admin?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, ubah!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

    </script>
@endpush
