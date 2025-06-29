@extends("layout.perusahaan.perusahaan")

@section("content")
<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="card border-0 shadow-lg rounded-5 bg-gradient" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="fw-bold text-primary mb-1">Daftar Lowongan PKL</h2>
                        <span class="badge bg-primary bg-opacity-10 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Lowongan PKL untuk siswa SMK</span>
                    </div>
                    <a href="#" class="btn btn-gradient-primary rounded-pill px-4 py-2 shadow-sm d-flex align-items-center gap-2" style="background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%); border: none; color: #fff;">
                        <i class="mdi mdi-plus fs-5"></i> Tambah Lowongan
                    </a>
                </div>
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="input-group shadow rounded-pill overflow-hidden">
                            <input type="text" class="form-control border-0 bg-light" placeholder="Cari lowongan..." aria-label="Cari lowongan">
                            <button class="btn btn-light border-0" type="button"><i class="mdi mdi-magnify text-primary"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive rounded-4 shadow-sm">
                    <table class="table align-middle table-hover bg-white rounded-4 overflow-hidden">
                        <thead style="background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%);">
                            <tr>
                                <th class="text-white">#</th>
                                <th class="text-white">Judul Lowongan</th>
                                <th class="text-white">Lokasi</th>
                                <th class="text-white">Tanggal Posting</th>
                                <th class="text-white">Kuota</th>
                                <th class="text-white">Status</th>
                                <th class="text-center text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold text-dark">1</td>
                                <td>
                                    <strong class="text-dark">Desain Grafis</strong>
                                    <div class="text-muted small">Divisi Kreatif</div>
                                </td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Jakarta</span>
                                </td>
                                <td class="text-dark">25 Juni 2025</td>
                                <td>
                                    <span class="badge bg-secondary bg-opacity-75 text-white px-3 py-2 rounded-pill">5/5</span>
                                </td>
                                <td>
                                    <span class="badge bg-danger bg-opacity-75 px-3 py-2 rounded-pill text-white">Penuh</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-circle mx-1" title="Lihat"><i class="mdi mdi-eye"></i></button>
                                    <button type="button" class="btn btn-outline-warning btn-sm rounded-circle mx-1" title="Edit"><i class="mdi mdi-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-circle mx-1" title="Hapus"><i class="mdi mdi-delete"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-dark">2</td>
                                <td>
                                    <strong class="text-dark">Teknik Komputer Jaringan</strong>
                                    <div class="text-muted small">Divisi IT</div>
                                </td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Bandung</span>
                                </td>
                                <td class="text-dark">20 Juni 2025</td>
                                <td>
                                    <span class="badge bg-secondary bg-opacity-75 text-white px-3 py-2 rounded-pill">3/10</span>
                                </td>
                                <td>
                                    <span class="badge bg-success bg-opacity-75 px-3 py-2 rounded-pill text-white">Tersedia</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-circle mx-1" title="Lihat"><i class="mdi mdi-eye"></i></button>
                                    <button type="button" class="btn btn-outline-warning btn-sm rounded-circle mx-1" title="Edit"><i class="mdi mdi-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-circle mx-1" title="Hapus"><i class="mdi mdi-delete"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-dark">3</td>
                                <td>
                                    <strong class="text-dark">Multimedia</strong>
                                    <div class="text-muted small">Divisi Produksi</div>
                                </td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">Surabaya</span>
                                </td>
                                <td class="text-dark">18 Juni 2025</td>
                                <td>
                                    <span class="badge bg-secondary bg-opacity-75 text-white px-3 py-2 rounded-pill">7/100</span>
                                </td>
                                <td>
                                    <span class="badge bg-success bg-opacity-75 px-3 py-2 rounded-pill text-white">Tersedia</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded-circle mx-1" title="Lihat"><i class="mdi mdi-eye"></i></button>
                                    <button type="button" class="btn btn-outline-warning btn-sm rounded-circle mx-1" title="Edit"><i class="mdi mdi-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-circle mx-1" title="Hapus"><i class="mdi mdi-delete"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <span class="badge bg-primary bg-opacity-25 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Total: 3 lowongan</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
