<div>
  <header id="header" class="header d-flex align-items-center fixed-top" style="background-color: #1e1e2f">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">SICAPE</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route("beranda") }}#beranda" class="{{ request()->routeIs('beranda') ? "active" : "" }}">Beranda</a></li>
          <li><a href="{{ route("beranda") }}#tentang">Tentang</a></li>
          <li><a href="{{ route("beranda") }}#layanan">Layanan</a></li>
          <li><a href="{{ route("beranda") }}#daftar">Daftar PKL</a></li>
          <li><a href="{{ route("beranda") }}#team">Team</a></li>
          <li><a href="{{ route("beranda") }}#kontak">Kontak</a></li>
          @guest
          <li><a href="{{ route("public.login") }}">Login</a></li>
          @endguest
          
          <!-- Dropdown avatar -->
          @auth
          <li class="dropdown">
            <a href="#"><span>
              @if (auth()->user()->user_profile->foto)
                <img src="{{asset("storage") }}/{{ auth()->user()->user_profile->foto }}" alt="User" class="rounded-circle me-2" width="35" height="35">
             
              @else
                <img src="https://imgs.search.brave.com/DkxRxFg6OEhXbIGUQg14SHcmtPzWgVOKqolWbV9fESE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9wcmV2/aWV3LnJlZGQuaXQv/aW5zdGFncmFtLWRl/ZmF1bHQtdXNlci1w/cm9maWxlLXBpYy1m/bGlwLWZsb3BzLXYw/LWc5ODNvZmxmZWc0/ZDEuanBnP3dpZHRo/PTI2MiZmb3JtYXQ9/cGpwZyZhdXRvPXdl/YnAmcz1jNmVjMjMw/NTE5OWM2MzNmYzZk/NDYwMjM4ZDA0MDlm/NDE4MTJmZTc1" alt="User" class="rounded-circle me-2" width="35" height="35">
              @endif
              {{ auth()->user()->name }}
            </span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            
            <ul>
              <li><a href="{{ route("public.myprofile") }}" style="color:{{ request()->routeIs('public.myprofile') || request()->routeIs("public.myprofile.edit") ? "#ff6600" : "" }}">My Profile</a></li>
              <li><a href="{{ route("public.riwayat.lamaran") }}">Riwayat lamaran</a></li>
              @if(auth()->guard("web")->user()->lamaran()->where( "status","selesai")->exists())
                <li><a href="{{ route("public.sertifikat") }}"> Sertifikat </a></li>
              @endif
              <li>
                <form action="{{ route("public.logout") }}" method="post" style="margin: 0; padding: 0;">
                  @csrf
                  <a href="#" onclick="this.closest('form').submit(); return false;" class="text-danger" style="display: block; padding: 7px 15px; color: #dc3545; text-decoration: none;">Logout</a>
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