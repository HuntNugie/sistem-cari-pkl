@extends("layout.admin.admin")
@push("style")
    <style>
           .saran-card {
      transition: all 0.3s ease;
    }
    .saran-card:hover {
      transform: scale(1.01);
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
    }
    </style>
@endpush
@section("content")
 <div class="container mt-5 mb-5" style="padding-top: 80px;">
    <h2 class="mb-4 text-center">📬 Kritik & Saran dari Pengguna</h2>
    <div class="saran-list" style="max-height: 60vh; overflow-y: auto; padding-right: 15px;">
    @forelse($kritik as $item)
         <!-- Data 1 -->
    <div class="card mb-3 shadow-sm saran-card">
      <div class="card-header bg-light d-flex justify-content-between">
        <div><strong>#{{ $loop->iteration }} - {{ $item->nama }}</strong></div>
        <div class="text-muted small">{{ $item->email }}</div>
      </div>
      <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted"><strong>Subjek:</strong> {{ $item->subjek }}</h6>
        <p class="mb-3">{{ $item->pesan }}</p>
        <div class="text-end">
          <span class="badge bg-secondary">{{ $item->created_at->format("d F Y, H:i") }}</span>
        </div>
      </div>
    </div>
    @empty
    <div class="alert alert-info text-center">
      Belum ada kritik atau saran yang masuk.
    </div>
        @endforelse
</div>

  </div>
@endsection
