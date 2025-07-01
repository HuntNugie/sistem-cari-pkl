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
      max-width: 400px;
      margin: 0 auto 2rem auto;
    }
  </style>
@endpush

@section("content")
    <section class="py-5 bg-light">
        <a href="{{ route("beranda") }}" class="btn btn-secondary mb-4 ms-3">Kembali</a>
      <div class="container" data-aos="fade-up">
        <h2 class="mb-4 text-center">Daftar Tempat PKL</h2>
        <!-- Search Bar -->
        <form class="search-bar mb-4">
          <div class="input-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama perusahaan, jurusan, atau kota...">
            <button class="btn btn-primary" type="button" id="searchBtn"><i class="bi bi-search"></i></button>
          </div>
        </form>
        <!-- List PKL -->
        <div class="row" id="pklList">
          <!-- Contoh Card PKL -->
          <div class="col-md-6 col-lg-4 mb-4 pkl-item">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-building fs-2 text-primary me-2"></i>
                  <div>
                    <h5 class="mb-1">PT. Software Nusantara</h5>
                    <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
                  </div>
                </div>
                <p class="mb-1"><i class="bi bi-mortarboard me-2"></i><strong>Jurusan:</strong> RPL, TKJ</p>
                <p class="mb-1"><i class="bi bi-people me-2"></i><strong>Kuota:</strong> 5 siswa</p>
                <p class="mb-1"><i class="bi bi-check-circle me-2"></i><strong>Status:</strong> <span class="badge bg-success">Tersedia</span></p>
                <a href="pkl-detail.html" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 pkl-item">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-building fs-2 text-primary me-2"></i>
                  <div>
                    <h5 class="mb-1">CV. Digital Kreatif</h5>
                    <p class="mb-0 text-muted">Jakarta, DKI Jakarta</p>
                  </div>
                </div>
                <p class="mb-1"><i class="bi bi-mortarboard me-2"></i><strong>Jurusan:</strong> RPL</p>
                <p class="mb-1"><i class="bi bi-people me-2"></i><strong>Kuota:</strong> 3 siswa</p>
                <p class="mb-1"><i class="bi bi-check-circle me-2"></i><strong>Status:</strong> <span class="badge bg-warning text-dark">Penuh</span></p>
                <a href="pkl-detail.html" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 pkl-item">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-building fs-2 text-primary me-2"></i>
                  <div>
                    <h5 class="mb-1">PT. Teknologi Maju</h5>
                    <p class="mb-0 text-muted">Surabaya, Jawa Timur</p>
                  </div>
                </div>
                <p class="mb-1"><i class="bi bi-mortarboard me-2"></i><strong>Jurusan:</strong> TKJ</p>
                <p class="mb-1"><i class="bi bi-people me-2"></i><strong>Kuota:</strong> 4 siswa</p>
                <p class="mb-1"><i class="bi bi-check-circle me-2"></i><strong>Status:</strong> <span class="badge bg-success">Tersedia</span></p>
                <a href="pkl-detail.html" class="btn btn-outline-primary btn-sm mt-2">Detail</a>
              </div>
            </div>
          </div>
          <!-- Tambahkan card PKL lain sesuai kebutuhan -->
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
