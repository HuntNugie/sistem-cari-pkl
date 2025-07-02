<!DOCTYPE html>
<html lang="en">

<head>
    <x-perusahaan.header/>
</head>
<body>
  <div class="container-scroller d-flex">

    @guest("perusahaan")
        @yield('auth')
    @endguest

    @auth('perusahaan')
    <!-- partial:./partials/_sidebar.html -->
    <x-perusahaan.sidebar/>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
     <x-perusahaan.navbar>{{ $quote}}</x-perusahaan.navbar>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield("content")
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <x-perusahaan.footer/>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    @endauth
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
 <x-perusahaan.script/>
</body>

</html>
