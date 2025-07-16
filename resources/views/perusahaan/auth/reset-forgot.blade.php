@extends("layout.perusahaan.perusahaan")

@section("auth")
  <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{ asset("Logo hitam.png") }}" alt="logo">
              </div>
              <h4>Reset password Perusahaan</h4>
              <h6 class="font-weight-light">Masukkan password baru</h6>
              <form class="pt-3" method="post" action="{{ route("perusahaan.reset.password.aksi") }}">
                @csrf
                <div class="form-group">
                  <label>Password baru</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label>Konfirmasi password baru</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="konfirmasi_password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="konfirmasi_password">
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Reset Password</button>
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
