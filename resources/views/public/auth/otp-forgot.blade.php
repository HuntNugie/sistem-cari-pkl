@extends("layout.public.auth")

@push("style")
   <style>
    body {
      background-color: #2f3041;
      color: #f1f1f1; /* putih terang */
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      background-color: #1e1e2f;
      border-radius: 15px;
      padding: 30px 25px;
    }
    .btn-orange {
      background-color: #ff6600;
      color: white;
    }
    .btn-orange:hover {
      background-color: #e65c00;
    }
    .resend-link.disabled {
      pointer-events: none;
      color: #888;
    }
    .otp-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 20px;
    }
    label, input::placeholder {
      color: #f1f1f1;
    }
    a.resend-link {
      color: #ffae42 !important;
    }
  </style>
@endpush
@section("auth")
<div class="m-3">
    <a href="{{ route("public.verifEmail") }}" class="btn btn-dark">Kembali</a>
</div>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card text-center shadow-lg" style="max-width: 400px; width: 100%;">
      <img src="{{ asset("Logo putihh.png") }}" alt="User" class="otp-image mx-auto">
      <h4 class="mb-3">Verifikasi Kode OTP Forgot Password</h4>
        <h5>Lihat kode otp di email {{ $email ?? ""}}</h5>
      <form action="{{ route('public.otp.aksi') }}" method="post">
        @csrf
        <div class="mb-3 text-start">
          <label for="otp" class="form-label">Masukkan Kode OTP</label>
          <input type="number" class="form-control" id="otp" name="otp" placeholder="Contoh: 123456" required>
        </div>

        <div class="d-grid mb-2">
          <button type="submit" class="btn btn-orange">Submit</button>
        </div>
      </form>

      <div class="text-center mt-3">
        <p id="timer" class="mb-1 text-warning">Waktu tersisa: 05:00</p>
        <a href="{{ route("public.verifEmail.forgot") }}" id="editEmail" class="resend-link text-decoration-none d-block mt-1">Salah email ? Edit email</a>
        <a href="{{ route("public.resend") }}" id="resendLink" class="resend-link disabled text-decoration-none d-block mt-1">Tidak ada kode otp ? Kirim ulang kode</a>
      </div>
    </div>
  </div>

  @push("script")
        <script>
    let timer = 300; // 5 menit
    const timerEl = document.getElementById("timer");
    const resendLink = document.getElementById("resendLink");

    const countdown = setInterval(() => {
      const minutes = Math.floor(timer / 60);
      const seconds = timer % 60;
      timerEl.textContent = `Waktu tersisa: ${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
      timer--;

      if (timer < 0) {
        clearInterval(countdown);
        timerEl.textContent = "Kode telah kedaluwarsa.";
      }
              resendLink.classList.remove("disabled");
        resendLink.style.color = "#ff6600";
    }, 1000);
  </script>
  @endpush
@endsection
