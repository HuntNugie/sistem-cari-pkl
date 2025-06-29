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
                        <button type="button" class="btn btn-outline-danger rounded-pill mb-2" onclick="window.print()">
                            <i class="mdi mdi-printer"></i> Print daftar siswa PKl
                        </button>
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
                                <th class="text-white">Akhir PKL</th>
                                <th class="text-center text-white">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold text-dark">1</td>
                                <td><strong class="text-dark">Ahmad Fauzi</strong></td>
                                <td>SMK Negeri 1 Jakarta</td>
                                <td>Laki-laki</td>
                                <td>Web Developer</td>
                                <td>2024-06-01</td>
                                <td>2024-09-30</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" title="Detail">
                                        <i class="mdi mdi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-dark">2</td>
                                <td><strong class="text-dark">Siti Nurhaliza</strong></td>
                                <td>SMK Negeri 2 Bandung</td>
                                <td>Perempuan</td>
                                <td>Desain Grafis</td>
                                <td>2024-06-10</td>
                                <td>2024-10-10</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" title="Detail">
                                        <i class="mdi mdi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-dark">3</td>
                                <td><strong class="text-dark">Budi Santoso</strong></td>
                                <td>SMK Negeri 3 Surabaya</td>
                                <td>Laki-laki</td>
                                <td>Mobile Developer</td>
                                <td>2024-07-01</td>
                                <td>2024-11-01</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" title="Detail">
                                        <i class="mdi mdi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
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
