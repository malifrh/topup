        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>AdminLTE 3 | Top Navigation</title>

            <!-- <link rel="stylesheet" href="https://demo.apivouchergame.com/style/client/default.css"> -->
            <link rel="stylesheet" href="https://demo.apivouchergame.com/style/client/nav.css">

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

            <!-- <link rel="stylesheet" href="https://demo.apivouchergame.com/adminlte/dist/css/adminlte.css"> -->

            <link rel="stylesheet" href="https://demo.apivouchergame.com/style/client/custom.css">
            <style>
                .radio-card label {
                    padding: 0.7rem 1.2rem;
                    border-radius: 0.3rem;
                    border: 1px solid var(--primary);
                    cursor: pointer;
                    transition: var(--my-delay-2);
                    width: 100%;
                    position: relative;
                    overflow: hidden;
                    white-space: nowrap;
                    text-align: center;
                }

                .radio-card label:hover {
                    margin-top: -3px;
                    box-shadow: 0 1px 3px var(--primary);
                }

                .radio-card .radio-check {
                    opacity: 0;
                }

                .radio-card input:checked+label .radio-check {
                    opacity: 1;
                }


                .radio-card .radio-check .bg-radio-check {
                    background: var(--my-primary);
                    transform: rotate(45deg);
                    height: 50px;
                    width: 25px;
                    margin-top: -18px;
                    margin-left: -5px;
                }

                .radio-card .radio-check,
                .radio-card .radio-check .bi-check {
                    position: absolute;
                    top: 0;
                    left: 0;
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
                            <a href="https://demo.apivouchergame.com" class="my-brand">LOGO APP</a>
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
                                    <span>Dwiki</span>
                                </div>
                                <div class="my-dropdown" style="top: 55px; right: 15px;">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="bg-my-image my-profile-full" style="background-image: url('/adminlte/images/default_profile/1.jpg')"></div>
                                        </div>
                                        <div class="col-8">
                                            <div>Dwiki</div>
                                            <div>myemail.com</div>
                                        </div>
                                        <div class="col-1">
                                            <a href="https://demo.apivouchergame.com/profile" style="margin-left: -10px;">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a class="btn btn-block btn-outline-danger mt-3" href="https://demo.apivouchergame.com/auth/login">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="content-wrapper">
                    <section class="container section pb-3">
                        <div class="section-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header" style="aspect-ratio: 5/3; background-color: gray;"></div>
                                        <div class="card-body">
                                            <h4 class="text-title">Free Fire</h4>
                                            <div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius tempora totam atque
                                                molestias odit voluptate tenetur? Ipsam deleniti iste odit. Nisi, et mollitia numquam
                                                odio ducimus fuga! Provident, rem inventore.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Informasi Akun Player</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">ID Player</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Xxx...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Pilih Item</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="radio-card">
                                                        <input name="item" type="radio" class="d-none" id="item1">
                                                        <label for="item1">
                                                            <div class="radio-check">
                                                                <div class="bg-radio-check"></div>
                                                                <i class="bi bi-check"></i>
                                                            </div>
                                                            <span>Item 1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="radio-card">
                                                        <input name="item" type="radio" class="d-none" id="item2">
                                                        <label for="item2">
                                                            <div class="radio-check">
                                                                <div class="bg-radio-check"></div>
                                                                <i class="bi bi-check"></i>
                                                            </div>
                                                            <span>Item 1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="radio-card">
                                                        <input name="item" type="radio" class="d-none" id="item3">
                                                        <label for="item3">
                                                            <div class="radio-check">
                                                                <div class="bg-radio-check"></div>
                                                                <i class="bi bi-check"></i>
                                                            </div>
                                                            <span>Item 1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Pilih Pembayaran</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="radio-card">
                                                        <input name="payment" type="radio" class="d-none" id="payment1">
                                                        <label for="payment1">
                                                            <div class="radio-check">
                                                                <div class="bg-radio-check"></div>
                                                                <i class="bi bi-check"></i>
                                                            </div>
                                                            <span>payment 1</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="radio-card">
                                                        <input name="payment" type="radio" class="d-none" id="payment2">
                                                        <label for="payment2">
                                                            <div class="radio-check">
                                                                <div class="bg-radio-check"></div>
                                                                <i class="bi bi-check"></i>
                                                            </div>
                                                            <span>payment 2</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="radio-card">
                                                        <input name="payment" type="radio" class="d-none" id="payment3">
                                                        <label for="payment3">
                                                            <div class="radio-check">
                                                                <div class="bg-radio-check"></div>
                                                                <i class="bi bi-check"></i>
                                                            </div>
                                                            <span>payment 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <div>Beli Sekarang</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email <small>(Optional)</small></label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                                        <small>Jika anda ingin mendapatkan bukti pembayaran atas pembelian
                                                            anda,
                                                            harap mengisi alamat emailnya</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn my-btn-primary">Beli Sekarang</button>
                                        </div>
                                    </div>
                                </div>
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