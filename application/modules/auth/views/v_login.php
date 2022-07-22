<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= base_url() ?>style-admin/assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url() ?>style-admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>style-admin/assets/css/lineicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>style-admin/assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>style-admin/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>style-admin/assets/css/main.css" />
</head>

<body>

    <section class="signin-section mt-5">
        <div class="container-fluid">
            <div class="row g-0 auth-row d-flex align-items-center">
                <div class="col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-primary mb-10">Selamat Datang</h1>
                                <p class="text-medium">
                                    Website Pemetaan Pertanahan Di Desa Bantan Tengah
                                </p>
                            </div>
                            <div class="cover-image">
                                <img src="<?= base_url() ?>style-admin/assets/images/auth/signin-image.svg" alt="" />
                            </div>
                            <div class="shape-image">
                                <img src="<?= base_url() ?>style-admin/assets/images/auth/shape.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="signin-wrapper">
                        <div class="form-wrapper">
                            <h6 class="mb-15">Login Website</h6>
                            <p class="text-sm mb-25">
                                Silahkan login dengan username dan password yang benar.
                            </p>
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Username</label>
                                            <input type="email" placeholder="Username" />
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" />
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                        <div class="form-check checkbox-style mb-30">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="checkbox-remember" />
                                            <label class="form-check-label" for="checkbox-remember">
                                                Ingatkan saya</label>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                        <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                            <a href="#0" class="hover-underline">Lupa Password?</a>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="singin-option pt-40">
                                <p class="text-sm text-medium text-dark text-center">
                                    Belum punya akun ni?
                                    <a href="#">Buat akun sekarang dong</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- ========== signin-section end ========== -->



    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url() ?>style-admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/Chart.min.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/dynamic-pie-chart.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/moment.min.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/fullcalendar.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/jvectormap.min.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/world-merc.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/polyfill.js"></script>
    <script src="<?= base_url() ?>style-admin/assets/js/main.js"></script>
</body>

</html>