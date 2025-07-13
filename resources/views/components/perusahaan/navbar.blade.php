<div>
    <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
       <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="navbar-brand-wrapper">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset("Logo putihh.png") }}" height="150" width="180" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
        </div>
        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back dan semoga sukses selalu, {{ auth()->guard("perusahaan")->user()->perusahaanProfile->nama_perusahaan }}</h4>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{ now()->format('d F Y') }}</h4>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
       </div>
       <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
       <ul class="navbar-nav mr-lg-2">
          <li class="nav-item d-none d-lg-block">
             <span class="navbar-text" style="font-size: 1.2rem; color: #6c757d; font-weight: normal;">
                {{ $slot }}
             </span>
          </li>
       </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
             <img src="{{ asset("storage") }}/{{ auth()->guard("perusahaan")->user()->perusahaanProfile->logo }}" alt="profile"/>
             <span class="nav-profile-name">{{ auth()->guard("perusahaan")->user()->perusahaanProfile->nama_perusahaan }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             <a class="dropdown-item" href="{{ route("perusahaan.myprofile") }}">
               <i class="mdi mdi-settings text-primary"></i>
              Myprofile
             </a>
             <form action="{{ route('perusahaan.logout') }}" method="post">
               @csrf
               <button type="submit" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
               </button>
             </form>
            </div>
        </ul>
       </div>
     </nav>
</div>
