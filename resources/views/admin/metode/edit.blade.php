@extends('admin.admin_master')
@section('editmetode')


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


  Copy code
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="padding: 50px 0;">

  </section>
  <section class="mt-5">
    <div class="container d-flex flex-column align-items-center">
        <div class="mb-4 bg-light rounded p-4" style="width: 80%;">
            <h3 class="text-center">Edit Metode Khitan</h3>
            <h3 class="text-center">{{ $admin_name }}</h3>
        </div>
          <div style="clear: both;"></div>
          <div class="card mb-3 w-100">
              <div class="card-body">
                  @if(session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif

                  <form action="{{ route('adminmetode.update', $adminId) }}" method="POST">
                      @csrf
                      @method('PUT')

                      <button type="submit" class="btn btn-primary mb-3 btn-sm">Update</button>

                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th style="text-align: center;">Metode Khitan</th>
                                  <th style="text-align: center;">Deskripsi</th>
                                  <th style="text-align: center;">Rincian Harga</th>
                                  <th style="text-align: center;">Keterangan</th>
                                  <th style="text-align: center;">Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($dataMetode as $item)
                              <tr>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->deskripsi }}</td>
                                  <td>
                                      <div class="form-group">
                                          <input type="text" class="form-control form-control-sm" id="rincian_harga" name="rincian_harga_{{$item->id_metode}}" value="{{ $item->rincian_harga }}">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-group">
                                          <select class="form-control form-control-sm" id="keterangan" name="keterangan_{{$item->id_metode}}">
                                              <option value="Tersedia" {{ $item->keterangan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                              <option value="Tidak Tersedia" {{ $item->keterangan == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                          </select>
                                      </div>
                                  </td>
                                  <td style="text-align: center;">
                                      @if ($item->keterangan === 'Tersedia')
                                          &#10004;
                                      @else
                                          &#10008;
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </form>
              </div>
          </div>
      </div>
  </section>
  <!-- End Hero -->


 <!-- ======= Footer ======= -->

 <!-- ======= Footer ======= -->

 <footer id="footer" style="margin-top: 300px;">
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

    </main>
</section>
    @endsection


