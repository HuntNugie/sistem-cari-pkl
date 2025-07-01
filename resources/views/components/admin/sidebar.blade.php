<div>
     <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset("admin/assets/images/logos/dark-logo.svg") }}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is("admin/dashboard") ? "active" : "" }}" href="{{ route("admin.dashboard") }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Siswa</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("admin.siswa.aktif") }}" aria-expanded="false">
                <span>
                  <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Siswa Aktif</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("admin.siswa.pkl") }}" aria-expanded="false">
                <span>
<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-share"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h3" /><path d="M16 22l5 -5" /><path d="M21 21.5v-4.5h-4.5" /></svg>
                </span>
                <span class="hide-menu">Siswa Sedang PKL </span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Perusahaan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("admin.perusahaan.terkonfirmasi") }}" aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-buildings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" /><path d="M16 8h2c1 0 2 1 2 2v11" /><path d="M3 21h18" /><path d="M10 12v0" /><path d="M10 16v0" /><path d="M10 8v0" /><path d="M7 12v0" /><path d="M7 16v0" /><path d="M7 8v0" /><path d="M17 12v0" /><path d="M17 16v0" /></svg>
                </span>
                <span class="hide-menu">Perusahaan Terkonfirmasi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("admin.perusahaan.belum.terkonfirmasi") }}" aria-expanded="false">
                <span>
                    <i class="ti ti-building"></i>
                </span>
                <span class="hide-menu">Perusahaan non-konfirmasi </span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Admin</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("admin.daftar.admin") }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Daftar Admin</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route("admin.tambah.admin") }}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Tambah Admin</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Kritik dan saran</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
</div>
