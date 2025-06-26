@extends("layout.public.auth")

@section("auth")
<div class="m-3">
    <a href="{{ route("beranda") }}" class="btn btn-dark">Kembali</a>
</div>
  <div class="loginBox">
    <img class="user" src="https://via.placeholder.com/100" alt="User" height="100" width="100">
    <h3>Login siswa</h3>

    <form action="{{ route("public.login.aksi") }}" method="post">
        @csrf
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>

      <div class="form-options">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
        <a href="#">Forgot Password?</a>
      </div>

      <input type="submit" value="Login">
    </form>

    <div class="text-center">
      <p>Belum punya akun ? <a href="{{ route("public.verifEmail") }}" class="text-primary">Daftar</a></p>
    </div>
  </div>
@endsection
