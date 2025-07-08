@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="container my-5">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-info-circle-fill me-2"></i> Detail Lowongan</h4>
      <a href="{{ route("perusahaan.daftar.lowongan") }}" class="btn btn-outline-light btn-sm">
        <i class="bi bi-arrow-left-circle"></i> Kembali
      </a>
    </div>

    <div class="card-body bg-light px-5 py-4">
      <h5 class="fw-bold">{{ $lowongan->judul_lowongan }}</h5>
      <p class="text-muted">Oleh: {{ $lowongan->perusahaan->perusahaanProfile->nama_perusahaan }}</p>

      <div class="row mb-4">
        <div class="col-md-6">
          <p><strong>Jurusan Diterima:</strong> {{ $lowongan->jurusan->nama_jurusan }}</p>
          <p><strong>Kuota:</strong> {{ $lowongan->kuota }} siswa</p>
          <p><strong>Email:</strong> {{ $lowongan->perusahaan->email }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Alamat:</strong> {{ $lowongan->perusahaan->perusahaanProfile->alamat }}</p>
          <p><strong>Status:</strong> <span class="badge bg-{{ $lowongan->status == "tersedia" ? "success" : "danger" }}">{{ $lowongan->status }}</span></p>
        </div>
      </div>

      <hr>

      <h6 class="fw-bold">Deskripsi</h6>
      <p>
        {{ $lowongan->deskripsi_lowongan }}
      </p>

      <h6 class="fw-bold mt-4">Syarat Pendaftaran</h6>
      <ul>
        @foreach ($lowongan->syarat as $syarat)
            <li>{{ $syarat->isi_syarat }}</li>
        @endforeach
      </ul>

      <div class="mt-4 d-flex justify-content-end gap-3">
        <a href="#" class="btn btn-warning">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
        <form action="{{ route("perusahaan.hapus.lowongan",$lowongan->id) }}" method="post">
            @csrf
            @method("DELETE")
            <button type="button" class="btn btn-danger btn-konfirmasi">
              <i class="bi bi-trash-fill"></i> Hapus
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push("script")
    <script>
          document.querySelectorAll('.btn-konfirmasi').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data ini tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
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
