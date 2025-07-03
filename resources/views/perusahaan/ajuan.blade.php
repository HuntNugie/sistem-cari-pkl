@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="container-fluid mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #0d6efd 0%, #20c997 100%);">
            <h5 class="mb-0">Form Pengajuan Konfirmasi Perusahaan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("perusahaan.ajuan.aksi") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <!-- Info Profil Perusahaan (Readonly) -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="{{ $perusahaan->nama_perusahaan }}" readonly disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pemilik</label>
                        <input type="text" class="form-control" value="{{ $perusahaan->pemilik }}" readonly disabled>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control" rows="2" readonly disabled>{{ $perusahaan->alamat }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Website</label>
                        <input type="text" class="form-control" value="{{ $perusahaan->website }}" readonly disabled>
                    </div>

                    <hr class="mt-4">

                    <!-- Nomor Izin Usaha -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor Izin Usaha</label>
                        <input type="text" class="form-control" name="nomor_izin_usaha" placeholder="Masukkan nomor izin usaha">
                    </div>

                    <!-- Upload File PDF -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Upload File Bukti (PDF)</label>
                        <input type="file" class="form-control" name="file_pendukung" accept="application/pdf">
                        <small class="text-muted">Hanya file .pdf, maksimal 2MB</small>
                    </div>
                </div>

                <div class="text-end mt-4">
                        @if (!$perusahaan->nama_perusahaan || !$perusahaan->pemilik || !$perusahaan->alamat || !$perusahaan->telepon || !$perusahaan->website || !$perusahaan->logo)
                    <button type="submit" class="btn btn-danger px-4 shadow-sm" disabled>
                        <i class="bi bi-send"></i> Belum bisa mengajukan
                    </button>
                    <small class="text-danger">*Lengkapi Profile terlebih dahulu </small>
                        @else
                         <button type="submit" class="btn btn-success px-4 shadow-sm">
                        <i class="bi bi-send"></i> Ajukan Konfirmasi
                    </button>
                        @endif
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
