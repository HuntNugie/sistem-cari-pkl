@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Pengajuan Konfirmasi perusahaan</h5>
            <!-- Search Form -->
            <form method="GET" action="" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama perusahaan, nomor izin, atau pemilik..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Nomor Izin Usaha</th>
                            <th>Pemilik</th>
                            <th>No Telepon</th>
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data perusahaan akan ditampilkan di sini -->
                        @foreach ($ajuan as $non => $key)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $key->perusahaan->perusahaanProfile->nama_perusahaan }}</td>
                            <td>{{ $key->perusahaan->perusahaanProfile->nomor_izin_usaha }}</td>
                            <td>{{ $key->perusahaan->perusahaanProfile->pemilik }}</td>
                            <td>{{ $key->perusahaan->perusahaanProfile->telepon }}</td>
                            <td>
                                <img src="{{ asset("storage") }}/{{ $key->perusahaan->perusahaanProfile->logo }}" alt="Logo PT Maju Jaya" width="50">
                            </td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi{{ $non+1 }}">Konfirmasi</button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#tolak{{ $non+1 }}" >Tolak</button>
                                    <button class="btn btn-info btn-sm">Detail</button>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                        {{ $ajuan->links("pagination::bootstrap-5") }}
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($ajuan as $non => $key)
{{-- modal untuk konfirmasi --}}
<div class="modal" id="konfirmasi{{ $non+1 }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi pengajuan perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Informasi Perusahaan -->
            <div class="modal-body">
                <div class="mb-2">
                    <strong>Nama Perusahaan:</strong> {{ $key->perusahaan->perusahaanProfile->nama_perusahaan }}
                </div>
                <div class="mb-2">
                    <strong>Pemilik:</strong> {{ $key->perusahaan->perusahaanProfile->pemilik }}
                </div>
                <div class="mb-2">
                    <strong>Nomor Izin Usaha:</strong> {{ $key->perusahaan->perusahaanProfile->nomor_izin_usaha }}
                </div>
                <div class="mb-2">
                    <strong>File Pendukung:</strong>
                    @if($key->file_pendukung)
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pdfModal{{ $non+1 }}">
                            <i class="bi bi-file-earmark-arrow-down"></i> Lihat File
                        </button>
                    @else
                        <span class="text-muted">Tidak ada file</span>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{ route("admin.ajuan.aksi",$key->id) }}">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="alasanKonfirmasi{{ $non+1 }}" class="form-label">Alasan Konfirmasi</label>
                        <textarea class="form-control" id="alasanKonfirmasi{{ $non+1 }}" name="alasan" rows="3" required></textarea>
                        <input type="hidden" name="nilai" value="diterima">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal untuk tolak --}}
<div class="modal" id="tolak{{ $non+1 }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Pengajuan perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Informasi Perusahaan -->
            <div class="modal-body">
                <div class="mb-2">
                    <strong>Nama Perusahaan:</strong> {{ $key->perusahaan->perusahaanProfile->nama_perusahaan }}
                </div>
                <div class="mb-2">
                    <strong>Pemilik:</strong> {{ $key->perusahaan->perusahaanProfile->pemilik }}
                </div>
                <div class="mb-2">
                    <strong>Nomor Izin Usaha:</strong> {{ $key->perusahaan->perusahaanProfile->nomor_izin_usaha }}
                </div>
                <div class="mb-2">
                    <strong>File Pendukung:</strong>
                    @if($key->file_pendukung)
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pdfModal{{ $non+1 }}">
                            <i class="bi bi-file-earmark-arrow-down"></i> Lihat File
                        </button>
                    @else
                        <span class="text-muted">Tidak ada file</span>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{ route("admin.ajuan.aksi",$key->id) }}">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="alasanKonfirmasi{{ $non+1 }}" class="form-label">Alasan Di tolak</label>
                        <textarea class="form-control" id="alasanKonfirmasi{{ $non+1 }}" name="alasan" rows="3" required></textarea>
                        <input type="hidden" name="nilai" value="ditolak">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- menampilkan PDF --}}
<!-- Modal untuk menampilkan PDF -->
<div class="modal fade" id="pdfModal{{ $non+1 }}" tabindex="-1" aria-labelledby="pdfModalLabel{{ $non+1 }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel{{ $non+1 }}">File Pendukung - {{ $key->perusahaan->perusahaanProfile->nama_perusahaan }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 80vh;">
                @if($key->file_pendukung)
                    <iframe src="{{ asset('storage/' . $key->file_pendukung) }}" width="100%" height="100%" style="min-height: 70vh;" frameborder="0"></iframe>
                @else
                    <div class="alert alert-warning mb-0">File PDF tidak tersedia.</div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#konfirmasi{{ $non+1 }}">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

