@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Siswa Aktif</h5>
            <!-- Search Form -->
            <form method="GET" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama siswa, NIS, atau sekolah..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data siswa akan ditampilkan di sini -->
                        @forelse ($siswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->user_profile->sekolah->nama_sekolah ?? "-" }}</td>
                            <td>{{ $item->user_profile->nis }}</td>
                            <td>{{ $item->user_profile->kelas }}</td>
                            <td>{{ $item->lamaran()->where("status","selesai")->first()->status ?? "Belum PKL" }}</td>
                            <td>
                                <form action="{{ route('admin.siswa.aktif.detail', $item->id) }}" method="get" class="d-inline">
                                    <button type="submit" class="btn btn-info btn-sm">Detail</button>
                                </form>
                                <form action="{{ route('admin.siswa.aktif.hapus', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm btn-konfirmasi">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data siswa aktif</td>
                            </tr>
                        @endforelse
                            {{ $siswa->links("pagination::bootstrap-5") }}
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