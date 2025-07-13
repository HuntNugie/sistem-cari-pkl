@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg mt-4" style="box-shadow: 0 0.5rem 2rem 0.5rem rgba(0,0,0,0.35)!important;">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Detail Ajuan Perusahaan</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <img src="{{ $pengajuan->perusahaan->perusahaanProfile->logo ? asset('storage/'.$pengajuan->perusahaan->perusahaanProfile->logo) : 'https://ui-avatars.com/api/?name='.urlencode($pengajuan->perusahaan->perusahaanProfile->nama_perusahaan).'&background=0D8ABC&color=fff&size=400' }}" alt="Logo Perusahaan" class="rounded-circle shadow" style="width: 90px; height: 90px; object-fit: cover;">
                            </div>
                            <div>
                                <h4 class="mb-1">{{ $pengajuan->perusahaan->perusahaanProfile->nama_perusahaan ?? '-' }}</h4>
                                <span class="text-muted">{{ $pengajuan->perusahaan->perusahaanProfile->pemilik ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Alamat</div>
                            <div class="col-8 fw-semibold">{{ $pengajuan->perusahaan->perusahaanProfile->alamat ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Email</div>
                            <div class="col-8">{{ $pengajuan->perusahaan->email ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">No Telepon</div>
                            <div class="col-8">{{ $pengajuan->perusahaan->perusahaanProfile->telepon ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Alamat</div>
                            <div class="col-8">{{ $pengajuan->perusahaan->perusahaanProfile->alamat ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Website</div>
                            <div class="col-8">{{ $pengajuan->perusahaan->perusahaanProfile->website ?? '-' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted">Nomor Izin Usaha</div>
                            <div class="col-8">{{ $pengajuan->perusahaan->perusahaanProfile->nomor_izin_usaha ?? '-' }}</div>
                        </div>
                    </div>
                    <h6 class="fw-semibold mt-4 mb-3">Dokumen Pendukung Perusahaan</h6>
                    @if($pengajuan->file_pendukung)
                        <div class="mb-3">
                            <a href="{{ asset('storage/'.$pengajuan->file_pendukung) }}" target="_blank" class="btn btn-primary mb-2">Lihat Dokumen PDF</a>
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ asset('storage/'.$pengajuan->file_pendukung) }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">Dokumen pendukung belum diupload oleh perusahaan.</div>
                    @endif
                    <div class="mt-4 text-center d-flex justify-content-center gap-2">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
