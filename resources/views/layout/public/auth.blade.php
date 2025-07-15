<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Login Page</title>

  <link rel="shortcut icon" sizes="128x128" href="{{ asset("Logo putihh.png") }}" type="image/png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset("auth/css/style.css") }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack("style")
</head>
<body>
      @session("sukses")
    <script>
        Swal.fire({
  title: "{{ session("sukses") }}",
  icon: "success",
  draggable: true
});
    </script>
    @endsession
    @session("gagal")
    <script>
        Swal.fire({
  icon: "error",
  title: "{{ session("gagal") }}",
  footer: '<a href="#">Why do I have this issue?</a>'
});
    </script>
    @endsession
@if ($errors->any())
    <script>
        Swal.fire({
            icon: "error",
            title: "Terjadi Kesalahan!",
            html: `{!! implode('<br>', $errors->all()) !!}`
        });
    </script>
@endif
    @yield("auth")

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @stack("script")
</body>
</html>
