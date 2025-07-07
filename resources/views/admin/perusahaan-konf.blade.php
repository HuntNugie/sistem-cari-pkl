@extends("layout.admin.admin")
@section("content")
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Perusahaan Terkonfirmasi</h5>
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
                        @foreach ($perusahaan as $konfir )

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $konfir->nama_perusahaan }}</td>
                            <td>{{ $konfir->nomor_izin_usaha }}</td>
                            <td>{{ $konfir->pemilik }}</td>
                            <td>{{ $konfir->telepon }}</td>
                            <td>
                                <img src="{{ asset('storage') }}/{{ $konfir->logo ?? "-" }}" alt="Logo PT Maju Jaya" width="50">
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm">Detail</button>
                            </td>
                        </tr>
                        @endforeach

                    @if($perusahaan->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada perusahaan dengan nama {{ request("search") }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
