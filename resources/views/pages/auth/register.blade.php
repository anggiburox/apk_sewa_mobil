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
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
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
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="row">
                            <!-- New row for image and login form -->
                            <div class="col-md-12">
                                <!-- <img src="{{asset('assets/logo/logo.png') }}" alt="" height="100"> -->
                            </div>
                        </div>

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center col-md-12">
                                <span class="d-none d-lg-block text-center">APLIKASI SEWA MOBIL
                                    </span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3" id='login-form'>
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                                </div>
                                @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                <form class="row g-3" action='auth/register/insertregister' method="post">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id_pengguna" value="{{$kode}}" required>
                                    <input type="hidden" class="form-control" name="id_user_roles" value="2" required>
                                    <div class="col-12">
                                        <label class="form-label">Masukan Nama</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="nama" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                    </div>
                                    <div class="col-12"> 
                                        <p class="small mb-0">Have an account? <a class="text-primary" href="/">Login</a>
                                        </p>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>
    <!-- <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{asset('assets/images/login-page-img.png') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-black">Register</h2>
                        </div>
                        @if(Session::has('errors'))
                        <div class="alert alert-danger">
                            {{Session::get('errors')}}
                        </div>
                        @endif
                        <form action="auth/register/insertregister" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="id_pasien" value="{{$kode}}" required>
                            <input type="hidden" class="form-control" name="id_user_roles" value="2" required>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Masukan Nama"
                                    required name="nama">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Masukan Username"
                                    required name="username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    required name="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Have an account? <a class="text-primary" href="/">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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