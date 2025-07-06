@extends("layout.admin.admin")

@section("content")
<div class="container-fluid">
    <div class="card shadow-lg border-0 mb-5 w-100" style="min-height: 480px; background: linear-gradient(135deg, #0d6efd 0%, #20c997 100%); color: #fff;">
        <div class="card-body h-100 d-flex align-items-center">
            <div class="row align-items-center w-100">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="rounded-circle border border-3 border-light shadow" width="170" height="170">
                        <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-success border border-light rounded-circle">
                            <i class="bi bi-check-circle-fill text-white"></i>
                        </span>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-light text-primary px-3 py-2 fs-6 shadow-sm">Admin Aktif</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <h5 class="card-title fw-bold mb-4 text-white" style="letter-spacing:1px;">
                        <i class="bi bi-person-badge me-2"></i>Edit Profil Admin
                    </h5>
                    <form action="{{ route('admin.myprofile.update', Auth::guard('admin')->user()->username) }}" method="post" enctype="multipart/form-data" class="text-white">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase">Username</label>
                                <input type="text" class="form-control bg-light text-dark" name="username" placeholder="Masukkan username" value="{{ Auth::guard('admin')->user()->username ?? '' }}" readonly disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase">Nama</label>
                                <input type="text" class="form-control bg-light text-dark" name="name" placeholder="Masukkan nama" value="{{ Auth::guard('admin')->user()->profile->name ?? '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase">No Telepon</label>
                                <input type="text" class="form-control bg-light text-dark" name="phone" placeholder="Masukkan no telepon" value="{{ Auth::guard('admin')->user()->profile->phone ?? '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold small text-uppercase">Nomor Pegawai</label>
                                <input type="text" class="form-control bg-light text-dark" name="nomor_pegawai" placeholder="Masukkan nomor pegawai" value="{{ Auth::guard('admin')->user()->profile->nomor_pegawai ?? '' }}">
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label fw-semibold small text-uppercase">Foto Profil</label>
                                <input type="file" class="form-control bg-light text-dark" name="foto" id="fotoInput" accept="image/*">
                                <div class="mt-3">
                                    <img id="previewImage" src="{{ asset('images/default-profile.png') }}" class="rounded shadow border mt-2" width="150" style="display: none;" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-light px-4 shadow-sm text-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route("admin.myprofile") }}" class="btn btn-outline-light px-4 shadow-sm">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("script")
<script>
    document.getElementById('fotoInput').addEventListener('change', function (e) {
        const preview = document.getElementById('previewImage');
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });
</script>
@endpush
