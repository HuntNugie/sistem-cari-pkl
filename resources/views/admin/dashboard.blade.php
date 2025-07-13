@extends("layout.admin.admin")

@section('content')
<div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Siswa yang baru bergabung</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">
                  @foreach($siswa as $item)
                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">{{ $item->created_at->format('d F Y') }}</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1"> {{ $item->name ?? "-"}} </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">daftar ajuan perusahaan baru</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama perusahaan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pemilik</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nomor izin usaha</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Detail</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($perngajuan as $key => $value)
                        
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{ $value->perusahaan->perusahaanProfile->nama_perusahaan }}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $value->perusahaan->perusahaanProfile->pemilik }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary rounded-3 fw-semibold">{{ $value->perusahaan->perusahaanProfile->nomor_izin_usaha }}</span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                            <a href="{{ route("admin.ajuan.detail",[$value->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                        </td>
                      </tr>
                      @empty
                        
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col my-2">
            <div class="card bg-white text-dark shadow-lg h-100">
            <div class="card-body">
                <h5 class="card-title d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                Siswa Aktif
                </h5>
                <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">{{ $jumlah }}</h4>
                <a href="{{ route("admin.siswa.aktif") }}" class="btn btn-outline-primary">Pergi ke halaman</a>
                </div>
            </div>
            </div>
        </div>

        <div class="col my-2">
            <div class="card bg-white text-dark shadow-lg h-100">
            <div class="card-body">
                <h5 class="card-title d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    <path d="M19 22v-6" />
                    <path d="M22 19l-3 -3l-3 3" />
                </svg>
                Siswa sedang PKL
                </h5>
                <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">{{ $jmlSiswaPkl }}</h4>
                <a href="{{ route("admin.siswa.pkl") }}" class="btn btn-outline-primary">Pergi ke halaman</a>
                </div>
            </div>
            </div>
        </div>

        <div class="col my-2">
            <div class="card bg-white text-dark shadow-lg h-100">
            <div class="card-body">
                <h5 class="card-title d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                    <path d="M16 8h2c1 0 2 1 2 2v11" />
                    <path d="M3 21h18" />
                </svg>
                Perusahaan Terkonfirmasi
                </h5>
                <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">{{ $jmlPerusahaanKonf }}</h4>
                <a href="{{ route("admin.perusahaan.terkonfirmasi") }}" class="btn btn-outline-primary">Pergi ke halaman</a>
                </div>
            </div>
            </div>
        </div>

        <div class="col my-2">
            <div class="card bg-white text-dark shadow-lg h-100">
            <div class="card-body">
                <h5 class="card-title d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 21l18 0" />
                    <path d="M9 8l1 0" />
                    <path d="M14 8l1 0" />
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                </svg>
                Perusahaan Belum Dikonfirmasi
                </h5>
                <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">{{ $jmlPerusahaanNonf }}</h4>
                <a href="{{ route("admin.perusahaan.belum.terkonfirmasi") }}" class="btn btn-outline-primary">Pergi ke halaman</a>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by NGK Company Distributed by <a href="https://themewagon.com">SICAPE</a></p>
        </div>
      </div>

@endsection
