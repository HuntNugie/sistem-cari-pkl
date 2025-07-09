@extends("layout.public.public")

@push("style")
<style>
    body {
        background: url('../profile.jpg') no-repeat center center fixed;
        background-size: cover;
    }
    .edit-profile-wrapper {
        display: flex; justify-content: center; align-items: center;
        padding: 4rem 1rem; min-height: 100vh;
    }
    .edit-profile-card {
        background: rgba(26, 26, 42, 0.85); /* Solid, slightly transparent background */
        backdrop-filter: blur(10px); /* Frosted glass effect */
        border-radius: 20px;
        padding: 2.5rem;
        width: 100%;
        max-width: 800px;
        color: #fff;
        border: 1px solid rgba(255, 102, 0, 0.3);
        box-shadow: 0 0 40px rgba(0,0,0,0.7);
        animation: fadeIn .5s;
    }
    @keyframes fadeIn { from{opacity:0;transform:scale(.95);} to{opacity:1;transform:scale(1);} }
    .btn-orange { background: #ff6600; color: #fff; transition: .3s; }
    .btn-orange:hover { background: #e65c00; transform: translateY(-1px);}
    .form-control { background: #2a2a3d; border: 1px solid #3a3a4f; color: #fff;}
    .form-control:focus { border-color: #ff6600; box-shadow: 0 0 0 .2rem rgba(255,102,0,.25);}
    .form-label { color: #ccc; font-weight: 500;}
    .profile-preview { text-align: center; margin-bottom: 2rem;}
    .profile-preview img { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #ff6600;}
    .preview-name { margin-top: 1rem; font-size: 1.1rem; color: #ffcc99;}
    input::placeholder, textarea::placeholder, .form-control::placeholder {
        color: #ccc !important;
        opacity: 1; /* Override default opacity */
    }
    .form-control::-webkit-input-placeholder { color: #ccc !important; }
    .form-control::-moz-placeholder { color: #ccc !important; opacity: 1; }
    .form-control:-ms-input-placeholder { color: #ccc !important; }
    .form-control::-ms-input-placeholder { color: #ccc !important; }

    /* Custom Select2 Styling for Dark Theme */
    .select2-container--default .select2-selection--single {
        background-color: #2a2a3d !important;
        border: 1px solid #3a3a4f !important;
        height: calc(1.5em + .75rem + 2px) !important;
        padding: .375rem .75rem !important;
        border-radius: .25rem !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #fff !important;
        line-height: 1.5 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #bbbbbb !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(1.5em + .75rem) !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #fff transparent transparent transparent !important;
    }
    .select2-dropdown {
        background-color: #2a2a3d !important;
        border: 1px solid #5a5a6f !important;
    }
    .select2-search__field {
        background-color: #3a3a4f !important;
        border: 1px solid #5a5a6f !important;
        color: #fff !important;
    }
    .select2-results__option {
        color: #ccc !important;
    }
    .select2-results__option--highlighted[aria-selected] {
        background-color: #ff6600 !important;
        color: #fff !important;
    }
    .select2-results__option[aria-selected=true] {
        background-color: #e65c00 !important;
    }
</style>
<!-- Select2 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section("content")
<div class="edit-profile-wrapper">
    <div class="edit-profile-card opacity-80" style="margin-top: 5rem;">
        <h3 class="text-warning mb-4 d-flex align-items-center">
            <span class="me-2">👤</span> Edit Data Siswa
        </h3>
        <form action="{{ route("public.myprofile.update",auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-preview">
            <img id="previewImage" src="{{ asset("storage") }}/{{ auth()->user()->user_profile->foto ?? "" }}" alt="Preview Foto">
            <div class="mt-2">
                <label for="foto" class="form-label">Foto Profil</label>
                <input type="file" class="form-control mt-1" name="foto" id="foto" accept="image/*">
            </div>
            </div>
            <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" value="{{ auth()->user()->name ?? "" }}">
                <div class="preview-name" id="previewName">👋 Halo, Siswa!</div>
            </div>
            <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select name="jk" class="form-control" id="jenis_kelamin">
                <option disabled selected>pilih jenis kelamin</option>
                <option value="laki-laki" {{ auth()->user()->user_profile->jk === "laki-laki" ? "selected" : "" }}>laki-laki</option>
                <option value="perempuan" {{ auth()->user()->user_profile->jk === "perempuan" ? "selected" : "" }}>perempuan</option>
              </select>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Aktif" value="{{ auth()->user()->email ?? "" }}" readonly>
            </div>
            <div class="col-md-6">
                <label for="sekolah" class="form-label">Asal Sekolah</label>
                <select name="sekolah_id" id="sekolah" class="form-control" style="width:100%">
                <option value="">Pilih sekolah...</option>

                @foreach($sekolahs as $sekolah)
                    <option value="{{ $sekolah->id }}" {{ $sekolah->id == (auth()->user()->user_profile->sekolah_id ?? "") ? 'selected' : '' }}>{{ $sekolah->nama_sekolah }}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" placeholder="08xxxxxxxxxx" value="{{ auth()->user()->user_profile->telepon ?? "" }}">
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ auth()->user()->user_profile->tgl_lahir ?? "" }}">
            </div>
            <div class="col-md-6">
                <label for="nomor_induk" class="form-label">Nomor Induk Siswa</label>
                <input type="text" name="nis" id="nomor_induk" class="form-control" placeholder="Nomor Induk Siswa" value="{{ auth()->user()->user_profile->nis ?? "" }}">
            </div>
            <div class="col-md-6">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Misal: 12" value="{{ auth()->user()->user_profile->kelas ?? ""}}">
            </div>
            <div class="col-md-6">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan_id" id="jurusan" class="form-control">
                <option value="">Pilih jurusan...</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" {{ $j->id == (auth()->user()->user_profile->jurusan_id ?? "") ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat lengkap...">{{ auth()->user()->user_profile->alamat ?? "" }}</textarea>
            </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('public.myprofile') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-orange">💾 Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push("script")
<!-- jQuery & Select2 JS CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Preview nama real-time
    document.getElementById('name').addEventListener('input', function () {
        document.getElementById('previewName').textContent = this.value.trim() ? `👋 Halo, ${this.value.trim()}!` : "👋 Halo, Siswa!";
    });
    // Preview foto real-time
    document.getElementById("foto").addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) document.getElementById("previewImage").src = URL.createObjectURL(file);
    });
    // Select2 Initialization
    $(document).ready(function() {
        $('#sekolah').select2({
            placeholder: "Cari sekolah...",
            allowClear: true
        });
        $('#jurusan').select2({
            placeholder: "Cari atau pilih jurusan...",
            allowClear: true
        });
    });
</script>
@endpush
