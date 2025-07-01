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
                    <input type="text" name="search" class="form-control" placeholder="Cari nama admin, email, atau nomor telepon..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data admin akan ditampilkan di sini -->
                        <tr>
                            <td>1</td>
                            <td>Andi Pratama</td>
                            <td>andi@email.com</td>
                            <td>081234567890</td>
                            <td>
                                <img src="{{ asset('images/admin1.png') }}" alt="Foto Andi Pratama" width="50">
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm">Ubah jadi Superadmin</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dewi Lestari</td>
                            <td>dewi@email.com</td>
                            <td>082345678901</td>
                            <td>
                                <img src="{{ asset('images/admin2.png') }}" alt="Foto Dewi Lestari" width="50">
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm">Ubah jadi Superadmin</button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
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
                    <input type="text" name="search_superadmin" class="form-control" placeholder="Cari nama super admin, email, atau nomor telepon..." value="{{ request('search_superadmin') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Super Admin</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data super admin akan ditampilkan di sini -->
                        <tr>
                            <td>1</td>
                            <td>Sri Wahyuni</td>
                            <td>sri@email.com</td>
                            <td>083456789012</td>
                            <td>
                                <img src="{{ asset('images/superadmin1.png') }}" alt="Foto Sri Wahyuni" width="50">
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm">Ubah jadi Admin</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Rizal Hakim</td>
                            <td>rizal@email.com</td>
                            <td>084567890123</td>
                            <td>
                                <img src="{{ asset('images/superadmin2.png') }}" alt="Foto Rizal Hakim" width="50">
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-sm">Ubah jadi Admin</button>
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
