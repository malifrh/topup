<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/steps.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
    <style>
        .carousel-control-prev,
        .carousel-control-next {
            padding: 0 20px !important;
            width: auto !important
        }

        #trendingCarousel .carousel-inner {
            padding: 5px 3.5rem;
        }

        #trendingCarousel .carousel-control-prev,
        #trendingCarousel .carousel-control-next {
            color: inherit;
        }

        #trendingCarousel .carousel-indicators li {
            background-color: var(--my-primary) !important;
        }

        .my-img-carousel {
            height: 12rem;
            width: 100%;
            background-color: gray;
            border-radius: var(--my-rounded-1)
        }

        @media (min-width: 576px) {}

        @media (min-width: 768px) {
            .my-img-carousel {
                height: 15rem;
            }
        }

        @media (min-width: 992px) {
            .my-img-carousel {
                height: 18rem;
            }
        }

        @media (min-width: 1200px) {
            .my-img-carousel {
                height: 20rem;
            }
        }
    </style>
    <style>

    </style>
</head>

<body class="hold-transition layout-top-nav dark-mode">
    <div id="global-background-dark"></div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand">
            <div class="container" style="background-color: inherit">
                <div class="d-flex" style="width: 160px">
                    <a href="#" class="my-brand">LOGO</a>
                </div>
                <div id="search-block">
                    <form>
                        <div class="input-group" id="nav-search">
                            <input id="seach-field" class="form-control form-control-navbar pl-3 border-0" placeholder="Search.." aria-label="Search" style="border-radius: 2rem 0 0 2rem">
                            <div class="input-group-append">
                                <button class="btn btn-navbar pr-3 border-0" type="button" id="clear-search" style="border-radius: 0 2rem 2rem 0">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                            <div class="result-search">
                                <div class="result-search-item">
                                    <div>Sample Item</div>
                                    <div>example Mobile Legend</div>
                                </div>
                                <div class="result-search-item">
                                    <div>Sample Item</div>
                                    <div>example Mobile Legend</div>
                                </div>
                                <div class="result-search-item">
                                    <div>Sample Item</div>
                                    <div>example Mobile Legend</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="nav-wrapper">
                    <div id="btn-nav-search">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="d-inline-block">
                        <div class="my-btn-dropdown" style="cursor: pointer">
                            <i class="bi bi-person"></i>
                            <span>Admin</span>
                        </div>
                        <div class="my-dropdown" style="top: 55px; right: 15px;">
                            <div class="row">
                                <div class="col-3">
                                    <div class="bg-my-image my-profile-full" style="background-image: url('/adminlte/images/default_profile/1.jpg')"></div>
                                </div>
                                <div class="col-8">
                                    <div>Admin</div>
                                    <div>admin@admin.com</div>
                                </div>
                                <div class="col-1">
                                    <a href="#" style="margin-left: -10px;">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
                            </div>
                            <a class="btn btn-block btn-outline-danger mt-3" href="#">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            <section class="container section pb-3">
                <div id="bannerCarousel" class="carousel slide py-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#bannerCarousel" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="my-img-carousel"></div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                        <i class="bi bi-caret-left-fill" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                        <i class="bi bi-caret-right-fill" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            <section class="container section pb-3">
                <div class="ftco-blocks-cover-1 cover3 step-bystep" style="">
                    <div class="form-steps d-flex justify-content-center covers2" style="">
                        <div class="form-steps__item form-steps__item--active">
                            <div class="form-steps__item-content">
                                <span class="form-steps__item-icon"></span>
                                <span class="form-steps__item-text">Daftar</span>
                            </div>
                        </div>
                        <div class="form-steps__item form-steps__item--active">
                            <div class="form-steps__item-content">
                                <span class="form-steps__item-icon"></span>
                                <span class="form-steps__item-line"></span>
                                <span class="form-steps__item-text">Proses</span>
                            </div>
                        </div>
                        <div class="form-steps__item form-steps__item--active">
                            <div class="form-steps__item-content">
                                <span class="form-steps__item-icon"></span>
                                <span class="form-steps__item-line"></span>
                                <span class="form-steps__item-text">disetujui</span>
                            </div>
                        </div>
                        <div class="form-steps__item form-steps__item--active">
                            <div class="form-steps__item-content">
                                <span class="form-steps__item-icon"></span>
                                <span class="form-steps__item-line"></span>
                                <span class="form-steps__item-text">berjalan</span>
                            </div>
                        </div>
                        <div class="form-steps__item form-steps__item--active">
                            <div class="form-steps__item-content">
                                <span class="form-steps__item-icon"></span>
                                <span class="form-steps__item-line"></span>
                                <span class="form-steps__item-text">laporan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container section">
                <div class="section-header">
                    <div class="section-title">
                        <div class="section-title-text">
                            <<button class="btn-sm btn-primary" type="button" aria-selected="true"><small>Tersedia Voucher</small></button>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <?php foreach ($data as $result) { ?>
                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                <a href="/product/id" class="game-box">
                                    <!-- <div class="game-img"><img src="<?= $result['url_image'] ?>" style="width:100%;" alt=""></div> -->
                                    <img src="<?= $result['url_image'] ?>" alt="" class="game-img" height="175" width="175" style="height: 105px; background-color:grey;">
                                    <div class="game-title">
                                        <div>
                                            <?= $result['name'] ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="d-flex justify-content-between container">
                <div class="d-flex" style="gap: 1rem;">
                    <a href="">
                        <i class="bi bi-facebook"></i>
                        helo
                    </a>
                    <a href="">
                        <i class="bi bi-whatsapp"></i>
                        088888118811
                    </a>
                </div>
                <div class="d-none d-sm-inline">
                    Indonesia
                </div>
            </div>
        </footer>
    </div>
    <script src="https://demo.apivouchergame.com/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="https://demo.apivouchergame.com/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://demo.apivouchergame.com/adminlte/dist/js/adminlte.min.js"></script>
    <script src="https://demo.apivouchergame.com/script/client/nav.js"></script>
    <script src="https://demo.apivouchergame.com/script/client/default.js"></script>
</body>

</html>