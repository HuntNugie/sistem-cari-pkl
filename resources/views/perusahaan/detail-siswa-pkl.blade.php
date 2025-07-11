@extends("layout.perusahaan.perusahaan")
@push("style")
<style>
  .modal-content {
    border-radius: 1rem;
  }
  .foto-siswa-detail {
    width: 120px;
    height: 120px;
    object-fit: cover;
    cursor: pointer;
  }
</style>
@endpush
@section("content")
<div class="container my-5">
  <div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="mdi mdi-account-box me-2"></i> Detail Siswa PKL</h4>
      <a href="{{ route("perusahaan.daftar.siswa.pkl") }}" class="btn btn-outline-light btn-sm">
        <i class="mdi mdi-arrow-left-circle"></i> Kembali
      </a>
    </div>
    <div class="card-body bg-light px-5 py-4">
      <div class="mb-3 d-flex justify-content-center">
        @php
          $foto = $lamaran->siswa->user_profile->foto ?? null;
          $avatar = $lamaran->siswa->avatar ?? null;
          if($foto){
            $imgSrc = asset('storage/'.$foto);
          }elseif($avatar){
            $imgSrc = $avatar;
          }else{
            $imgSrc = 'https://ui-avatars.com/api/?name='.urlencode($lamaran->siswa->name).'&background=0D8ABC&color=fff&size=400';
          }
        @endphp
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFotoSiswa">
          <img src="{{ $imgSrc }}" alt="Foto Siswa" class="rounded-circle shadow" style="width:90px; height:90px; object-fit:cover;" />
        </a>
      </div>
      <!-- Modal Foto Siswa -->
      <div class="modal fade" id="modalFotoSiswa" tabindex="-1" aria-labelledby="modalFotoSiswaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-0">
              <img src="{{ $imgSrc }}" alt="Foto Siswa" class="img-fluid rounded shadow" style="max-width: 400px; max-height: 80vh; background: #fff;">
            </div>
          </div>
        </div>
      </div>
      <h5 class="fw-bold text-center mt-2">{{ $lamaran->siswa->name }}</h5>
      <div class="row mb-4 mt-3">
        <div class="col-md-6">
          <p><strong>Jenis Kelamin:</strong> {{ $lamaran->siswa->user_profile->jk }}</p>
          <p><strong>Asal Sekolah:</strong> {{ $lamaran->siswa->user_profile->sekolah->nama_sekolah }}</p>
          <p><strong>Jurusan:</strong> {{ $lamaran->siswa->user_profile->jurusan->nama_jurusan }}</p>
          <p><strong>Kelas:</strong> {{ $lamaran->siswa->user_profile->kelas }}</p>
          <p><strong>Email:</strong> {{ $lamaran->siswa->email }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Telepon:</strong> {{ $lamaran->siswa->user_profile->telepon }}</p>
          <p><strong>Alamat:</strong> {{ $lamaran->siswa->user_profile->alamat }}</p>
          <p><strong>Status PKL:</strong> <span class="badge bg-success">Sedang PKL</span></p>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-3">
        <button type="button" class="btn btn-outline-success">
          <i class="mdi mdi-check"></i> Konfirmasi Siswa Selesai PKL
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
