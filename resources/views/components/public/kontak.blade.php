<div>
   <section id="kontak" class="contact section">
      <style>
          /* Style turunan dari php-email-form agar tampilan tetap konsisten */
          .styled-form .form-control{
              padding:12px 15px;
              border-radius:4px;
              box-shadow:none;
              font-size:14px;
          }
          .styled-form .form-control:focus{
              border-color:#4154f1;
              box-shadow:0 0 0 0.2rem rgba(65,84,241,.25);
          }
          .styled-form button[type="submit"]{
              background-image:linear-gradient(90deg,#ff8800 0%, #ff5e00 100%);
              border:0;
              padding:10px 30px;
              color:#fff;
              transition:0.4s;
              border-radius:4px;
          }
          .styled-form button[type="submit"]:hover{
              background:#ff9900;
          }
      </style>


      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>Kec Tanjungsari Kab sumedang jawa barat</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+62 8515 7933 682</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>huntcode99@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="{{ route('admin.kritik.saran.aksi') }}" method="post" class="styled-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="nama" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subjek" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="pesan" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  @if(session('sukses'))
                      <div class="alert alert-success">{{ session('sukses') }}</div>
                  @endif


                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section>
</div>
