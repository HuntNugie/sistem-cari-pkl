@extends("layout.public.public")

@push("style")
<style>
  body {
    background-color: #f8f9fa;
  }
  main.main {
    padding-top: 80px;
  }
  .search-bar {
    max-width: 450px;
    margin: 0 auto 2rem auto;
  }
</style>
@endpush

@section("content")
<section class="py-5 bg-light">
  <div class="container" data-aos="fade-up">
    <a href="{{ route('beranda') }}#daftar" class="btn btn-secondary mb-4">
      <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>
    <h2 class="mb-4 text-center">Daftar Tempat PKL</h2>

    <!-- Search Bar -->
    <form class="search-bar mb-5">
      <div class="input-group shadow-sm">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari nama perusahaan, jurusan, atau kota...">
        <button class="btn btn-primary" type="button" id="searchBtn">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </form>

    <!-- List PKL Cards -->
    <div class="row" id="pklList">

      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6 mb-4 pkl-item">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body p-3">
            <div class="d-flex align-items-start gap-3 mb-3">
              <img src="img/perusahaan1.jpg" alt="Foto Perusahaan" class="rounded-circle border shadow-sm" width="60" height="60">
              <div>
                <h6 class="mb-1 fw-bold">PT. Software Nusantara</h6>
                <span class="badge bg-success">Tersedia</span>
                <p class="mb-0 small text-muted">Kuota: 5 siswa | RPL, TKJ</p>
              </div>
            </div>
            <h6 class="fw-semibold mb-2">Frontend Developer Intern</h6>
            <p class="mb-1 small text-muted">
              <i class="bi bi-envelope-fill me-1"></i> hrd@nusantara.com
            </p>
            <p class="mb-2 small">
              <i class="bi bi-geo-alt-fill me-1"></i> Bandung, Jawa Barat
            </p>
            <p class="small mb-3">Perusahaan IT yang fokus pada pengembangan web dan aplikasi mobile.</p>
            <a href="pkl-detail.html" class="btn btn-outline-primary btn-sm w-100">
              <i class="bi bi-search"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-4 col-md-6 mb-4 pkl-item">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body p-3">
            <div class="d-flex align-items-start gap-3 mb-3">
              <img src="img/perusahaan2.jpg" alt="Foto Perusahaan" class="rounded-circle border shadow-sm" width="60" height="60">
              <div>
                <h6 class="mb-1 fw-bold">CV. Digital Kreatif</h6>
                <span class="badge bg-warning text-dark">Penuh</span>
                <p class="mb-0 small text-muted">Kuota: 3 siswa | RPL</p>
              </div>
            </div>
            <h6 class="fw-semibold mb-2">UI/UX Design Intern</h6>
            <p class="mb-1 small text-muted">
              <i class="bi bi-envelope-fill me-1"></i> kreatif@cvdigital.com
            </p>
            <p class="mb-2 small">
              <i class="bi bi-geo-alt-fill me-1"></i> Jakarta, DKI Jakarta
            </p>
            <p class="small mb-3">CV yang bergerak di bidang desain dan konsultasi UI/UX untuk berbagai startup.</p>
            <a href="pkl-detail.html" class="btn btn-outline-primary btn-sm w-100">
              <i class="bi bi-search"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-4 col-md-6 mb-4 pkl-item">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body p-3">
            <div class="d-flex align-items-start gap-3 mb-3">
              <img src="img/perusahaan3.jpg" alt="Foto Perusahaan" class="rounded-circle border shadow-sm" width="60" height="60">
              <div>
                <h6 class="mb-1 fw-bold">PT. Teknologi Maju</h6>
                <span class="badge bg-success">Tersedia</span>
                <p class="mb-0 small text-muted">Kuota: 4 siswa | TKJ</p>
              </div>
            </div>
            <h6 class="fw-semibold mb-2">Network Support Intern</h6>
            <p class="mb-1 small text-muted">
              <i class="bi bi-envelope-fill me-1"></i> info@tekmaju.co.id
            </p>
            <p class="mb-2 small">
              <i class="bi bi-geo-alt-fill me-1"></i> Surabaya, Jawa Timur
            </p>
            <p class="small mb-3">Pelatihan infrastruktur jaringan dan troubleshooting perangkat keras & server.</p>
            <a href="pkl-detail.html" class="btn btn-outline-primary btn-sm w-100">
              <i class="bi bi-search"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>

      <!-- Tambahkan card lainnya di sini -->

    </div>
  </div>
</section>
@endsection

@push("script")
<script>
  document.getElementById('searchBtn').addEventListener('click', function () {
    const query = document.getElementById('searchInput').value.toLowerCase();
    document.querySelectorAll('.pkl-item').forEach(function (card) {
      const text = card.innerText.toLowerCase();
      card.style.display = text.includes(query) ? '' : 'none';
    });
  });

  document.getElementById('searchInput').addEventListener('keyup', function (e) {
    if (e.key === 'Enter') {
      document.getElementById('searchBtn').click();
    }
    if (this.value === '') {
      document.querySelectorAll('.pkl-item').forEach(function (card) {
        card.style.display = '';
      });
    }
  });
</script>
@endpush
