@extends("layout.admin.admin")

@section("content")
<div class="container-fluid">
    <div class="card shadow-lg border-0 mb-5 w-100" style="min-height: 480px; background: linear-gradient(135deg, #0d6efd 0%, #20c997 100%); color: #fff;">
        <div class="card-body h-100 d-flex align-items-center">
            <div class="row align-items-center w-100">
    <div class="card shadow-lg border-0 mb-5 w-100" style="min-height: 480px; background: linear-gradient(135deg, #0d6efd 0%, #20c997 100%); color: #fff;">
        <div class="card-body h-100 d-flex align-items-center">
            <div class="row align-items-center w-100">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset("storage") }}/{{ Auth::guard("admin")->user()->profile->foto ?? 'images/default-profile.png' }}" alt="Foto Profil" class="rounded-circle border border-3 border-light shadow" width="170" height="170">
                        <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-success border border-light rounded-circle">
                            <i class="bi bi-check-circle-fill text-white"></i>
                        </span>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-light text-primary px-3 py-2 fs-6 shadow-sm">Admin Aktif</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <h5 class="card-title fw-bold mb-4" style="letter-spacing:1px;">
                        <i class="bi bi-person-badge me-2"></i>Profil Admin
                    </h5>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center bg-white bg-opacity-10 rounded p-3 shadow-sm">
                                <i class="bi bi-person-circle fs-3 me-3 text-warning"></i>
                                <div>
                                    <div class="fw-semibold small text-uppercase">Username</div>
                                    <div class="fs-5">{{ Auth::guard("admin")->user()->username ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center bg-white bg-opacity-10 rounded p-3 shadow-sm">
                                <i class="bi bi-person-lines-fill fs-3 me-3 text-info"></i>
                                <div>
                                    <div class="fw-semibold small text-uppercase">Nama</div>
                                    <div class="fs-5">{{ Auth::guard("admin")->user()->profile->name ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center bg-white bg-opacity-10 rounded p-3 shadow-sm">
                                <i class="bi bi-telephone-fill fs-3 me-3 text-success"></i>
                                <div>
                                    <div class="fw-semibold small text-uppercase">No Telepon</div>
                                    <div class="fs-5">{{ Auth::guard("admin")->user()->profile->phone ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center bg-white bg-opacity-10 rounded p-3 shadow-sm">
                                <i class="bi bi-credit-card-2-front-fill fs-3 me-3 text-danger"></i>
                                <div>
                                    <div class="fw-semibold small text-uppercase">Nomor Pegawai</div>
                                    <div class="fs-5">{{ Auth::guard("admin")->user()->profile->nomor_pegawai ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route("admin.myprofile.edit") }}" class="btn btn-warning px-4 shadow-sm">
            <i class="bi bi-pencil-square"></i> Edit Profil
        </a>
        <!-- Tombol untuk membuka modal -->
        <button type="button" class="btn btn-info px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalPerbesarFoto">
            <i class="bi bi-arrows-fullscreen"></i> Perbesar Foto
        </button>
    </div>
</div>

<!-- Modal Bootstrap untuk perbesar foto -->
<div class="modal fade" id="modalPerbesarFoto" tabindex="-1" aria-labelledby="modalPerbesarFotoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-center">
        <img src="{{ asset("storage") }}/{{ Auth::guard("admin")->user()->profile->foto ?? 'images/default-profile.png' }}" alt="Foto Profil" class="img-fluid rounded shadow" style="max-height: 400px;">
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection
