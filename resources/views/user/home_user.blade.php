
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Khitan Care</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

      <h1 class="logo me-auto"><a href="index.html">KhitanCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('user.home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('user.clinics')}}">Klinik</a></li>
          {{-- <li><a class="nav-link scrollto" href="{{route('user.profile')}}">Profile</a></li> --}}
          <li>
            <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout <!-- Icon untuk logout -->
            </a>
        </li>
                {{-- <li>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout <!-- Icon untuk logout -->
                    </a>
                </li> --}}
        </li>

      {{-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> --}}

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="padding: 100px 0;">
    <div class="container d-flex flex-column flex-md-row align-items-center">

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <style>
            .hero-text {
                margin-bottom: 50px; /* Adjust this value as needed */
            }
        </style>
      <div class="container">
        <div class="hero-text col-md-6 mb-20">
            <h1>Welcome to KhitanCare</h1>
            <h1> "{{ $user_name }}" </h1>
        </div>
            <div class="row">
                <div class="row">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4 mb-30">
                                <a href="{{ route('user.clinics') }}" class="card-box d-block mx-auto pd-20 text-secondary">
                                    <div class="content text-center">
                                        <div class="img rounded-circle d-flex justify-content-center align-items-center" style="width: 270px; height: 270px; overflow: hidden;">
                                            <img src="{{ asset('assets/img/ListKlinik.png') }}" alt="List Klinik" class="img-fluid" style="object-fit: cover; width: 130%; height: 120%;">
                                        </div>
                                        <h3 class="text-center">Penyedia Layanan Khitan</h3>
                                        <p class="max-width-200">
                                            Menampilkan penyedia layanan khitan yang tersedia
                                        </p>
                                    </div>
                                </a>
                            </div>
                                <div class="col-md-4 mb-20">
                                    <a href="{{ route('user.panduan') }}" class="card-box d-block mx-auto pd-20 text-secondary">
                                        <div class="content text-center">
                                            <div class="img rounded-circle d-flex justify-content-center align-items-center" style="width: 270px; height: 270px; overflow: hidden;">
                                                <img src="{{ asset('assets/img/Help.png') }}" alt="Help" class="img-fluid" style="object-fit: cover; width: 130%; height: 120%;">
                                            </div>
                                            <h3 class="text-center">Panduan Mendaftar</h3>
                                            <p class="max-width-200">
                                                Menampilkan tutorial daftar layanan khitan
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                    <div class="col-md-4 mb-20">
                                        <a href="{{ route('user.daftar') }}" class="card-box d-block mx-auto pd-20 text-secondary">
                                            <div class="content text-center">
                                                <div class="img rounded-circle d-flex justify-content-center align-items-center" style="width: 270px; height: 270px; overflow: hidden;">
                                                    <img src="{{ asset('assets/img/Daftar.png') }}" alt="Daftar" class="img-fluid" style="object-fit: cover; width: 130%; height: 120%;">
                                                </div>
                                                <h3 class="h4">Daftar Layanan Khitan</h3>
                                                <p class="max-width-200">
                                                    Ayok cek layanan khitan, dan segera daftar sekarang
                                                </p>
                                            </div>
                                        </a>
                                    </div>
            </div>

        </div>


      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Contact Section ======= -->

    {{-- <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>
      <div>
        {{-- <iframe style="border:0; width: 100%; height: 350px;" src="" frameborder="0" allowfullscreen></iframe>
      </div> --}}

        {{-- <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Info</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet"> --}}

        {{-- <section id="counts" class="counts">
            <div class="container">

              <div class="row">

                <div class="col-lg-3 col-md-8 mx-auto">
                  <div class="count-box text-center">
                    <i  class="far fa-hospital"></i>
                    <h6>Location</h6>
                    <p></p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0 mx-auto">
                  <div class="count-box text-center">
                    <i class="far fa-envelope"></i>
                    <h6>Email</h6>
                    <p></p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 mx-auto">
                  <div class="count-box text-center">
                    <i class="fas fa-comments"></i>
                    <h6>Whatsapp</h6>
                    <p></p>
                  </div>
                </div>
            </div>
        </section> --}}

        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </section> --}}

    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="col-md-6 footer-contact">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>KhitanCare</h3>
                                <p>Indonesia</p>
                            </div>
                            <div class="col-md-8 text-right">
                                <div class="social-links pt-3 pt-md-0">
                                    <strong>Phone:</strong> +62 815 7204 6281<br>
                                    <strong>Email:</strong> khitancare@gmail.com<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>KhitanCare</span></strong>. All Rights Reserved
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



</html>
