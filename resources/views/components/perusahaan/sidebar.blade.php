
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Home</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('perusahaan.dashboard') }}">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item sidebar-category">
          <p>Lowongan PKL</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('perusahaan.daftar.lowongan') }}">
            <i class="mdi mdi-briefcase menu-icon"></i>
            <span class="menu-title">Daftar lowongan PKL</span>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Siswa</p>
          <span></span>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="{{ route('perusahaan.daftar.siswa.baru') }}">
            <i class="mdi mdi-school menu-icon"></i>
            <span class="menu-title">Siswa baru</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="{{ route('perusahaan.daftar.siswa.pkl') }}">
            <i class="mdi mdi-hard-hat menu-icon"></i>
            <span class="menu-title">Siswa PKL</span>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Riwayat</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('perusahaan.daftar.riwayat') }}">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Riwayat Siswa PKl</span>
          </a>
        </li>
        <li class="nav-item">
          <div class="nav-link" >
            <form action="{{ route('perusahaan.logout') }}" method="post">
              @csrf
              <button class="btn bg-danger btn-sm menu-title" type="submit">Logout</button>
            </form>
          </div>
        </li>
      </ul>
    </nav>

