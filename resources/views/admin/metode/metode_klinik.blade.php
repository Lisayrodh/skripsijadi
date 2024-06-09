@extends('admin.admin_master')
@section('profile')


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
          <li><a class="nav-link scrollto " href="{{ route('admin.services') }}">Services</a></li>
          <li><a class="nav-link scrollto" href="{{ route('admin.doctors') }}">Doctors</a></li>
          <li><a class="nav-link scrollto active" href="{{ route('admin.metode') }}">Methode</a></li>
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
 <section id="hero" class="d-flex align-items-center" style="padding: 50px 0;">

</section>
<!-- End Hero -->

<section class="mt-5">
    <div class="container d-flex flex-column align-items-center">
        <div class="mb-4 bg-light rounded p-4" style="width: 80%;">
            <h3 class="text-center">Metode Khitan</h3>
            <h3 class="text-center">{{ $admin_name }}</h3>
        </div>
        <div class="w-100 d-flex flex-column align-items-center">
            <div style="text-align: left; margin-bottom: 10px; display: flex; justify-content: flex-start; width: 80%;">
                <a href="{{ route('adminmetode.edit', $adminId) }}" class="btn btn-primary" style="border-radius: 20px;">Edit</a>
            </div>
            <div class="table-responsive" style="width: 80%;">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Metode Khitan</th>
                            <th>Deskripsi</th>
                            <th>Rincian Harga</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mtd as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['deskripsi'] }}</td>
                                <td>{{ $item['hrg'] }}</td>
                                <td>{{ $item['ket'] }}</td>
                                <td>{!! $item['ket'] === 'Tersedia' ? '&#10004;' : '&#10008;' !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- End Hero -->


<style>
    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

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



