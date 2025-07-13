@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg mt-4" style="box-shadow: 0 0.5rem 2rem 0.5rem rgba(0,0,0,0.35)!important;">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Detail Perusahaan</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <img src="{{ $perusahaan->perusahaanProfile->logo ? asset('storage/'.$perusahaan->perusahaanProfile->logo) : 'https://ui-avatars.com/api/?name='.urlencode($perusahaan->perusahaanProfile->nama_perusahaan).'&background=0D8ABC&color=fff&size=400' }}" alt="Logo Perusahaan" class="rounded-circle shadow" style="width: 90px; height: 90px; object-fit: cover;">
                            </div>
                            <div>
                                <h4 class="mb-1">{{ $perusahaan->perusahaanProfile->nama_perusahaan ?? '-' }}</h4>
                                <span class="text-muted">{{ $perusahaan->perusahaanProfile->pemilik ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Alamat</div>
                            <div class="col-8 fw-semibold">{{ $perusahaan->perusahaanProfile->alamat ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Email</div>
                            <div class="col-8">{{ $perusahaan->email ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">No Telepon</div>
                            <div class="col-8">{{ $perusahaan->perusahaanProfile->telepon ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Website</div>
                            <div class="col-8">{{ $perusahaan->perusahaanProfile->website ?? '-' }}</div>
                        </div>
                    </div>
                    <h6 class="fw-semibold mt-4 mb-3">Daftar Lowongan di Perusahaan Ini</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Judul Lowongan</th>
                                    <th>Deskripsi</th>
                                    <th style="width: 15%">Jumlah Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($perusahaan->lowongan as $i => $lowongan)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $lowongan->judul_lowongan }}</td>
                                    <td>{{ $lowongan->deskripsi_lowongan }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $lowongan->lamaran()->where("status", "diterima")->count() ?? 0 }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada lowongan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-center d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.perusahaan.terkonfirmasi') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
