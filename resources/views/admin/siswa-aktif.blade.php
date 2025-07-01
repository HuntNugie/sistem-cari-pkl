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
                        <tr>
                            <td>1</td>
                            <td>Nama Siswa</td>
                            <td>Asal Sekolah</td>
                            <td>123456</td>
                            <td>XII IPA 1</td>
                            <td>Laki-laki</td>
                            <td>
                                <button class="btn btn-info btn-sm">Detail</button>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nama Siswa 2</td>
                            <td>Asal Sekolah 2</td>
                            <td>654321</td>
                            <td>XII IPS 2</td>
                            <td>Perempuan</td>
                            <td>
                                <button class="btn btn-info btn-sm">Detail</button>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
