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

        @foreach ($lowongan as $low)

        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6 mb-4 pkl-item">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body p-3">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <img src="{{ asset("storage") }}/{{ $low->perusahaan->perusahaanProfile->logo ?? "-" }}" alt="Foto Perusahaan" class="rounded-circle border shadow-sm" width="60" height="60">
                        <div>
                <h6 class="mb-1 fw-bold">{{ $low->perusahaan->perusahaanProfile->nama_perusahaan }}</h6>
                <span class="badge bg-success">{{ $low->status  }}</span>
                <p class="mb-0 small text-muted">Kuota: {{ $low->kuota }} siswa | {{ $low->jurusan->singkatan }}</p>
              </div>
            </div>
            <h6 class="fw-semibold mb-2">{{ $low->judul_lowongan }}</h6>
            <p class="mb-1 small text-muted">
              <i class="bi bi-envelope-fill me-1"></i> {{ $low->perusahaan->email }}
            </p>
            <p class="mb-2 small">
              <i class="bi bi-geo-alt-fill me-1"></i> {{ $low->perusahaan->perusahaanProfile->alamat }}
            </p>
            <p class="small mb-3">{{ Str::limit($low->deskripsi_lowongan,100) }}</p>
            <a href="{{ route("public.detail.pkl",$low->id) }}" class="btn btn-outline-primary btn-sm w-100">
                <i class="bi bi-search"></i> Lihat Detail
            </a>
        </div>
    </div>
</div>
@endforeach


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
