@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Siswa Sedang PKL</h5>
            <!-- Search Form -->
            <form class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari nama siswa, sekolah, atau tempat PKL...">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Tempat PKL</th>
                            <th>Jenis Kelamin</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data siswa PKL akan ditampilkan di sini -->
                        @forelse ($siswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->user_profile->sekolah->nama_sekolah }}</td>
                            <td>{{ $item->lamaran()->where("status","diterima")->first()->lowongan->perusahaan->perusahaanProfile->nama_perusahaan }}</td>
                            <td>{{ $item->user_profile->jk }}</td>
                            <td>
                                <form action="{{ route('admin.siswa.pkl.detail', $item->id) }}" method="get">
                                    <button type="submit" class="btn btn-info btn-sm">Detail</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data siswa PKL</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
@endsection
