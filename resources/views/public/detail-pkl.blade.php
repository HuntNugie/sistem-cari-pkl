@extends("layout.public.public")

@push("style")
    <style>
    section {
      background-image: url('../profile.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;}
    </style>
@endpush

@section("content")

 <section class="py-5 bg-light " style="margin-top: 5rem;">
    <a href="{{ route("public.daftar.pkl") }}" class="btn btn-secondary mb-3 ms-3">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <div class="container" data-aos="fade-up">
      <div class="card shadow-sm">
        <div class="card-body">

          <!-- Header Info -->
          <div class="d-flex align-items-center mb-4">
            <i class="bi bi-building fs-1 text-primary me-3"></i>
            <div>
              <h3 class="mb-1">PT. Software Nusantara</h3>
              <p class="mb-0 text-muted">Bandung, Jawa Barat</p>
            </div>
          </div>

          <!-- Detail Data -->
          <div class="row mb-4">
            <div class="col-md-6">
              <p><i class="bi bi-mortarboard me-2"></i><strong>Jurusan Diterima:</strong> RPL, TKJ</p>
              <p><i class="bi bi-people me-2"></i><strong>Kuota:</strong> 5 siswa</p>
              <p><i class="bi bi-check-circle me-2"></i><strong>Status:</strong> <span class="badge bg-success">Tersedia</span></p>
            </div>
            <div class="col-md-6">
              <p><i class="bi bi-envelope me-2"></i><strong>Email:</strong> hrd@softwarenusantara.com</p>
              <p><i class="bi bi-telephone me-2"></i><strong>Telepon:</strong> 022-12345678</p>
              <p><i class="bi bi-globe me-2"></i><strong>Website:</strong> <a href="#" target="_blank">www.softwarenusantara.com</a></p>
            </div>
          </div>

          <!-- Deskripsi -->
          <h5>Deskripsi Perusahaan</h5>
          <p>
            PT. Software Nusantara merupakan perusahaan IT yang berfokus pada pengembangan aplikasi berbasis web dan mobile. Kami membuka kesempatan bagi siswa SMK untuk mengikuti PKL dan terlibat langsung dalam proyek kami.
          </p>

          <!-- Syarat -->
          <h5>Syarat Pendaftaran</h5>
          <ul>
            <li>Surat pengantar dari sekolah</li>
            <li>CV atau biodata sederhana</li>
            <li>Minimal kelas XI</li>
          </ul>

          <!-- Tombol -->
          <div class="text-end">
            <a href="form-pendaftaran.html" class="btn btn-primary">
              <i class="bi bi-send me-1"></i> Ajukan PKL Sekarang
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
