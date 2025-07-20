@extends("layout.public.public")

@push("style")
<style>
  section.detail-section {
    background-image: url('{{ asset("lgn.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding-top: 120px; /* tambahkan lebih banyak padding agar tidak tertutup navbar */
  }
  .table-hover tbody tr:hover {
    background-color: #f8f9fa;
  }
  .btn-detail {
    background-color: #fd7e14;
    border-color: #fd7e14;
  }
</style>
@endpush

@section("content")

<section class="py-5 bg-light detail-section" style="margin-top: 50px">
  <div class="container" data-aos="fade-up">

    <!-- Tombol kembali -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
      <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    {{-- Detail Perusahaan & Lowongan --}}
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-body px-4 py-5">

        <!-- Header -->
        <div class="d-flex align-items-start gap-3 mb-4">
          <img src="{{ asset('storage') }}/{{ $perusahaan->perusahaanProfile->logo }}" alt="Logo Perusahaan" class="rounded-circle border shadow-sm" width="80" height="80">
          <div>
            <h3 class="fw-bold mb-1">{{ $perusahaan->perusahaanProfile->nama_perusahaan }}</h3>
            <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill me-2"></i>{{ $perusahaan->perusahaanProfile->alamat }}</p>
          </div>
        </div>

        <!-- Info Kontak -->
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i><strong>Email:</strong> {{ $perusahaan->email }}</p>
            <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i><strong>Telepon:</strong> {{ $perusahaan->perusahaanProfile->telepon }}</p>
            <p class="mb-1"><i class="bi bi-person-fill me-2"></i><strong>Pemilik:</strong> {{ $perusahaan->perusahaanProfile->pemilik }}</p>
          </div>
          <div class="col-md-6">
            <p class="mb-1"><i class="bi bi-globe me-2"></i><strong>Website:</strong> <a href="{{ $perusahaan->perusahaanProfile->website }}" target="_blank" >{{ $perusahaan->perusahaanProfile->website }}</a></p>
            <p class="mb-1"><i class="bi bi-card-checklist me-2"></i><strong>No. Izin Usaha:</strong> {{ $perusahaan->perusahaanProfile->nomor_izin_usaha }}</p>
          </div>
        </div>

        <!-- Deskripsi -->
        <div class="mb-2">
          <h5 class="fw-semibold">Tentang Perusahaan</h5>
          <p class="text-muted">
            {!! nl2br(e($perusahaan->perusahaanProfile->deskripsi)) !!}
          </p>
        </div>

        <hr class="my-4">

        {{-- Daftar Lowongan --}}
        <div>
            <h5 class="mb-3 fw-semibold"><i class="bi bi-list-task me-2"></i>Lowongan Tersedia</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Judul Lowongan</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Kuota</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($perusahaan->lowongan as $lowongan)
                        <tr>
                            <td class="fw-medium">{{ $lowongan->judul_lowongan }}</td>
                            <td>{{ $lowongan->jurusan->nama_jurusan }}</td>
                            <td>{{ $lowongan->kuota }}</td>
                            <td>
                                @if ($lowongan->status == 'Tersedia')
                                    <span class="badge bg-success">{{ $lowongan->status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $lowongan->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('public.detail.pkl', $lowongan->id) }}" class="btn btn-sm btn-detail text-white">
                                    <i class="bi bi-eye-fill"></i> Lihat Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada lowongan yang tersedia dari perusahaan ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

      </div>
    </div>

  </div>
</section>

@endsection
