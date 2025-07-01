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
 <div class="container mt-5 mb-5">
    <h2 class="mb-4 text-center">📬 Kritik & Saran dari Pengguna</h2>

    <!-- Data 1 -->
    <div class="card mb-3 shadow-sm saran-card">
      <div class="card-header bg-light d-flex justify-content-between">
        <div><strong>#1 - Andi Pratama</strong></div>
        <div class="text-muted small">andi@gmail.com</div>
      </div>
      <div class="card-body">
        <p class="mb-3">Website ini sangat membantu saya dalam mencari informasi perusahaan PKL. Terima kasih tim pengembang!</p>
        <div class="text-end">
          <span class="badge bg-secondary">01 Juli 2025, 08:30</span>
        </div>
      </div>
    </div>

    <!-- Data 2 -->
    <div class="card mb-3 shadow-sm saran-card">
      <div class="card-header bg-light d-flex justify-content-between">
        <div><strong>#2 - Rina Sari</strong></div>
        <div class="text-muted small">rina.sari@gmail.com</div>
      </div>
      <div class="card-body">
        <p class="mb-3">Mungkin fitur pencarian bisa ditambahkan filter jurusan agar lebih mudah digunakan.</p>
        <div class="text-end">
          <span class="badge bg-secondary">30 Juni 2025, 14:12</span>
        </div>
      </div>
    </div>

    <!-- Data 3 -->
    <div class="card mb-3 shadow-sm saran-card">
      <div class="card-header bg-light d-flex justify-content-between">
        <div><strong>#3 - Bayu Nugroho</strong></div>
        <div class="text-muted small">bayu_nugroho@gmail.com</div>
      </div>
      <div class="card-body">
        <p class="mb-3">Saya menyarankan agar sistem ini juga tersedia dalam bentuk aplikasi Android agar lebih fleksibel digunakan di mana saja.</p>
        <div class="text-end">
          <span class="badge bg-secondary">28 Juni 2025, 11:45</span>
        </div>
      </div>
    </div>

    <!-- Jika Tidak Ada Data -->
    <!--
    <div class="alert alert-info text-center">
      Belum ada kritik atau saran yang masuk.
    </div>
    -->

  </div>
@endsection
