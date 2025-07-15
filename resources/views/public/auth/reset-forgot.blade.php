@extends("layout.public.auth")

@push("style")
    <style>
    body {
      background-color: #2f3041;
      color: #f1f1f1;
      font-family: 'Segoe UI', sans-serif;
    }
    .loginBox {
      background-color: #1e1e2f;
      border-radius: 15px;
      padding: 30px 25px;
      width: 100%;
      max-width: 450px;
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
    label, input::placeholder {
      color: #f1f1f1;
    }
  </style>
@endpush
@section("auth")
   <div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="loginBox text-center">
      <img class="user" src="{{ asset("Logo putihh.png") }}" alt="User">
      <h3 class="mb-2">Reset Password</h3>
      <h5 class="mb-4 text-warning">Masukkan Password Baru Anda</h5>
      <form action="{{ route("public.reset.password.aksi") }}" method="post">
        @csrf
        <div class="mb-3 text-start">
          <label for="password" class="form-label">Password Baru</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password baru" required>
        </div>

        <div class="mb-4 text-start">
          <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password baru" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-orange">Reset Password</button>
        </div>
      </form>

    </div>
  </div>
@endsection
