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
        <div class="container-login100" style="background-image: url(<?= base_url() ?>);">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Login
                </span>
                <?= $this->session->flashdata('pesan') ?>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?= base_url('auth/login') ?>" class="user">
                    <div class="wrap-input100 validate-input" data-validate="Silahkan masukkan email anda">
                        <input class="input100" type="email" name="email" placeholder="Masukkan Email">
                        <?= form_error('email', '<div class="text-danger small ml-2">', '</div') ?>
                        <span class="focus-input100" data-placeholder="&#xe818;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Silahkan masukkan password anda">
                        <input class="input100" type="password" name="password" placeholder="Masukkan Password">
                        <?= form_error('password', '<div class="text-danger small ml-2">', '</div') ?>
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Login
                        </button>

                    </div>
                    <br>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('register/index') ?>" style="color: #000e24;">Create an Account!</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url() ?>" style="color: #000e24;">Back to Home!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <script src="<?= base_url() ?>assets/vendor2/jquery/jquery-3.2.1.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor2/animsition/js/animsition.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor2/bootstrap/js/popper.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendor2/bootstrap/js/bootstrap.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor2/select2/select2.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor2/daterangepicker/moment.min.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendor2/daterangepicker/daterangepicker.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

    <script src="<?= base_url() ?>assets/vendor2/countdowntime/countdowntime.js" type="0691b80f6798fbcf1463d141-text/javascript"></script>

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