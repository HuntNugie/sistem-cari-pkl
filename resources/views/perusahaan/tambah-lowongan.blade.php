@extends('layout.perusahaan.perusahaan')

@section('content')
<div class="container my-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary bg-gradient text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i> Tambah Lowongan</h4>
            <a href="{{ route('perusahaan.daftar.lowongan') }}" class="btn btn-outline-light btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
        <div class="card-body px-5 py-5 bg-light">
            <form action="" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="mb-4">
                    <label for="judul" class="form-label fw-semibold">Judul Lowongan</label>
                    <input type="text" class="form-control border-secondary" id="judul" name="judul" placeholder="Masukkan judul lowongan" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control border-secondary" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi pekerjaan..." required></textarea>
                </div>

                <div class="mb-4">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" class="form-control border-secondary" id="lokasi" name="lokasi" placeholder="Masukkan lokasi kerja" required>
                </div>

                <div class="mb-4">
                    <label for="gaji" class="form-label fw-semibold">Gaji</label>
                    <input type="number" class="form-control border-secondary" id="gaji" name="gaji" placeholder="Contoh: 3000000" required>
                </div>

                <div class="mb-5">
                    <label for="batas_akhir" class="form-label fw-semibold">Batas Akhir Pendaftaran</label>
                    <input type="date" class="form-control border-secondary" id="batas_akhir" name="batas_akhir" required>
                </div>

                <div class="d-flex justify-content-end gap-4 mt-4">
                    <a href="" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
