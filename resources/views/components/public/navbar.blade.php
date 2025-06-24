<div>
      <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Selecao</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#beranda" class="active">Beranda</a></li>
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#daftar">Daftar PKL</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#kontak">Kontak</a></li>
          @guest

          <li><a href="{{ route("public.login") }}">Login</a></li>
          @endguest
           <!-- Dropdown avatar -->
           @auth

           <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <img src="lgn.jpg" alt="User" class="rounded-circle me-2" width="35" height="35">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">My Profile</a></li>
              <li><a class="dropdown-item" href="#">Notifikasi</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route("public.logout") }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger" >Logout</button>
                </form>
            </li>
            </ul>
        </li>
        @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
</div>
