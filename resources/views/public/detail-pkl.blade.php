@extends("layout.public.public")

@push("style")
<style>
  section.detail-section {
    background-image: url('../lgn.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding-top: 120px; /* tambahkan lebih banyak padding agar tidak tertutup navbar */
  }
</style>

@endpush

@section("content")

<section class="py-5 bg-light detail-section" style="margin-top: 50px">
  <div class="container" data-aos="fade-up">

    <!-- Tombol kembali -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
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
            <p class="mb-1"><i class="bi bi-globe me-2"></i><strong>Website:</strong> <a href="{{ $lowongan->perusahaan->perusahaanProfile->website }}" target="_blank" >{{ $lowongan->perusahaan->perusahaanProfile->website }}</a></p>
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
        <div class="text-end mt-4 d-flex align-items-center justify-content-end gap-2">
            <!-- Tombol untuk membuka modal -->
            @php              
              $bolehMelamar = !auth()->user()->lamaran()
                  ->whereIn('status', ['pending', 'diterima', 'selesai'])
                  ->exists();
            @endphp
            @if ($bolehMelamar)
            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#ajukanModal">
                <i class="bi bi-send-fill me-1"></i> Lamar PKL
            </button>
            @else
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-secondary me-2" disabled>
                    <i class="bi bi-x-circle me-1"></i> Belum dapat melamar kembali
                </button>
            </div>
            @endif
        </div>

      </div>
    </div>

  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="ajukanModal" tabindex="-1" aria-labelledby="ajukanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header" style="background-color: #343a40;">
        <h5 class="modal-title text-white" id="ajukanModalLabel">
          <i class="bi bi-envelope-plus me-2"></i> Pengajuan PKL
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body bg-light">
        <form action="{{ route("public.lamaran.aksi",$lowongan->id) }}" method="POST" enctype="multipart/form-data" id="formAjukan">
          <!-- CSRF jika pakai Laravel -->
            @csrf

          <div class="mb-3">
            <label for="fileSurat" class="form-label fw-semibold">Upload Surat Pengantar (PDF)</label>
            <input type="file" class="form-control" id="fileSurat" name="surat_pengantar" accept=".pdf" required>
            <div class="form-text">Hanya file PDF. Maksimal 2MB.</div>
          </div>

          <div class="mb-3">
            <label for="alasan" class="form-label fw-semibold">Alasan Lamar</label>
            <textarea class="form-control" id="alasan" name="alasan" rows="3" placeholder="Tulis alasan kamu memilih tempat PKL ini..." required></textarea>
          </div>

          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">
              Batal
            </button>
            <button type="submit" class="btn text-white" style="background-color: #fd7e14;">
              <i class="bi bi-send-check me-1"></i> Ajukan Sekarang
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
