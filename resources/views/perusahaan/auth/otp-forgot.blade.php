@extends("layout.perusahaan.perusahaan")

@section("auth")
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        
                        <div class="brand-logo">
                            <img src="{{ asset("logo.svg") }}" alt="logo">
                        </div>
                        <h4>Verifikasi OTP Forgot Password</h4>
                        <h6 class="font-weight-light">Masukkan kode OTP yang telah dikirim ke email Anda</h6>
                        <div class="mb-3">
                            <span id="timer" class="badge badge-info">05:00</span>
                            <small class="text-muted ml-2">Kode OTP berlaku selama 5 menit</small>
                        </div>
                        <form class="pt-3" method="POST" action="{{ route("perusahaan.otp.forgot.aksi") }}">
                            @csrf
                            <div class="form-group">
                                <label>Kode OTP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="mdi mdi-shield-key-outline text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="otp" class="form-control form-control-lg border-left-0" placeholder="Masukkan Kode OTP" required autofocus maxlength="6">
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Verifikasi OTP</button>
                            </div>
                            <div class="mt-3 text-center">
                                <a href="{{ route("perusahaan.resend.otp") }}" id="resend-btn" class="btn btn-link text-primary p-0 disabled" tabindex="-1" aria-disabled="true">Kirim ulang</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                               Salah email ? <a href="{{ route('perusahaan.verifEmail.forgot') }}" class="text-primary">edit email</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection

@push('script')
<script>
    let timer = 300; // 5 minutes in seconds
    const resendBtn = document.getElementById('resend-btn');
    resendBtn.classList.add('disabled');
    resendBtn.setAttribute('tabindex', '-1');
    resendBtn.setAttribute('aria-disabled', 'true');

    let timerInterval = setInterval(function() {
        let minutes = Math.floor(timer / 60);
        let seconds = timer % 60;
        document.getElementById('timer').textContent =
            (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        if (timer <= 0) {
            clearInterval(timerInterval);
            document.getElementById('timer').textContent = '00:00';
            resendBtn.classList.remove('disabled');
            resendBtn.removeAttribute('tabindex');
            resendBtn.removeAttribute('aria-disabled');
        }
           resendBtn.classList.remove('disabled');
            resendBtn.removeAttribute('tabindex');
            resendBtn.removeAttribute('aria-disabled');
        timer--;
    }, 1000);
</script>
@endpush
