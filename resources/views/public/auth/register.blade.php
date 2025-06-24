@extends("layout.public.auth")

@section("auth")
  <div class="loginBox">
    <img class="user" src="https://via.placeholder.com/100" alt="User" height="100" width="100">
    <h3>Register siswa</h3>
    <h4>Verifikasi email</h4>
    <form action="{{ route("public.login.aksi") }}" method="post">
        @csrf
      <input type="email" name="email" placeholder="Email" required>
      <input type="submit" value="Submit">
    </form>

    <div class="text-center">
      <p>Belum punya akun ? <a href="#" class="text-primary">Daftar</a></p>
    </div>
  </div>
@endsection
