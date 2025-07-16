@extends("layout.perusahaan.perusahaan")

@section("auth")
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="mb-3">
                                <a href="{{ route("perusahaan.login") }}" class="btn btn-outline-primary btn-sm position-absolute" style="top: 25px; left: 50px;"><i class="mdi mdi-arrow-left-circle"></i> Kembali</a>
                            </div>
                            <div class="brand-logo">
                                <img src="{{ asset("logo.svg") }}" alt="logo">
                            </div>
                            <h4>Verifikasi Email Forgot Password</h4>
                            <h6 class="font-weight-light">Masukkan email yang sudah terdaftar</h6>
                            <form class="pt-3" method="POST" action="{{ route('perusahaan.verifEmail.aksi') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-email-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" value="{{ $email ?? "" }}" class="form-control form-control-lg border-left-0" placeholder="Email" required autofocus>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kirim Verifikasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2025 SICAPE All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
@endsection
