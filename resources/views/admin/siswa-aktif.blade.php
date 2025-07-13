@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Siswa Aktif</h5>
            <!-- Search Form -->
            <form method="GET" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama siswa, NIS, atau kelas..." value="{{ request('search') }}">
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
                            <th>Jenis Kelamin</th>
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
                            <td>{{ $item->user_profile->jenis_kelamin }}</td>
                            <td>
                                <button class="btn btn-info btn-sm">Detail</button>
                                <button class="btn btn-danger btn-sm">Hapus</button>
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
