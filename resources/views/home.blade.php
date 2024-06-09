@extends('home_master')
@section('home')

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Khitan Care</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- icon -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset ('assets/css/all.min.css')}}" rel="stylesheet"> --}}

    <!-- Favicons -->
    <link href="{{ asset ('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medilab
    * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
      <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope"></i> <a href="mailto:khitancare@gmail.com">khitancare@gmail.com</a>
          <i class="bi bi-phone"></i> +62 815 7204 6281
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
          {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> --}}
          <a href="https://www.instagram.com/lisay.rodh/" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.linkedin.com/in/lisayiharodhiatun/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
      </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ route('home-page')}}">KhitanCare</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            {{-- <li><a class="nav-link scrollto" href="#departments">Clinics</a></li> --}}
            <li class="dropdown"><a href="#"><span class="appointment-btn scrollto">Login</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{ route('admin.login')}}">Klinik Login</a></li>
                  <li><a href="#">Publik Login</a></li>
                </ul>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        {{-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Klinik Login</span></a> --}}
      </div>
    </header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="padding: 100px 0;">
    <div class="container d-flex flex-column flex-md-row align-items-start justify-content-start">
        <div class="hero-text col-md-6">
            <h1>Selamat Datang</h1>
            <h1>di Platform KhitanCare</h1>
            <h2>Platform penyedia layanan khitanan yang siap membantu Anda!</h2>
        </div>
    </div>
</section>


<!-- End Hero -->




  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Mengapa Memilih KhitanCare?</h3>
              <p>
                platform khitancare akan membantu Anda dalam memberikan berbagai informasi terkait layanan khitan,
                jangan ragu-ragu,
                Ayo cek dan daftar layanan khitan sekarang!!!
            </p>
              <div class="text-center">
                <a href="#about" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-8 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4 class="title"><a href="#faq">Frequently Asked Questions</a></h4>
                    <p>Berbagai Pertanyaan yang Sering di Ajukan</p>
                  </div>
                </div>

              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=wCS9FI8WfZI" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Informasi Penyedia Layanan Khitan</h3>
            <p>Platform ini tidak hanya menyediakan informasi layanan khitan, tetapi juga menyediakan informasi lainnya yang berkaitan dengan khitan</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-dna"></i></div>
              <h4 class="title"><a href="">Metode Khitan</a></h4>
              <p class="description">Kami menyediakan informasi mengenai metode khitan yang digunakan di setiap penyedia layanan khitan</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-money"></i></div>
              <h4 class="title"><a href="">Biaya Khitan</a></h4>
              <p class="description">Kami menyediakan informasi menyenai biaya layanan khitan</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-map"></i></div>
              <h4 class="title"><a href="">Lokasi Layanan Khitan</a></h4>
              <p class="description">Kami menyediakan informasi lokasi penyedia layanan khitan</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          {{-- <p>Kami melayani berbagai .....</p> --}}
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-id-card"></i></div>
              <h4><a href="">Pendaftaran Khitan</a></h4>
              <p>Memandu anda dalam proses pendaftaran pelayanan khitan</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-comment-medical"></i></div>
              <h4><a href="">Konsultasi Khitan</a></h4>
              <p>Anda dapat melakukan konsultasi dengan klinik pilihan anda</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">Konseling dan Edukasi</a></h4>
              <p>Menyediakan edukasi mengenai khitan</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Departments Section ======= -->
    {{-- <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Clinics</h2>
          <p>Berikut merupakan beberapa klinik khitan yang ada di Kabupaten Cianjur Wilayah IV</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Klinik Rabbani Hanjawar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Klinik Keluarga Ciherang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Klinik Al Fitrah Gunung Lanjung</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Sunat Modern Cipanas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Klinik Nur Assyifa Cikalongkulon</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Klinik Rabbani</h3>
                    <p class="fst-italic">Berada di Palasari, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat</p>
                    <p>Tidak hanya melayani pengobatan di poli umum, Klinik Rabbani juga menyediakan pelayanan khitan</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/klinik_rabbani.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Klinik Keluarga Ciherang</h3>
                    <p class="fst-italic">Berada di Kampung Cigombong, Ciherang, Kec. Pacet, Kabupaten Cianjur, Jawa Barat</p>
                    <p>Tidak hanya melayani pengobatan di poli umum, Klinik Rabbani juga menyediakan pelayanan khitan</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/klinik_keluargaciherang.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Klinik Al Fitrah Gunung Lanjung</h3>
                    <p class="fst-italic">Berada di Cugenang, Jalan Raya Gunung Lanjung, Kec. Cugenang, Kabupaten Cianjur, Jawa Barat</p>
                    <p>Penyedia khusus layanan khitan</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/klinik_alfitrahgununglanjung.jpeg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Sunat Modern Cipanas</h3>
                    <p class="fst-italic">Berada di Jl. Raya Cipanas - Cianjur, Sindangjaya, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat</p>
                    <p>Penyedia khusus layanan khitan</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/sunatmoderncipanas.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Klinik Nur Asyifa Cikalong Kulon</h3>
                    <p class="fst-italic">Berada di Jl. Hartono Kaumkulon, Sukagalih, Kec. Cikalongkulon, Kabupaten Cianjur, Jawa Barat</p>
                    <p>Tidak hanya melayani pengobatan di poli umum, Klinik Rabbani juga menyediakan pelayanan khitan</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/klinik_nurasyifacikalong.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </section><!-- End Departments Section -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Bagaimana cara registrasi dan login sebagai klinik? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Pada halaman utama, klik button yang bertuliskan Login di bagian pojok kanan atas, dan klik pilihan Klinik, kemudian akan di arahkan menuju form login.
                  Apabila akan mendaftar sebagai pengguna baru, maka klik "Creat New Account", setelah itu akan di arahkan menuju halaman registrasi,
                  isi data diri sesuai yang diminta hingga selesai. Kemudian kembali ke halaman Login, dan masuk menggunakan email serta password yang
                  sebelumnya telah anda daftarkan.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Bagaimana cara registrasi dan login sebagai publik? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Pada halaman utama, klik button yang bertuliskan Login di bagian pojok kanan atas, dan klik pilihan Publik, kemudian akan di arahkan menuju form login.
                    Apabila akan mendaftar sebagai pengguna baru, maka klik "Creat New Account", setelah itu akan di arahkan menuju halaman registrasi,
                    isi data diri sesuai yang diminta hingga selesai. Kemudian kembali ke halaman Login, dan masuk menggunakan email serta password yang
                    sebelumnya telah anda daftarkan.                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara untuk mendaftar pelayanan khitan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Setelah anda masuk sebagai pengguna, anda dapat melihat informasi sesuai yang anda butuhkan, seperti klinik khitan, metode khitan, biaya khitan, serta alamat penyedia layanan khitan.
                    Anda dapat memilih klinik sesuai dengan lokasi yang paling dekat dengan kediaman anda. Kemudian, setelah memilih klinik klik button daftar, dan isi formulir pendaftaran yang telah disediakan.
                    Setelah selesai, tunggu hingga klinik menghubungi anda.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>KhitanCare</h3>
            <p>
              Indonesia<br>
               <br><br>
              <strong>Phone:</strong> +62 815 7204 6281<br>
              <strong>Email:</strong> khitancare@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Medilab</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <script src="{{asset('assets/js/main.js')}}"></script>

</body>


@endsection
