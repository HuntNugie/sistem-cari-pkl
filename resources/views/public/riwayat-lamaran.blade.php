@extends("layout.public.public")

@section("content")
<div class="container pt-5" style="padding-top: 120px !important;">
    <div class="row justify-content-center">
        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Profil Siswa</h4>
                </div>
                <div class="card-body text-center">
                    @php
                        $avatar = auth()->user()->avatar ?? null;
                        $foto = auth()->user()->user_profile->foto ?? null;
                        if($foto){
                            $imgSrc = asset('storage/'.$foto);
                        }elseif($avatar){
                            $imgSrc = $avatar;
                        }else{
                            $imgSrc = 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=0D8ABC&color=fff&size=200';
                        }
                    @endphp
                    <img src="{{ $imgSrc }}" class="img-fluid rounded-circle shadow mb-3" alt="Foto Profil" style="width:120px;height:120px;object-fit:cover;">
                    <h5 class="fw-bold mb-1">{{ auth()->user()->name }}</h5>
                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                    <hr>
                    <div class="text-start ms-2">
                        <p class="mb-1"><strong>Asal Sekolah:</strong> {{ auth()->user()->user_profile->sekolah->nama_sekolah ?? '-' }}</p>
                        <p class="mb-1"><strong>Jurusan:</strong> {{ auth()->user()->user_profile->jurusan->nama_jurusan ?? '-' }}</p>
                        <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ auth()->user()->user_profile->jk ?? '-' }}</p>
                        <p class="mb-1"><strong>Telepon:</strong> {{ auth()->user()->user_profile->telepon ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Riwayat Lamaran Card -->
        <div class="col-md-8 mb-4">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Riwayat Lamaran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Judul Lamaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lamaran as $lamar)                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $lamar->lowongan->perusahaan->perusahaanProfile->nama_perusahaan }}</td>
                                    <td>{{ $lamar->lowongan->judul_lowongan }}</td>
                                    @if($lamar->status == "diterima")
                                    <td><span class="badge bg-success">{{ $lamar->status }}</span></td>
                                    @elseif($lamar->status == "ditolak")
                                    <td><span class="badge bg-danger">{{ $lamar->status }}</span></td>
                                    @else
                                    <td><span class="badge bg-warning">{{ $lamar->status }}</span></td>
                                    @endif
                                    <td>
                                        @if($lamar->status == "diterima")
                                        <form action="{{ route("public.pdf.lihat.diterima",$lamar->id) }}" method="get" target="_blank" class="d-inline">
                                            <button type="submit" class="btn btn-sm btn-primary me-1"><i class="bi bi-eye"></i> Lihat Surat</button>
                                        </form>

                                          <form action="{{ route("public.pdf.download.diterima",$lamar->id) }}" method="get" target="_blank" class="d-inline">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-download"></i> Download</button>
                                          </form>
                                        @elseif($lamar->status == "ditolak")
                                          <form action="{{ route("public.pdf.lihat.ditolak",$lamar->id) }}" method="get" target="_blank" class="d-inline">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Lihat Surat</button>
                                          </form>
                                          <form action="{{ route("public.pdf.download.ditolak",$lamar->id) }}" method="get" target="_blank" class="d-inline">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-download"></i> Download</button>
                                          </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
