<!doctype html>
<html lang="en">

<head>
 <x-admin.header/>
</head>

<body>
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
