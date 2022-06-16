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
                        <form action="#">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID Player</label>
                                            <input type="id_player" class="form-control" id="exampleInputid_player1" placeholder="Xxx...">
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
                                <?php foreach ($data as $key => $value) { ?>
                                    <div class="col-4">
                                        <div class="radio-card">
                                            <input name="item" type="radio" class="d-none" id="item<?= $key ?>">
                                            <input type="hidden" name="code" id="code" value="<?= $value['code'] ?>">
                                            <input type="hidden" name="price" id="price" value="<?= $value['price'] ?>">
                                            <label for="item<?= $key ?>">
                                                <div class="radio-check">
                                                    <div class="bg-radio-check"></div>
                                                    <i class="bi bi-check"></i>
                                                </div>
                                                <span><?= $value['name'] ?><br></span>
                                                <span style="font-size: 12px; font-style:italic;">Rp. <?= number_format($value['price'], '0', ',', '.') ?></span>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>
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
                        </form>
                        <div class="card-footer">
                            <button class="btn my-btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>