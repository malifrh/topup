<div class="content-wrapper">
    <section class="container section pb-3">
        <div class="section-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="aspect-ratio: 5/3; background-color: gray;"></div>
                        <div class="card-body">
                            <h4 class="text-title">Mobile Legend</h4>
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
                        <form id="formPay" method="post" action="#" enctype="multipart/form-data">
                            <input type="hidden" name="slug" class="form-control" id="slug" value="<?= $slug ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID Player</label>
                                            <input type="text" name="id_player" class="form-control" id="id_player" placeholder="Xxx...">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Server</label>
                                            <input type="text" name="server" class="form-control" id="server" placeholder="Xxx...">
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
                                            <input name="item" type="radio" class="d-none" value="<?= $value['code'] ?>" id="item<?= $key ?>">
                                            <label for="item<?= $key ?>">
                                                <div class="radio-check">
                                                    <div class="bg-radio-check"></div>
                                                    <i class="bi bi-check"></i>
                                                </div>
                                                <!-- <input type="hidden" name="code" id="code" value="<?= $value['code'] ?>"> -->
                                                <input for="item<?= $key ?>" type="hidden" name="price" id="price" value="<?= $value['price'] ?>">
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
                                <?php foreach ($payment as $key => $value) { ?>
                                    <div class="col-4">
                                        <div class="radio-card">
                                            <input name="payment" type="radio" class="d-none" value="<?= $value['bank'] ?>" id="payment<?= $key ?>">
                                            <label for="payment<?= $key ?>">
                                                <div class="radio-check">
                                                    <div class="bg-radio-check"></div>
                                                    <i class="bi bi-check"></i>
                                                </div>
                                                <span><img src="<?= base_url() . $value['image'] ?>" alt="" class="game-img" height="75" width="75" style="height: 50px; ">

                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>
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
                            <button class="btn my-btn-primary" onclick="submitForm()">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalinfo" name="modalinfo" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xxxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreate">Info Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="container">
                <div class="modal-body">
                    <form method="post" id="forminfo" action="#">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td width="20%" class="font-weight-bold">Game</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="game"></span></td>
                                    <input type="hidden" name="game_hide" id="game_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Harga</td>
                                    <td>:</td>
                                    <td><span id="harga"></span></td>
                                    <input type="hidden" name="harga_hide" id="harga_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran"></span></td>
                                    <input type="hidden" name="pembayaran_hide" id="pembayaran_hide">
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="lanjut()" data-dismiss="modal">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_bayar" name="modal_bayar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xxxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreate">Info Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="container">
                <div class="modal-body">
                    <form method="post" id="formbayar" action="#">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td width="20%" class="font-weight-bold">Virtual Account</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="va"></span></td>
                                    <input type="hidden" name="va_hide" id="va_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran2"></span></td>
                                    <input type="hidden" name="pembayaran2_hide" id="pembayaran2_hide">
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="lanjut()" data-dismiss="modal">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://api.sandbox.veritrans.co.id/v2/assets/js/veritrans.min.js"></script>

<script>
    var SITE_URL = '<?php echo site_url(); ?>';

    function lanjut() {
        var pembayaran = $('#pembayaran_hide').val();
        var harga = $('#harga_hide').val();
        var game = $('#game_hide').val();

        $.ajax({
            url: '<?= site_url() ?>/vtdirect/vtdirect_bt_charge',
            type: 'POST',
            data: {
                token_id: Veritrans.client_key,
                pembayaran: pembayaran,
                harga: harga,
                game: game
            },

            success: function(data) {
                $('#modal_bayar').modal('show');
                var parse = JSON.parse(data)

                $('#va').html(parse.va_numbers[0].va_number);
                $('#va_hide').val(parse.va_numbers[0].va_number);
                $('#pembayaran2').html(parse.va_numbers[0].bank.toUpperCase());
                $('#pembayaran2_hide').val(parse.va_numbers[0].bank);
                console.log(parse);
                // console.log(data['bank']);
                console.log(parse.va_numbers[0].bank);
            }
        });
    }

    function formatRupiah(angka, prefix) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return prefix == undefined ? ribuan : (ribuan ? 'Rp. ' + ribuan : '');
    }
    async function submitForm() {
        $("#loading").show();
        var payment = document.getElementsByName("payment");
        var item = document.getElementsByName("item");
        var price = document.getElementById("price");
        // console.log(param)
        // for (var i = 0, length = payment.length; i < length; i++) {
        //     if (payment[i].checked) {
        //         // do whatever you want with the checked radio
        //         console.log(payment[i].value)

        //         // only one radio can be logically checked, don't check the rest
        //         break;
        //     }
        // }
        for (var i = 0, length = item.length; i < length; i++) {
            if (item[i].checked) {
                // do whatever you want with the checked radio
                console.log(item[i].value)

                const param = new FormData($('#formPay')[0]);
                param.append('key', i);
                param.append('item', item[i].value);

                await fetch(SITE_URL + '/order/detail', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: param,
                    })
                    .then(response => response.json())
                    .then(response => {
                        if (response.status === true) {

                            console.log(response.data);

                            var price = formatRupiah(response.data.harga, 'Rp. ')
                            console.log(price);

                            $('#harga').html(price);
                            $('#harga_hide').val(response.data.harga);
                            $('#game_hide').val(response.data.game);
                            $('#game').html(response.data.game);
                            for (var x = 0, length = payment.length; x < length; x++) {
                                if (payment[x].checked) {
                                    // do whatever you want with the checked radio
                                    console.log(payment[x].value)
                                    $('#pembayaran').html(payment[x].value.toUpperCase());
                                    $('#pembayaran_hide').val(payment[x].value);

                                    // only one radio can be logically checked, don't check the rest
                                    break;
                                }
                            }
                            // $('#jumlah_tersedia_').html(response.data.jumlah_tersedia);
                            // $('#tahun_').html(response.data.tahun);
                            // $('#tahap_').html(response.data.tahap);

                            $('#modalinfo').modal('show');
                        } else if (response.status === false) {
                            // Swal.fire({
                            //     type: "warning",
                            //     title: 'Peringatan!',
                            //     text: 'Data tidak ditemukan.',
                            //     confirmButtonClass: 'btn btn-warning',
                            //     timer: 1500
                            // });
                        }
                    })
                    .catch((error) => {
                        // Swal.fire({
                        //     type: "error",
                        //     title: 'Kesalahan!',
                        //     text: 'Terjadi Kesalahan.',
                        //     confirmButtonClass: 'btn btn-danger',
                        // });
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        $("#loading").hide();
                    });

                // only one radio can be logically checked, don't check the rest
                break;
            }
        }

        // alert(payment.value);
        // alert(item.value);
    }

    // function findSelection(field){

    // }
    // $(document).ready(function() {
    //     var radios = document.getElementsByName('payment');
    //     console.log(radios);

    //     for (var i = 0, length = radios.length; i < length; i++) {
    //         if (radios[i].checked) {
    //             // do whatever you want with the checked radio
    //             alert(radios[i].value);

    //             // only one radio can be logically checked, don't check the rest
    //             break;
    //         } else {

    //             console.log(radios[i].value)
    //         }
    //     }
    // });
</script>