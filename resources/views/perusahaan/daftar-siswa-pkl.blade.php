@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="card border-0 shadow-lg rounded-5 bg-gradient" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="fw-bold text-primary mb-1">Daftar Siswa Sedang menjalani PKL</h2>
                        <span class="badge bg-primary bg-opacity-10 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Siswa yang sedang menjalani PKL</span>
                    </div>
                    <div class="d-flex flex-column align-items-end gap-2">
                        <img src="https://imgs.search.brave.com/u8H3BWoeboLS8ZzcK--kPKpplSeTX_xRbPZVFhmyJms/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cHJlbWl1bS12ZWN0/b3IvbWluaW1hbGlz/dC10eXBlLWNyZWF0/aXZlLWJ1c2luZXNz/LWxvZ28tdGVtcGxh/dGVfMTI4MzM0OC0y/MDQ5Mi5qcGc_c2Vt/dD1haXNfaHlicmlk/Jnc9NzQw" alt="Foto Perusahaan" class="img-fluid rounded-3 shadow" style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="input-group shadow rounded-pill overflow-hidden">
                            <input type="text" class="form-control border-0 bg-light" placeholder="Cari siswa..." aria-label="Cari siswa">
                            <button class="btn btn-light border-0" type="button"><i class="mdi mdi-magnify text-primary"></i></button>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('perusahaan.cetak.siswa.pkl') }}" class="btn btn-outline-danger rounded-pill mb-2" >
                            <i class="mdi mdi-printer"></i> Print daftar siswa PKL
                        </a>
                        <a href="" class="btn btn-outline-primary rounded-pill mb-2">
                            <i class="mdi mdi-download"></i> Download Laporan
                        </a>
                    </div>
                </div>
                <div class="table-responsive rounded-4 shadow-sm">
                    <table class="table align-middle table-hover bg-white rounded-4 overflow-hidden">
                        <thead style="background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%);">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">Nama Siswa</th>
                                <th class="text-white">Asal Sekolah</th>
                                <th class="text-white">Jenis Kelamin</th>
                                <th class="text-white">Jenis PKL</th>
                                <th class="text-white">Awal PKL</th>
                                <th class="text-center text-white">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $sis)
                                
                            <tr>
                                <td class="fw-semibold text-dark">{{ $loop->iteration }}</td>
                                <td><strong class="text-dark">{{ $sis->siswa->name }}</strong></td>
                                <td>{{ $sis->siswa->user_profile->sekolah->nama_sekolah }}</td>
                                <td>{{ $sis->siswa->user_profile->jk }}</td>
                                <td>{{ $sis->lowongan->judul_lowongan }}</td>
                                <td>{{ $sis->updated_at->format("d F Y") }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" title="Detail">
                                        <i class="mdi mdi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <span class="badge bg-primary bg-opacity-25 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Total: 3 siswa</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
