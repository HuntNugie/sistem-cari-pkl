@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Siswa Sedang PKL</h5>
            <!-- Search Form -->
            <form class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari nama siswa, sekolah, atau tempat PKL...">
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
                            <th>Tempat PKL</th>
                            <th>Jenis Kelamin</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data siswa PKL akan ditampilkan di sini -->
                        <tr>
                            <td>1</td>
                            <td>Nama Siswa</td>
                            <td>SMK Negeri 1</td>
                            <td>PT. Maju Jaya</td>
                            <td>Laki-laki</td>
                            <td>
                                <button class="btn btn-info btn-sm">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nama Siswa 2</td>
                            <td>SMK Negeri 2</td>
                            <td>CV. Sukses Bersama</td>
                            <td>Perempuan</td>
                            <td>
                                <button class="btn btn-info btn-sm">Detail</button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
@endsection
