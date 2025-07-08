@extends('layout.perusahaan.perusahaan')

@section('content')
<div class="container my-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary bg-gradient text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i> Edit Lowongan</h4>
            <a href="{{ route('perusahaan.daftar.lowongan') }}" class="btn btn-outline-light btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
        <div class="card-body px-5 py-5 bg-light">
            <form action="{{ route("perusahaan.update.lowongan.aksi",$lowongan->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method("PUT")
                <div class="mb-4">
                    <label for="judul" class="form-label fw-semibold">Judul Lowongan</label>
                    <input type="text" class="form-control border-secondary" id="judul" name="judul" placeholder="Contoh: Admin Gudang" value="{{ $lowongan->judul_lowongan }}" required>
                </div>

                <div class="mb-4">
                    <label for="jurusan" class="form-label fw-semibold">Jurusan yang Dibutuhkan</label>
                    <select class="form-select border-secondary" id="jurusan" name="jurusan_id" required>
                        <option selected disabled value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $jur)
                            <option value="{{ $jur->id }}" {{ $jur->id === $lowongan->jurusan_id ? "selected" : "" }}>{{ $jur->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kuota" class="form-label fw-semibold">Kuota</label>
                    <input type="number" class="form-control border-secondary" id="kuota" value="{{ $lowongan->kuota }}" name="kuota" placeholder="Contoh: 5" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi Pekerjaan</label>
                    <textarea class="form-control border-secondary" id="deskripsi" name="deskripsi" rows="5" placeholder="Tuliskan deskripsi singkat mengenai lowongan ini..." required>{{ $lowongan->deskripsi_lowongan }}</textarea>
                </div>


                {{-- Syarat --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Syarat</label>
                    <div id="syarat-container">
                        @foreach ($lowongan->syarat as $syarat)
                        <div class="input-group mb-2">

                            <input type="text" name="syarat[]" class="form-control border-secondary" placeholder="Contoh: Minimal kelas 11" value="{{ $syarat->isi_syarat }}" required>
                            <button type="button" class="btn btn-outline-danger remove-syarat"><i class="bi bi-x"></i></button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-syarat" class="btn btn-outline-primary btn-sm mt-2">
                        <i class="bi bi-plus-circle"></i> Tambah Syarat
                    </button>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="#" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                    <button type="button" class="btn btn-success px-4 btn-konfirmasi-edit">
                        <i class="bi bi-save-fill"></i> Simpan Lowongan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    const container = document.getElementById('syarat-container');
    document.getElementById('add-syarat').addEventListener('click', function () {
        const group = document.createElement('div');
        group.className = 'input-group mb-2';
        group.innerHTML = `
            <input type="text" name="syarat[]" class="form-control border-secondary" placeholder="Contoh: Memiliki sertifikat keahlian" required>
            <button type="button" class="btn btn-outline-danger remove-syarat"><i class="bi bi-x"></i></button>
        `;
        container.appendChild(group);
    });

    // Event delegation to remove field
    container.addEventListener('click', function (e) {
        if (e.target.closest('.remove-syarat')) {
            e.target.closest('.input-group').remove();
        }
    });


document.querySelectorAll('.btn-konfirmasi-edit').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Edit Lowongan PKL?",
            text: "Apakah kamu yakin ingin melakukan perubahan pada lowongan?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya, ubah!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endpush
