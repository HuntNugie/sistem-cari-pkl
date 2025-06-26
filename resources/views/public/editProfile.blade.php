@extends("layout.public.public")

@push("style")
<style>
  body {
    background-image: url('../profile.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

  .edit-profile-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 4rem 1rem;
    min-height: 100vh;
  }

  .edit-profile-card {
    background-color: #1e1e2f;
    border-radius: 20px;
    padding: 2.5rem;
    width: 100%;
    max-width: 800px;
    color: #fff;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.6);
    animation: fadeIn 0.5s ease-in-out;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
  }

  .btn-orange {
    background-color: #ff6600;
    color: white;
    transition: all 0.3s ease;
  }

  .btn-orange:hover {
    background-color: #e65c00;
    transform: translateY(-1px);
  }

  .form-control {
    background-color: #2a2a3d;
    border: 1px solid #3a3a4f;
    color: #fff;
    transition: 0.3s;
  }

  .form-control:focus {
    border-color: #ff6600;
    box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.25);
    background-color: #2a2a3d;
  }

  .form-label {
    color: #ccc;
    font-weight: 500;
  }

  .profile-preview {
    text-align: center;
    margin-bottom: 2rem;
  }

  .profile-preview img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #ff6600;
    box-shadow: 0 0 10px rgba(255, 102, 0, 0.4);
  }

  .preview-name {
    margin-top: 1rem;
    font-size: 1.1rem;
    color: #ffcc99;
  }
  .edit-profile-card,
.form-label,
.form-control,
.preview-name {
  color: #f5f5f5 !important;
}

.edit-profile-card h3,
.edit-profile-card h4,
.edit-profile-card p {
  color: #ffffff;
}

input::placeholder,
textarea::placeholder {
  color: #bbbbbb;
}
.form-control::placeholder {
  color: #e0e0e0 !important; /* warna abu terang */
  opacity: 1; /* pastikan tidak transparan */
}
.form-control::placeholder {
  color: #999;
}

</style>
@endpush

@section("content")
<div class="edit-profile-wrapper">
  <div class="edit-profile-card opacity-80" style="margin-top: 5rem;">
    <h3 class="text-warning mb-4 d-flex align-items-center">
      <span class="me-2">👤</span> Edit Data Siswa
    </h3>

    <form action="#" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="profile-preview">
        <img id="previewImage" src="{{ $user->foto ?? 'https://via.placeholder.com/100' }}" alt="Preview Foto">
        <div class="mt-2">
          <label for="foto" class="form-label">Foto Profil</label>
          <input type="file" class="form-control mt-1" name="foto" id="foto" accept="image/*">
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name', $user->name ?? '') }}" required>
          <div class="preview-name" id="previewName">👋 Halo, {{ old('name', $user->name ?? 'Siswa') }}!</div>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Alamat Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Email Aktif" value="{{ old('email', $user->email ?? '') }}" required>
        </div>

        <div class="col-md-6">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Misal: XII RPL 1" value="{{ old('kelas', $user->kelas ?? '') }}">
        </div>

        <div class="col-md-6">
          <label for="sekolah" class="form-label">Asal Sekolah</label>
          <input type="text" name="sekolah" id="sekolah" class="form-control" placeholder="Nama Sekolah" value="{{ old('sekolah', $user->sekolah ?? '') }}">
        </div>

        <div class="col-md-6">
          <label for="telepon" class="form-label">Nomor Telepon</label>
          <input type="text" name="telepon" id="telepon" class="form-control" placeholder="08xxxxxxxxxx" value="{{ old('telepon', $user->telepon ?? '') }}">
        </div>

        <div class="col-12">
          <label for="alamat" class="form-label">Alamat Lengkap</label>
          <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat lengkap...">{{ old('alamat', $user->alamat ?? '') }}</textarea>
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
<script>
  // Preview nama real-time
  document.getElementById('name').addEventListener('input', function () {
    const preview = document.getElementById('previewName');
    const value = this.value.trim();
    preview.textContent = value ? `👋 Halo, ${value}!` : "👋 Halo, Siswa!";
  });

  // Preview foto real-time
  document.getElementById("foto").addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const preview = document.getElementById("previewImage");
      preview.src = URL.createObjectURL(file);
    }
  });
</script>
@endpush
