@extends("layout.public.auth")

@section("auth")
<div class="m-3">
    <a href="{{ route("beranda") }}" class="btn btn-dark">Kembali</a>
</div>
  <div class="loginBox">
        <img class="user" src="{{ asset("Logo putihh.png") }}" alt="User" height="200" width="280" >

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
    <div class="social-login d-flex flex-column align-items-center my-3">
      <p>Login dengan:</p>
    <a href="{{ route('public.auth.google') }}" class="btn btn-danger d-flex align-items-center justify-content-center" style="min-width:220px; color:white;">
        <span class="d-flex align-items-center" style="gap: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
            </svg>
            <div>Login dengan Google</div>
        </span>
    </a>
    </div>
    <div class="text-center">
      <p>Belum punya akun ? <a href="{{ route("public.verifEmail") }}" class="text-primary">Daftar</a></p>
    </div>
  </div>
@endsection
