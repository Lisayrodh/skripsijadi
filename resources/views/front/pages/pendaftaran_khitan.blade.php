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

        <h1 class="logo me-auto"><a href="{{ route('dashboard')}}">KhitanCare</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="{{ route('dashboard')}}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{ route('dashboard')}}#about">About</a></li>
            <li><a class="nav-link scrollto" href="{{ route('dashboard')}}#services">Services</a></li>
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
            {{-- <h2>Informasi Metode dan Biaya Khitan</h2> --}}
        </div>
    </div>
</section>


<!-- End Hero -->

<main id="main">


    <style>
        table {
            width: 80%; /* Lebar tabel */
            margin: 0 auto; /* Menempatkan tabel di tengah */
            border-collapse: collapse; /* Menggabungkan batas sel */
        }

        th, td {
            padding: 8px; /* Jarak di setiap kolom */
            border: 1px solid #ddd; /* Garis batas */
            text-align: left; /* Penyelarasan teks kiri */
        }

        th {
            background-color: #f2f2f2; /* Warna latar belakang untuk header */
        }
    </style>
        <main id="main">
            <div style="text-align: center;">
                <div style="margin-bottom: 20px;">
                  <img src="<?php echo asset('assets/img/pendaftaran_khitan.jpg');?>" alt="Informasi Khitan" class="img-fluid">
                </div>
              </div>
            <div style="text-align: center;">
                    {{-- <p>
                        Sumber informasi:

                        https://www.klikdokter.com/info-sehat/kesehatan-umum/panduan-memilih-metode-sunat-yang-paling-aman
                        https://hellosehat.com/parenting/kesehatan-anak/biaya-sunat-di-klinik/
                        https://www.klikdokter.com/info-sehat/kesehatan-umum/panduan-memilih-metode-sunat-yang-paling-aman
                        https://www.halodoc.com/janji-medis/nama/sunat-laser
                    </p> --}}
                </div>
            </div>
        </main>
    </main>
    </table>
</main>
