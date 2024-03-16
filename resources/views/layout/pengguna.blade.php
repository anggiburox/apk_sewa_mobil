<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>APK-SEWA MOBIL</title>

    <link href="{{asset('assets/logo/logo.png') }}" rel="shortcut icon">

    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" /> -->
    <!-- <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" /> -->
    <link href="{{asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


    <!-- =======================================================
  * Template Name: Nicepengguna
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-pengguna-bootstrap-pengguna-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
/* .header { */
/* max-width: 100%; */
/* overflow-x: hidden; */
/* } */

.logo-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
}
</style>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo "></div>
            <i class="bi bi-list toggle-sidebar-btn text-black"></i>&nbsp;
            <img src="{{asset('assets/logo/tounch-icons.png')}}" alt="" width='30' />&nbsp;
            <span class="d-lg-block" style="font-weight:bold;">
                <span class="d-none d-lg-inline">APLIKASI SEWA MOBIL</span>
            </span>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/logout">
                        <span>Sign Out</span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>

    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="/pengguna/dashboard">
                    <i class="bx bxs-widget text-black"></i>
                    <span class='text-black'>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/pengguna/manajemen_mobil">
                    <i class="bi bi-car-front text-black"></i>
                    <span class='text-black'>Manajemen Mobil</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/pengguna/peminjaman_mobil">
                    <i class="bi bi-car-front text-black"></i>
                    <span class='text-black'>Peminjaman Mobil</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/pengguna/pengembalian_mobil">
                    <i class="bi bi-car-front text-black"></i>
                    <span class='text-black'>Pengembalian Mobil</span>
                </a>
            </li>


        </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script> -->
    <script src="{{asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <!-- <script src="assets/vendor/quill/quill.min.js"></script>-->
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js') }}"></script>

</body>

</html>