@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="card border-0 shadow-lg rounded-5 bg-gradient" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="fw-bold text-primary mb-1">Riwayat Siswa PKL</h2>
                        <span class="badge bg-secondary bg-opacity-10 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #64748b !important;">Siswa yang telah menyelesaikan PKL</span>
                    </div>
                    <div class="d-flex flex-column align-items-end gap-2">
                        <img src="{{ asset("storage/") }}/{{ auth()->guard("perusahaan")->user()->perusahaanProfile->logo }}" alt="Foto Perusahaan" class="img-fluid rounded-3 shadow" style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="input-group shadow rounded-pill overflow-hidden">
                            <form action="" method="get" class="d-flex w-100">
                                <input type="text" class="form-control border-0 bg-light" name="search" placeholder="Cari siswa..." aria-label="Cari siswa">
                            <button class="btn btn-light border-0" type="submit"><i class="mdi mdi-magnify text-primary"></i></button>
                            </form>
                        </div>
                    </div>
                        <button type="button" class="btn btn-outline-danger rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#modalPrintSiswa">
                            <i class="mdi mdi-printer"></i> Print riwayat siswa PKL
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#modalDownloadSiswa">
                            <i class="mdi mdi-download"></i> Download Laporan
                        </button>
                </div>
                <div class="table-responsive rounded-4 shadow-sm">
                    <table class="table align-middle table-hover bg-white rounded-4 overflow-hidden">
                        <thead style="background: linear-gradient(90deg, #64748b 0%, #60a5fa 100%);">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">Nama Siswa</th>
                                <th class="text-white">Asal Sekolah</th>
                                <th class="text-white">Jenis Kelamin</th>
                                <th class="text-white">Jenis PKL</th>
                                <th class="text-white">Akhir PKL</th>
                                <th class="text-white">Status</th>
                                <th class="text-center text-white">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($riwayats as $riwayat)
                            <tr>
                                <td class="fw-semibold text-dark">{{ $loop->iteration }}</td>
                                <td><strong class="text-dark">{{ $riwayat->siswa->name }}</strong></td>
                                <td>{{ $riwayat->siswa->user_profile->sekolah->nama_sekolah }}</td>
                                <td>{{ $riwayat->siswa->user_profile->jk }}</td>
                                <td>{{ $riwayat->lowongan->judul_lowongan }}</td>
                                <td>{{ $riwayat->updated_at->format("d F Y") }}</td>
                                <td><span class="badge bg-success">Selesai</span></td>
                                <td class="text-center">
                                    <form action="{{ route("perusahaan.detail.riwayat",$riwayat->id) }}" method="get">
                                    <button type="submit" class="btn btn-outline-primary btn-sm rounded-pill" title="Detail">
                                        <i class="mdi mdi-eye"></i> Detail
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <span class="badge bg-secondary bg-opacity-25 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #64748b !important;">Total: 3 siswa</span>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal Cetak Laporan -->
<div class="modal fade" id="modalPrintSiswa" data-bs-focus="false" tabindex="-1" aria-labelledby="modalPrintSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route("perusahaan.cetak.riwayat") }}" target="_blank" method="GET" class="modal-content shadow-lg rounded-4 border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="modalPrintSiswaLabel">
                    <i class="mdi mdi-printer me-2"></i> Cetak Laporan Siswa PKL
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body bg-light">
                <div class="mb-3">
                    <label for="jumlah_siswa" class="form-label fw-semibold">Jumlah Siswa</label>
                    <input type="number" name="jumlah" class="form-control rounded-3 shadow-sm" id="jumlah_siswa" min="1" value="10" required>
                    <small class="text-muted">Masukkan jumlah siswa terbaru yang ingin dicetak</small>
                </div>
                
                <div class="mb-3">
                    <label for="filter_sekolah" class="form-label fw-semibold">Filter Sekolah (Opsional)</label>
                    <input type="text" id="search_sekolah" class="form-control mb-2" placeholder="Cari nama sekolah...">
                    <select name="sekolah" class="form-control" id="filter_sekolah" size="6">
                        <option value="">Semua sekolah</option>
                        @foreach($sekolah as $skl)
                            <option value="{{ $skl->id }}">{{ $skl->nama_sekolah }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="mdi mdi-printer me-1"></i> Cetak Laporan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Download Laporan -->
<div class="modal fade" id="modalDownloadSiswa" data-bs-focus="false" tabindex="-1" aria-labelledby="modalDownloadSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route("perusahaan.download.riwayat") }}" target="_blank" method="GET" class="modal-content shadow-lg rounded-4 border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="modalDownloadSiswaLabel">
                    <i class="mdi mdi-download me-2"></i> Download Laporan Siswa PKL
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body bg-light">
                <div class="mb-3">
                    <label for="jumlah_siswa_download" class="form-label fw-semibold">Jumlah Siswa</label>
                    <input type="number" name="jumlah" class="form-control rounded-3 shadow-sm" id="jumlah_siswa_download" min="1" value="10" required>
                    <small class="text-muted">Masukkan jumlah siswa terbaru yang ingin didownload</small>
                </div>
                
                <div class="mb-3">
                    <label for="filter_sekolah_download" class="form-label fw-semibold">Filter Sekolah (Opsional)</label>
                    <input type="text" id="search_sekolah_download" class="form-control mb-2" placeholder="Cari nama sekolah...">
                    <select name="sekolah" class="form-control" id="filter_sekolah_download" size="6">
                        <option value="">Semua sekolah</option>
                        @foreach($sekolah as $skl)
                            <option value="{{ $skl->id }}">{{ $skl->nama_sekolah }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Batal
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="mdi mdi-download me-1"></i> Download Laporan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

<style>
    /* Kustomisasi tampilan Select2 agar lebih modern */
    .select2-container--bootstrap-5 .select2-selection {
        border-radius: 0.75rem !important; /* Sudut lebih tumpul */
        box-shadow: 0 2px 4px rgba(0,0,0,0.05) !important;
        padding: 0.5rem 1rem !important; /* Menambah padding vertikal */
        height: auto !important;
    }

    .select2-container--bootstrap-5 .select2-dropdown {
        border-radius: 0.75rem !important; /* Sudut lebih tumpul untuk dropdown */
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        border: none !important;
    }

    .select2-container--bootstrap-5 .select2-results__option--highlighted {
        background-color: #4f46e5 !important; /* Warna highlight lebih gelap */
        color: white !important;
        border-radius: 0.5rem;
    }

    .select2-container--bootstrap-5 .select2-results__option {
        padding: 0.75rem 1rem !important; /* Padding lebih nyaman */
        list-style: none !important;
        background-image: none !important; /* Pastikan tidak ada marker */
    }

    .select2-container--bootstrap-5 .select2-results__options {
        padding: 0.5rem !important;
        list-style: none !important;
    }

    /* Pastikan tidak ada bullet pada item ter-render */
    .select2-container--bootstrap-5 .select2-selection__rendered,
    .select2-container--bootstrap-5 .select2-selection__rendered li {
        list-style: none !important;
    }
</style>
@push('style')
{{-- Aset untuk Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5.min.css" />
<style>
    #dropdown_sekolah {
        border-radius: 0.75rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        border: 1px solid #e5e7eb;
        z-index: 1055;
    }
    #dropdown_sekolah .dropdown-item {
        cursor: pointer;
        transition: background 0.15s;
        border-radius: 0.5rem;
    }
    #dropdown_sekolah .dropdown-item:hover, #dropdown_sekolah .dropdown-item:focus {
        background: #4f46e5;
        color: #fff;
    }
    </style>
@endpush

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modal Cetak
    const searchInput = document.getElementById('search_sekolah');
    const select = document.getElementById('filter_sekolah');
    const allOptions = Array.from(select.options);

    searchInput.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        select.innerHTML = '';
        allOptions.forEach(opt => {
            if (opt.text.toLowerCase().includes(filter) || opt.value === '') {
                select.appendChild(opt);
            }
        });
        if (filter === '' && select.options.length > 0) select.selectedIndex = 0;
    });
    const modal = document.getElementById('modalPrintSiswa');
    if (modal) {
        modal.addEventListener('show.bs.modal', function() {
            searchInput.value = '';
            select.innerHTML = '';
            allOptions.forEach(opt => select.appendChild(opt));
            select.selectedIndex = 0;
        });
    }

    // Modal Download
    const searchInputDownload = document.getElementById('search_sekolah_download');
    const selectDownload = document.getElementById('filter_sekolah_download');
    const allOptionsDownload = Array.from(selectDownload.options);

    searchInputDownload.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        selectDownload.innerHTML = '';
        allOptionsDownload.forEach(opt => {
            if (opt.text.toLowerCase().includes(filter) || opt.value === '') {
                selectDownload.appendChild(opt);
            }
        });
        if (filter === '' && selectDownload.options.length > 0) selectDownload.selectedIndex = 0;
    });
    const modalDownload = document.getElementById('modalDownloadSiswa');
    if (modalDownload) {
        modalDownload.addEventListener('show.bs.modal', function() {
            searchInputDownload.value = '';
            selectDownload.innerHTML = '';
            allOptionsDownload.forEach(opt => selectDownload.appendChild(opt));
            selectDownload.selectedIndex = 0;
        });
    }
});
</script>
@endpush

