@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="card border-0 shadow-lg rounded-5 bg-gradient" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="fw-bold text-primary mb-1">Daftar Siswa Baru PKL</h2>
                        <span class="badge bg-primary bg-opacity-10 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Siswa PKL yang baru mendaftar</span>
                    </div>
                    <div>
                        <img src="{{ asset("storage") }}/{{ auth()->guard("perusahaan")->user()->perusahaanProfile->logo }}" alt="Foto Perusahaan" class="img-fluid rounded-3 shadow" style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="input-group shadow rounded-pill overflow-hidden">
                            <input type="text" class="form-control border-0 bg-light" placeholder="Cari siswa..." aria-label="Cari siswa">
                            <button class="btn btn-light border-0" type="button"><i class="mdi mdi-magnify text-primary"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive rounded-4 shadow-sm">
                    <table class="table align-middle table-hover bg-white rounded-4 overflow-hidden">
                        <thead style="background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%);">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">Nama Siswa</th>
                                <th class="text-white">Asal Sekolah</th>
                                <th class="text-white">Kelas</th>
                                <th class="text-white">Jurusan</th>
                                <th class="text-white">Jenis Kelamin</th>
                                <th class="text-white">Judul Lowongan</th>
                                <th class="text-center text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $sis)

                            <tr>
                                <td class="fw-semibold text-dark">{{ $loop->iteration }}</td>
                                <td><strong class="text-dark">{{ $sis->siswa->name }}</strong></td>
                                <td>{{ $sis->siswa->user_profile->sekolah->nama_sekolah }}</td>
                                <td>{{ $sis->siswa->user_profile->kelas }}</td>
                                <td>{{ $sis->siswa->user_profile->jurusan->nama_jurusan }}</td>
                                <td>{{ $sis->siswa->user_profile->jk }}</td>
                                <td>{{ $sis->lowongan->judul_lowongan }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill mx-1" title="Detail">
                                            <i class="mdi mdi-eye"></i> Detail
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm rounded-pill mx-1" title="Konfirmasi">
                                            <i class="mdi mdi-check"></i> Konfirmasi
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill mx-1" title="Tolak">
                                            <i class="mdi mdi-close"></i> Tolak
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <span class="badge bg-primary bg-opacity-25 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Total: {{ $siswa->count() }} siswa</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
