@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Admin</h5>
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_admin" class="form-label">Nama Admin</label>
                                <input type="text" name="nama_admin" class="form-control" id="nama_admin" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" id="no_telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_pegawai" class="form-label">Nomor Pegawai</label>
                                <input type="text" name="nomor_pegawai" class="form-control" id="nomor_pegawai" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Upload Foto</label>
                                <input type="file" name="foto" class="form-control" id="foto" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
