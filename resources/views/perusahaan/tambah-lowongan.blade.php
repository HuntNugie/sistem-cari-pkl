@extends('layout.perusahaan.perusahaan')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Lowongan</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Lowongan</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                </div>
                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji</label>
                    <input type="number" class="form-control" id="gaji" name="gaji" required>
                </div>
                <div class="mb-3">
                    <label for="batas_akhir" class="form-label">Batas Akhir Pendaftaran</label>
                    <input type="date" class="form-control" id="batas_akhir" name="batas_akhir" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
