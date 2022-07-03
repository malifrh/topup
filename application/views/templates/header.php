<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?= site_url() ?>" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">

                            <li><a href="<?= site_url() ?>" class="<?php if ($this->uri->uri_string() == '') {
                                                                        echo 'active';
                                                                    } ?>">Home</a></li>
                            <li><a href="<?= site_url('invoice') ?>" class="<?php if ($this->uri->uri_string() == 'invoice') {
                                                                                echo 'active';
                                                                            } ?>">Check Invoice</a></li>

                            <?php
                            if ($this->session->userdata('email')) {
                            ?>
                                <li><a href="<?= site_url('history') ?>" class="<?php if ($this->uri->uri_string() == 'history') {
                                                                                    echo 'active';
                                                                                } ?>">Riwayat Transaksi</a></li>
                                <li style="margin-top: 6px;">
                                    <div class="my-btn-dropdown" style="cursor: pointer">
                                        <i class="bi bi-person"></i>
                                        <span><?= $this->session->userdata('email') ?> </span>

                                    </div>
                                    <div class="my-dropdown" style="top: 55px; right: 15px;">
                                        <a class="btn btn-block btn-outline-danger" href="<?= site_url('auth/logout') ?>">Logout</a>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?= site_url('auth/login') ?>">Login</a></li>
                            <?php } ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->