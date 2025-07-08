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
                    <a href="{{ route("perusahaan.tambah.lowongan") }}" class="btn btn-gradient-primary rounded-pill px-4 py-2 shadow-sm d-flex align-items-center gap-2" style="background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%); border: none; color: #fff;">
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

                            @foreach ($lowongan as $low)
                            <tr>
                                <td class="fw-semibold text-dark">{{ $loop->iteration }}</td>
                                <td>
                                    <strong class="text-dark">{{ $low->judul_lowongan }}</strong>
                                </td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-white px-3 py-2 rounded-pill">{{ $low->perusahaan->perusahaanProfile->alamat }}</span>
                                </td>
                                <td class="text-dark">{{ $low->created_at->diffForHumans() }}</td>
                                <td>
                                    <span class="badge bg-secondary bg-opacity-75 text-white px-3 py-2 rounded-pill">{{ $low->kuota }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $low->status == "tersedia" ? "success" : "danger" }} bg-opacity-75 px-3 py-2 rounded-pill text-white">{{ Str::upper($low->status) }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        <form class="m-0 p-0" action="{{ route("perusahaan.detail.lowongan",$low->id) }}">
                                            <button type="submit" class="btn btn-outline-primary btn-sm rounded-circle mx-1" title="Lihat"><i class="mdi mdi-eye"></i></button>
                                        </form>
                                        <button type="button" class="btn btn-outline-warning btn-sm rounded-circle mx-1" title="Edit"><i class="mdi mdi-pencil"></i></button>
                                        <form action="{{ route("perusahaan.hapus.lowongan",$low->id) }}" method="post" class="m-0 p-0">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="btn btn-outline-danger btn-sm rounded-circle mx-1 btn-konfirmasi" title="Hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-end">
                    <span class="badge bg-primary bg-opacity-25 fw-semibold px-3 py-2 rounded-pill text-white" style="background: #2563eb !important;">Total: {{ $lowongan->count() }} lowongan</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("script")
    <script>
          document.querySelectorAll('.btn-konfirmasi').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data ini tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
    </script>
@endpush
