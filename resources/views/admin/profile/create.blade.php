@extends('admin.admin_master')
@section('createprofile')


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

      <h1 class="logo me-auto"><a href="{{ route('admin.home') }}">KhitanCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('admin.home') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('admin.services') }}">Services</a></li>
          <li><a class="nav-link scrollto" href="{{ route('admin.doctors') }}">Doctors</a></li>
          <li><a class="nav-link scrollto" href="{{ route('admin.metode') }}">Methode</a></li>
          <li class="dropdown">
            <a href="#">
                <span class="appointment-btn scrollto dropdown-toggle no-arrow">{{ $admin_name }} </span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.profile') }}">
                    <i class="bi bi-person"></i> Profile <!-- Icon untuk logout -->
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout <!-- Icon untuk logout -->
                    </a>
                </li>

            </ul>
        </li>

       <!-- Form logout harus berada dalam <ul> -->
       <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
            </ul>
        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      {{-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> --}}

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
<section id="herodas" class="d-flex align-items-center" style="padding: 100px 0;">
    <div class="container d-flex flex-column flex-md-row align-items-center">
        <div class="hero-text col-md-6">
            <h3> Create Profile</h3>
            <h3>{{ $admin_name }}</h3>
        </div>
</section>
<!-- End Hero -->

<form action="{{ route('adminprofile.store') }}" method="POST">
    @csrf
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="d-flex align-items-center justify-content-end">
                                    <p class="text-uppercase text-sm" style="font-weight: bold; text-align: center;">Profile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm" style="font-weight: bold;">Informasi User</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" value="" name="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Alamat Email</label>
                                    <input class="form-control" type="email" value="" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Klinik</label>
                                    <input class="form-control" type="text" value="" name="nama_klinik">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm" style="font-weight: bold;">Location</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Alamat Lengkap</label>
                                    <input class="form-control" type="text"
                                        value="" name="alamat_lengkap">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kecamatan" class="form-control-label">Kecamatan</label>
                                    <select class="form-control" id="kecamatan" name="kecamatan" >
                                        <option value="">Pilih Kecamatan</option>
                                        <option value="Cipanas">Cipanas</option>
                                        <option value="Pacet">Pacet</option>
                                        <option value="Sukaresmi">Sukaresmi</option>
                                        <option value="Cugenang">Cugenang</option>
                                        <option value="Cikalong Kulon">Cikalong Kulon</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kabupaten</label>
                                    <input class="form-control" type="text" value="" name="kabupaten">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kode Pos</label>
                                    <input class="form-control" type="text" value="" name="kode_pos">
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm" style="font-weight: bold;">Kontak dan Media Sosial</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Whatsapp</label>
                                    <input class="form-control" type="text" value="" name="whatsapp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Telephone</label>
                                    <input class="form-control" type="text" value="" name="telephone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Instagram</label>
                                    <input class="form-control" type="text" value="" name="instagram">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Facebook</label>
                                    <input class="form-control" type="text" value="" name="facebook">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Website Klinik</label>
                                    <input class="form-control" type="text" value="" name="website_klinik">
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm" style="font-weight: bold;">Tentang Kami</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tentang Kami</label>
                                    <input class="form-control" type="text"
                                        value="" name="tentangklinik">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('assets/img/bgprofile.jpg') }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0 text-center position-relative">
                                <label for="upload-image">
                                    <img src="{{ asset('assets/img/avatarprofile.jpeg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white" id="image-preview">
                                </label>
                                <input type="file" id="upload-image" style="display: none;">
                                <label for="update-mage">
                                <span class="position-absolute bottom-0 start-50 translate-middle badge bg-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">

                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5>
                                {{ $admin_name }}<span class="font-weight-light"></span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Alamat
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>
</div>
</body>

 <!-- ======= Footer ======= -->

 <style>
    body {
      margin-bottom: 200px; /* Margin besar di bawah body */
    }
    footer {
      margin-top: 200px; /* Margin besar di atas footer */
    }
  </style>
 <!-- ======= Footer ======= -->

<footer id="footer" >
<div class="container d-md-flex py-5">

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

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</html>


@endsection
