<!doctype html>
<html lang="en">

<head>
 <x-admin.header/>
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
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->

     @guest("admin")
            @yield("auth")
    @endguest


    @auth("admin")

    <x-admin.sidebar />

    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <x-admin.navbar />
        <!--  Header End -->
        @yield('content')
    </div>
    @endauth
  </div>
<x-admin.script/>
</body>

</html>
