@extends("layout.perusahaan.perusahaan")

@section("content")

<div class="container mt-5">
    <div class="card shadow border-0 position-relative">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-person-badge-fill"></i> Profil Perusahaan</h5>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset("storage") }}/{{ auth()->guard("perusahaan")->user()->perusahaanProfile->logo }}" alt="Logo Perusahaan" class="rounded-circle shadow border" width="150" height="150">
                <h4 class="mt-3">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->nama_perusahaan }}</h4>
                @if (auth()->guard("perusahaan")->user()->perusahaanProfile->status === "terkonfirmasi")
                     <span class="badge bg-success">Terkonfirmasi</span>
                @else
                     <span class="badge bg-danger">Belum terkonfirmasi</span>
                @endif
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <h6 class="fw-semibold">Pemilik:</h6>
                    <p class="text-dark">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->pemilik ?? "" }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-semibold">Nomor Izin Usaha:</h6>
                    <p class="text-dark">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->nomor_izin_usaha ?? "-"}}</p>
                </div>
                <div class="col-md-12">
                    <h6 class="fw-semibold">Alamat:</h6>
                    <p class="text-dark">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->alamat }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-semibold">Website:</h6>
                    <p><a href="{{ auth()->guard("perusahaan")->user()->perusahaanProfile->website ?? "" }}" target="_blank" class="text-dark">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->website ?? "" }}</a></p>
                </div>
                <div class="col-md-12">
                    <h6 class="fw-semibold">Deskripsi Perusahaan:</h6>
                    <p class="text-dark">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->deskripsi }}</p>
                </div>
                <div class="col-md-12">
                    <h6 class="fw-semibold">File Bukti Legalitas (PDF):</h6>
                    <a href="#" class="btn btn-outline-primary btn-sm" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i> Lihat Dokumen
                    </a>
                </div>
            </div>

            <!-- Tombol Edit Profil -->
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route("perusahaan.myprofile.edit") }}" class="btn btn-warning shadow-sm">
                    <i class="bi bi-pencil-square"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
