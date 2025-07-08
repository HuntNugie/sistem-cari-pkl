<section id="daftar" class="section bg-light py-5">
  <div class="container section-title" data-aos="fade-up">
    <h2>Tempat PKL Tersedia</h2>
    <p>Daftar lowongan PKL dari berbagai perusahaan sesuai jurusan</p>
  </div>
  <div class="container">
    <div class="row gy-4">

      <!-- Card PKL -->
        @foreach ($lowongans as $lowongan)

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-3">
            <div class="d-flex align-items-start gap-3 mb-3">
              <img src="{{ asset("storage") }}/{{ $lowongan->perusahaan->perusahaanProfile->logo ?? "-" }}" alt="Foto Perusahaan" class="rounded-circle border shadow-sm" width="60" height="60">
              <div>
                <h6 class="mb-1 fw-bold">{{ $lowongan->perusahaan->perusahaanProfile->nama_perusahaan }}</h6>
                <span class="badge bg-success">{{ $lowongan->status }}</span>
                <p class="mb-0 small text-muted">{{ $lowongan->jurusan->singkatan }} | Kuota: {{ $lowongan->kuota }} siswa</p>
            </div>
        </div>
        <h6 class="fw-semibold mb-2">{{ $lowongan->judul_lowongan }}</h6>

        <p class="mb-2 small text-muted">
            <i class="bi bi-envelope-fill me-1"></i> {{ $lowongan->perusahaan->email }}
        </p>

        <p class="mb-2 small">
            <i class="bi bi-geo-alt-fill me-1"></i> {{ $lowongan->perusahaan->perusahaanProfile->alamat }}
        </p>

        <p class="small mb-3">{{ Str::limit($lowongan->deskripsi_lowongan, 100, '...') }}</p>

        <a href="{{ route("public.detail.pkl",$lowongan->id) }}" class="btn btn-outline-primary btn-sm w-100">
            <i class="bi bi-search"></i> Lihat Detail
        </a>
    </div>
</div>
</div>
@endforeach


      <!-- Tambahkan lebih banyak card seperti ini jika perlu -->

    </div>

    <div class="text-center mt-5">
      <a href="{{ route("public.daftar.pkl") }}" class="btn btn-secondary px-4">
        <i class="bi bi-arrow-right-circle"></i> Lihat Semua Lowongan
      </a>
    </div>
  </div>
</section>
