<div>
    <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
       <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="navbar-brand-wrapper">
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
        </div>
        <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back dan semoga sukses selalu, {{ auth()->guard("perusahaan")->user()->perusahaanProfile->nama_perusahaan }}</h4>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{ now()->format('d F Y') }}</h4>
          </li>
          <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
             <i class="mdi mdi-calendar mx-0"></i>
             <span class="count bg-info">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
             <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
               </div>
               <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                </h6>
                <p class="font-weight-light small-text text-muted mb-0">
                  The meeting is cancelled
                </p>
               </div>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
               </div>
               <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                </h6>
                <p class="font-weight-light small-text text-muted mb-0">
                  New product launch
                </p>
               </div>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
               </div>
               <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                </h6>
                <p class="font-weight-light small-text text-muted mb-0">
                  Upcoming board meeting
                </p>
               </div>
             </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-2">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
             <i class="mdi mdi-email-open mx-0"></i>
             <span class="count bg-danger">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
             <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="mdi mdi-information mx-0"></i>
                </div>
               </div>
               <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Just now
                </p>
               </div>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="mdi mdi-settings mx-0"></i>
                </div>
               </div>
               <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Settings</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Private message
                </p>
               </div>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <i class="mdi mdi-account-box mx-0"></i>
                </div>
               </div>
               <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  2 days ago
                </p>
               </div>
             </a>
            </div>
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
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link icon-link">
             <i class="mdi mdi-plus-circle-outline"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link icon-link">
             <i class="mdi mdi-web"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link icon-link">
             <i class="mdi mdi-clock-outline"></i>
            </a>
          </li>
        </ul>
       </div>
     </nav>
</div>
