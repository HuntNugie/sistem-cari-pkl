@extends("layout.public.auth")
@push("style")
    <style>
         .loginBox {
      background-color: #1e1e2f;
      border-radius: 15px;
      padding: 30px 25px;
      width: 100%;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }
    .user {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }
    .btn-orange {
      background-color: #ff6600;
      color: white;
    }
    .btn-orange:hover {
      background-color: #e65c00;
    }
    </style>
@endpush
@section("auth")
<div class="m-3">
<a href="{{ route("public.login") }}" class="btn btn-dark">Kembali</a>
</div>
 <div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="loginBox text-center">
      <img class="user" src="https://via.placeholder.com/100" alt="User">
      <h3 class="mb-2">Register Siswa</h3>
      <h5 class="mb-4 text-warning">Verifikasi Email</h5>

      <form action="{{ route('public.verifEmail.aksi') }}" method="post">
        @csrf
        <div class="mb-3 text-start">
          <label for="email" class="form-label">Alamat Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email aktif" value="{{ $email }}" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-orange">Kirim Kode OTP</button>
        </div>
      </form>
    </div>
  </div>

@endsection
