@extends("layout.public.public")

@section("content")
<div class="container pt-5" style="padding-top: 120px !important;">
    <div class="row justify-content-center">
        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Profil Siswa</h4>
                </div>
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=0D8ABC&color=fff&size=200" class="img-fluid rounded-circle shadow mb-3" alt="Foto Profil" style="width:120px;height:120px;object-fit:cover;">
                    <h5 class="fw-bold mb-1">{{ auth()->user()->name }}</h5>
                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                    <hr>
                    <div class="text-start ms-2">
                        <p class="mb-1"><strong>Asal Sekolah:</strong> {{ auth()->user()->user_profile->sekolah->nama_sekolah ?? '-' }}</p>
                        <p class="mb-1"><strong>Jurusan:</strong> {{ auth()->user()->user_profile->jurusan->nama_jurusan ?? '-' }}</p>
                        <p class="mb-1"><strong>Jenis Kelamin:</strong>{{auth()->user()->user_profile->jk}}</p>
                        <p class="mb-1"><strong>Telepon:</strong> {{auth()->user()->user_profile->telepon}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sertifikat PKL Card -->
        <div class="col-md-8 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Status PKL Selesai</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <span class="badge bg-success fs-6 mb-2">PKL Selesai</span>
                        <p class="mb-1"><b>Judul PKL:</b> {{ $lamaran->lowongan->judul_lowongan }}</p>
                        <p class="mb-1"><b>Perusahaan:</b> {{ $lamaran->lowongan->perusahaan->perusahaanProfile->nama_perusahaan }}</p>
                        <p class="mb-1"><b>Tanggal Selesai:</b> {{ $lamaran->updated_at->format("d F Y") }}</p>
                        <p class="mb-3">Selamat, Anda telah menyelesaikan PKL di perusahaan tersebut. Silakan cetak atau unduh sertifikat Anda melalui tombol di bawah ini.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="{{ route("public.pdf.lihat.sertifikat",$lamaran->id) }}" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak Sertifikat</a>
                        <a href="{{ route("public.pdf.download.sertifikat",$lamaran->id) }}" class="btn btn-success"><i class="bi bi-download"></i> Download Sertifikat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

