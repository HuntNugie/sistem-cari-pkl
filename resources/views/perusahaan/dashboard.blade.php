@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-primary d-flex align-items-center">
            <div class="card-body py-5">
                <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-account-plus text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">{{ $jmlSiswaBaru ?? 0 }} Siswa Baru</h5>
                        <p class="mt-2 text-white card-text">Siswa yang baru mendaftar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-success d-flex align-items-center">
            <div class="card-body py-5">
                <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-school text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">{{ $jmlSiswaPkl ?? 0 }} Siswa PKL</h5>
                        <p class="mt-2 text-white card-text">Siswa yang sedang PKL</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-info d-flex align-items-center">
            <div class="card-body py-5">
                <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-briefcase text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">{{ $jmlLowongan ?? 0 }} Lowongan</h5>
                        <p class="mt-2 text-white card-text">Lowongan PKL yang dibuat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="mdi mdi-account-multiple-plus me-2"></i>
                    Daftar 5 Siswa Baru Mendaftar
                </h5>
                <a href="{{ route("perusahaan.daftar.siswa.baru") }}" class="btn btn-outline-primary btn-sm">
                    <i class="mdi mdi-eye"></i> Lihat Semua
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center">Foto</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Lowongan PKL</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswaBaru as $siswa)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset("storage") }}/{{ $siswa->siswa->user_profile->foto }}" alt="Herman Beck" class="rounded-circle" width="48" height="48">
                                </td>
                                <td class="fw-semibold">{{ $siswa->siswa->name }}</td>
                                <td><span class="badge bg-primary text-white">{{ $siswa->siswa->user_profile->jk }}</span></td>
                                <td>{{ $siswa->lowongan->judul_lowongan }}</td>
                                <td class="text-center">
                                    <a href="{{ route("perusahaan.detail.siswa.baru",$siswa->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="mdi mdi-information-outline"></i> Detail & konfirmasi
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-top-0">
                <a href="#" class="btn btn-primary w-100 fw-semibold">
                    <i class="mdi mdi-arrow-right-bold-circle-outline me-1"></i>
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </div>
</div>
<!-- row end -->
@endsection
