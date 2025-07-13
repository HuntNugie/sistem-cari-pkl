@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-lg mt-4" style="box-shadow: 0 0.5rem 2rem 0.5rem rgba(0,0,0,0.35)!important;">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Detail Siswa</h5>
                    <div class="d-flex flex-column align-items-center mb-4">
                        @php
                          $foto = $siswa->user_profile->foto ?? null;
                          $avatar = $siswa->avatar ?? null;
                          if($foto){
                            $imgSrc = asset('storage/'.$foto);
                          }elseif($avatar){
                            $imgSrc = $avatar;
                          }else{
                            $imgSrc = 'https://ui-avatars.com/api/?name='.urlencode($siswa->name).'&background=0D8ABC&color=fff&size=400';
                          }
                        @endphp
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFotoSiswa">
                          <img src="{{ $imgSrc }}" alt="Foto Siswa" class="rounded-circle shadow" style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;">
                        </a>
                        <h4 class="mb-1">{{ $siswa->name ?? '-' }}</h4>
                        <span class="text-muted">{{ $siswa->user_profile->nis ?? '-' }}</span>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Nama Siswa</div>
                        <div class="col-7 fw-semibold">{{ $siswa->name ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">NIS</div>
                        <div class="col-7">{{ $siswa->user_profile->nis ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Kelas</div>
                        <div class="col-7">{{ $siswa->user_profile->kelas ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Asal Sekolah</div>
                        <div class="col-7">{{ $siswa->user_profile->sekolah->nama_sekolah ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Jurusan</div>
                        <div class="col-7">{{ $siswa->user_profile->jurusan->nama_jurusan ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Email</div>
                        <div class="col-7">{{ $siswa->email ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">No Telepon</div>
                        <div class="col-7">{{ $siswa->user_profile->telepon ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Status PKL</div>
                        <div class="col-7">Sedang PKL</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Sedang PKL :</div>
                        <div class="col-7 badge bg-primary">{{ $siswa->lamaran()->where('status','diterima')->first()->lowongan->judul_lowongan ?? '-' }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 text-muted">Perusahaan :</div>
                        <div class="col-7 badge bg-success">{{ $siswa->lamaran()->where('status','diterima')->first()->lowongan->perusahaan->perusahaanProfile->nama_perusahaan ?? '-' }}</div>
                    </div>
                    <div class="mt-4 text-center d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.siswa.pkl') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
