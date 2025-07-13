@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-sm mt-4">
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
                        <div class="col-7">{{ $siswa->lamaran()->where('status','selesai')->first()->status ?? 'Belum PKL' }}</div>
                    </div>
                    <div class="mt-4 text-center d-flex justify-content-center gap-2">
    <a href="{{ route('admin.siswa.aktif') }}" class="btn btn-secondary">Kembali</a>
    <form action="{{ route('admin.siswa.aktif.hapus', $siswa->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-danger btn-konfirmasi">Hapus</button>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
          document.querySelectorAll('.btn-konfirmasi').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data ini tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
    </script>
@endpush