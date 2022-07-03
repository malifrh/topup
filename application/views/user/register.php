    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css">

    <div class="limiter">
        <div class="container-login100" style="background-image: url(<?= site_url() ?>);">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Register
                </span>
                <?= $this->session->flashdata('pesan') ?>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?= site_url('register/index') ?>" class="user">

                    <div class="wrap-input100 validate-input" data-validate="Silahkan masukkan email anda">
                        <input class="input100" type="email" name="email" placeholder="Masukkan Email">
                        <?= form_error('email', '<div class="text-danger small ml-2">', '</div') ?>
                        <span class="focus-input100" data-placeholder="&#xe818;"></span>
                    </div>

                    <div class="form-group row">

                        <div class="wrap-input100 validate-input" data-validate="Enter your password">
                            <input class="input100" type="password" name="password_1" placeholder="Password">
                            <?= form_error('password_1', '<div class="text-danger small ml-2">', '</div') ?>
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter your pass word">
                            <input class="input100" type="password" name="password_2" placeholder="Re-Password">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Register
                        </button>

                    </div>
                    <br>
                    <div class="text-center">
                        <a class="small" href="<?= site_url('auth/login') ?>" style="color: #000e24;">Already have an account? Login!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor/animsition/js/animsition.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/popper.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor/daterangepicker/moment.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor/countdowntime/countdowntime.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/js/main.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="0691b80f6798fbcf1463d141-text/javascript"></script>
    <script type="0691b80f6798fbcf1463d141-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="0691b80f6798fbcf1463d141-|49" defer=""></script>