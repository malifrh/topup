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
                <div class="ftco-blocks-cover-1 cover3 step-bystep">
                    <div class="form-steps d-flex justify-content-center covers2">
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
                            <button class="btn-sm btn-primary" type="button" aria-selected="true"><small>Tersedia Voucher</small></button>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <?php foreach ($data as $result) { ?>
                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                                <a href="<?= base_url('order/voucher/' . $result['slug'] . '') ?>" class="game-box">
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