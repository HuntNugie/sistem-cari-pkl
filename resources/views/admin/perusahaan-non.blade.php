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
                        <tr>
                            <td>1</td>
                            <td>PT Maju Jaya</td>
                            <td>1234567890</td>
                            <td>Budi Santoso</td>
                            <td>081234567890</td>
                            <td>
                                <img src="{{ asset('images/logo1.png') }}" alt="Logo PT Maju Jaya" width="50">
                            </td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button class="btn btn-success btn-sm">Konfirmasi</button>
                                    <button class="btn btn-warning btn-sm">Tolak</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                    <button class="btn btn-info btn-sm">Detail</button>
                                </div>
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
