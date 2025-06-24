<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset("auth/css/style.css") }}">
</head>
<body>

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
      <p>Belum punya akun ? <a href="#" class="text-primary">Daftar</a></p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
