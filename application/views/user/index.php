        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner">
            <div class="container">
                <div class="row">
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
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        <div class="categories-collections">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collections" style="margin-top:0px">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-heading">
                                        <div class="line-dec"></div>
                                        <h2>Tersedia <em>Voucher</em> Game</h2>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="owl-collection owl-carousel">
                                        <?php foreach ($data as $result) { ?>
                                            <div class="item">
                                                <img src="<?= $result['url_image'] ?>" alt="" class="game-img" height="175" width="175" style="height: 205px; background-color:#243748;">
                                                <div class="down-content">
                                                    <h4 style="color: #fff;"><?= $result['name'] ?></h4>
                                                    <span class="collection">Items In
                                                        Collection:<br><strong>9/9</strong></span>
                                                    <span class="category">Category:<br><strong>Diamond</strong></span>
                                                    <div class="main-button">
                                                        <a href="<?= site_url('order/voucher/' . $result['slug'] . '') ?>">Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>