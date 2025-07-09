<!DOCTYPE html>
<html lang="en">

<head>
    <x-public.header/>
</head>

<body class="index-page">
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

    <x-public.navbar/>

  <main class="main">

    @yield("content")

  </main>

 <x-public.footer/>



  <x-public.script/>

</body>

</html>
