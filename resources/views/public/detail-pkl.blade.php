@extends("layout.public.public")

@push("style")
<style>
  section.detail-section {
    background-image: url('../lgn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding-top: 5rem;
  }
</style>
@endpush

@section("content")

<section class="py-5 bg-light detail-section">
  <div class="container" data-aos="fade-up">

    <!-- Tombol kembali -->
    <a href="{{ route("public.daftar.pkl") }}" class="btn btn-secondary mb-3">
      <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <div class="card shadow-sm border-0">
      <div class="card-body px-4 py-5">

        <!-- Header -->
        <div class="d-flex align-items-start gap-3 mb-4">
          <img src="{{ asset('storage') }}/{{ $lowongan->perusahaan->perusahaanProfile->logo }}" alt="Logo Perusahaan" class="rounded-circle border shadow-sm" width="70" height="70">
          <div>
            <h4 class="fw-bold mb-1">{{ $lowongan->perusahaan->perusahaanProfile->nama_perusahaan }}</h4>
            <p class="text-muted mb-0">{{ $lowongan->perusahaan->perusahaanProfile->alamat }}</p>
          </div>
        </div>

        <!-- Info Utama -->
        <div class="row g-4 mb-4">
          <div class="col-md-6">
            <p class="mb-1"><i class="bi bi-mortarboard me-2"></i><strong>Jurusan Diterima:</strong> {{ $lowongan->jurusan->singkatan }}</p>
            <p class="mb-1"><i class="bi bi-people me-2"></i><strong>Kuota:</strong> {{ $lowongan->kuota }} siswa</p>
            <p class="mb-1"><i class="bi bi-check-circle me-2"></i><strong>Status:</strong> <span class="badge bg-success">Tersedia</span></p>
          </div>
          <div class="col-md-6">
            <p class="mb-1"><i class="bi bi-envelope me-2"></i><strong>Email:</strong> {{ $lowongan->perusahaan->email }}</p>
            <p class="mb-1"><i class="bi bi-telephone me-2"></i><strong>Telepon:</strong> {{ $lowongan->perusahaan->perusahaanProfile->telepon }}</p>
            <p class="mb-1"><i class="bi bi-globe me-2"></i><strong>Website:</strong> <a href="#" target="_blank">{{ $lowongan->perusahaan->perusahaanProfile->website }}</a></p>
          </div>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
          <h5 class="fw-semibold">Deskripsi Perusahaan</h5>
          <p class="text-muted mb-0">
            {{ $lowongan->deskripsi_lowongan }}
          </p>
        </div>

        <!-- Syarat -->
        <div class="mb-4">
          <h5 class="fw-semibold">Syarat Pendaftaran</h5>
          <ul class="text-muted">
            @foreach ($lowongan->syarat as $syarat)
                <li>{{ $syarat->isi_syarat }}</li>
            @endforeach
          </ul>
        </div>

        <!-- Tombol Ajukan -->
        <div class="text-end mt-4">
          <a href="form-pendaftaran.html" class="btn btn-primary px-4">
            <i class="bi bi-send me-2"></i> Ajukan PKL Sekarang
          </a>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection
