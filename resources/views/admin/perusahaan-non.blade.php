@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Perusahaan Belum Terkonfirmasi</h5>
            <!-- Search Form -->
            <form method="GET" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama perusahaan, nomor izin, atau pemilik..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Nomor Izin Usaha</th>
                            <th>Pemilik</th>
                            <th>No Telepon</th>
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data perusahaan akan ditampilkan di sini -->
                        @foreach ($perusahaan as $non)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $non->nama_perusahaan }}</td>
                            <td>{{ $non->nomor_izin_usaha }}</td>
                            <td>{{ $non->pemilik }}</td>
                            <td>{{ $non->telepon }}</td>
                            <td>
                                <img src="{{ asset("storage") }}/{{ $non->logo ?? "-" }}" alt="Logo PT Maju Jaya" width="50">
                            </td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <form action="{{ route('admin.perusahaan.hapus', $non->perusahaan_id) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="button" class="btn btn-danger btn-sm btn-konfirmasi">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        {{ $perusahaan->links("pagination::bootstrap-5") }}
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
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
    </script>
@endpush