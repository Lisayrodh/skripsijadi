<!DOCTYPE html>
<html>

<!DOCTYPE html>

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
            <li><a class="nav-link scrollto " href="{{route('user.home')}}">Home</a></li>
            <li><a class="nav-link scrollto active" href="{{route('user.clinics')}}">Klinik</a></li>
            {{-- <li><a class="nav-link scrollto" href="{{route('user.profile')}}">Profile</a></li> --}}
            <li>
              <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
              <form action="{{ route('user.logout') }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit" class="btn-logout  btn-oval nav-link scrollto">
                      Log out
                  </button>
              </form>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .clinic-name {
            display: block;
            text-decoration: none;
            color: #20466e;
            font-size: 1.1em;
            padding: 10px 20px;
            background-color: #ffffff;
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
            text-align: center; /* Center align text */
            margin: 0 auto; /* Center align block */
            width: fit-content; /* Fit the width of content */
        }

        .clinic-name:hover {
            color: #ffffff;
            background-color: #0056b3;
        }

        #hero {
            padding: 50px 0;
            background-color: rgba(255, 255, 255, 0.9);
            margin-bottom: 200px; /* Large margin to separate hero from footer */
        }
    </style>
    <!-- ======= Hero Section ======= -->
    <body>
        <main>
        <section id="hero" class="d-flex align-items-center" style="padding: 100px 0; background-color: rgba(255, 255, 255, 0.9);">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center">
                <div class="hero-text col-md-6">
                    <div class="container" style="padding: 100px 0; background-color: rgba(178, 214, 255, 0.9); border-radius: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top: 200px; margin-bottom: 50px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-center mb-5" style="font-weight: bold; color: #0056b3;">Detail Klinik: {{ $clinic->clinic_name }}</h3>
                                            <ul class="list-unstyled text-center">
                                                <li class="mb-3">
                                                    <button class="btndok btn-primary" >
                                                        <a href="{{ route('user.clinic.profile', ['id' => $clinic->id_admin]) }}" style="color: #ffffff; text-decoration: none;">Profile</a>
                                                    </button>
                                                    <button class="btndok btn-primary" >
                                                        <a href="{{ route('user.clinic.doctors', ['id' => $clinic->id_admin]) }}" style="color: #ffffff; text-decoration: none;">Doctor</a>
                                                    </button>
                                                    <button class="btndok btn-primary" >
                                                        <a href="{{ route('user.clinic.methods', ['id' => $clinic->id_admin]) }}" style="color: #ffffff; text-decoration: none;">Metode</a>
                                                    </button>
                                                    <button class="btndok btn-primary" >
                                                        <a href="{{ route('user.clinic.services', ['id' => $clinic->id_admin]) }}" style="color: #ffffff; text-decoration: none;">Pelayanan</a>
                                                    </button>
                                                    <br>
                                                    <br>
                                                    <a href="{{ route('user.clinics') }}">Kembali ke Daftar Klinik</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
  </body>



       <!-- ======= Footer ======= -->
       <footer id="footer">
        <div class="footer-top"></div>
        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>KhitanCare</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
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
</html>
