@extends("layout.perusahaan.perusahaan")

@push("style")
    <style>
  .modal-content {
    border-radius: 1rem;
  }
  .form-control:focus {
    box-shadow: 0 0 0 0.15rem rgba(13,110,253,.25);
    border-color: #86b7fe;
  }
</style>

@endpush
@section("content")
<div class="container my-5">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-info-circle-fill me-2"></i> Detail Siswa Mendaftar</h4>
      <a href="{{ route("perusahaan.daftar.siswa.baru") }}" class="btn btn-outline-light btn-sm">
        <i class="bi bi-arrow-left-circle"></i> Kembali
      </a>
    </div>

    <div class="card-body bg-light px-5 py-4">
      <h5 class="fw-bold">{{ $lamaran->siswa->name }}</h5>
      <p class="text-bold">Melamar untuk: <strong>{{ $lamaran->lowongan->judul_lowongan }}</strong></p>

      <div class="row mb-4">
        <div class="col-md-6">
          <p><strong>Jenis Kelamin:</strong>{{$lamaran->siswa->user_profile->jk}}</p>
          <p><strong>Asal Sekolah:</strong> {{ $lamaran->siswa->user_profile->sekolah->nama_sekolah }}</p>
          <p><strong>Email:</strong> {{ $lamaran->siswa->email }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Telepon:</strong> {{ $lamaran->siswa->user_profile->telepon }}</p>
          <p><strong>Status Verifikasi:</strong>
            <span class="badge bg-warning">{{ $lamaran->status }}</span>
          </p>
          <p><strong>Tanggal Mendaftar:</strong>{{$lamaran->created_at->format("d F Y")}}</p>
        </div>
      </div>

      <hr>

      <h6 class="fw-bold">Alasan Melamar</h6>
      <p>{{ $lamaran->alasan }}</p>

      <div class="mt-4 d-flex justify-content-end gap-3">
        <!-- Tombol Tolak -->
        <div>
            <button type="button" class="btn btn-danger btn-konfirmasi">
            <i class="bi bi-x-circle"></i> Tolak
          </button>
        </div>

        <div class="ms-4">
      <!-- Tombol untuk membuka modal -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalKonfirmasi">
        <i class="bi bi-envelope-check-fill me-1"></i> Konfirmasi & Buat Surat
        </button>
        </div>
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="modalKonfirmasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> {{-- Tambah modal-lg jika ingin lebih lebar --}}
    <form action="" method="POST" class="modal-content shadow-lg rounded-4 border-0">
      @csrf
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="modalKonfirmasiLabel">
          <i class="bi bi-check2-circle me-2"></i> Konfirmasi Penerimaan PKL
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>

      <div class="modal-body bg-light">
        <div class="mb-3">
          <label for="jadwal_datang" class="form-label fw-semibold">Jadwal Kedatangan</label>
          <input type="date" name="jadwal_datang" class="form-control rounded-3 shadow-sm" required>
        </div>

        <div class="mb-3">
          <label for="alamat_pkl" class="form-label fw-semibold">Alamat PKL</label>
          <textarea name="alamat_pkl" class="form-control rounded-3 shadow-sm" rows="2" required></textarea>
        </div>

        <div class="mb-3">
          <label for="catatan" class="form-label fw-semibold">Catatan Tambahan <small class="text-muted">(Opsional)</small></label>
          <textarea name="catatan" class="form-control rounded-3 shadow-sm" rows="2"></textarea>
        </div>
      </div>

      <div class="modal-footer bg-white">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-send-check-fill me-1"></i> Konfirmasi & Simpan
        </button>
      </div>
    </form>
  </div>
</div>

@endsection

@push("script")
<script>
  document.querySelectorAll('.btn-konfirmasi').forEach(button => {
    button.addEventListener('click', function () {
      const form = this.closest('form');
      Swal.fire({
        title: "Yakin ingin menolak lamaran ini?",
        text: "Tindakan ini tidak dapat dibatalkan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, tolak!",
        cancelButtonText: "Batal"
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
</script>
@endpush
