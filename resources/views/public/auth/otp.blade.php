@extends("layout.public.auth")

@section("auth")
  <div class="loginBox">
    <img class="user" src="https://via.placeholder.com/100" alt="User" height="100" width="100">
    <h3>Register siswa</h3>
    <h4>Kode Otp</h4>
    <form action="{{ route("public.verifEmail.aksi") }}" method="post">
        @csrf
      <input type="number" name="otp" placeholder="Email" required>
      <input type="submit" value="Submit">
    </form>
  </div>
@endsection
