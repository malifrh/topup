<div class="content-wrapper" style="margin-left: 0px;">
    <section class="container section pb-3">
        <div class="section-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="aspect-ratio: 5/3; background-color: gray;"></div>
                        <div class="card-body">
                            <h4 class="text-title"><?= @$title; ?></h4>
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
                                            <input type="text" name="id_player" class="form-control" id="id_player" placeholder="Xxx..." required>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Server</label>
                                            <input type="text" name="server" class="form-control" id="server" placeholder="Xxx..." required>
                                            <span class="help-block text-danger"></span>
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
                                    <div class="col-3 form-group">
                                        <div class="radio-card">
                                            <input name="payment" type="radio" class="d-none" value="<?= $value['bank'] ?>" id="payment<?= $key ?>">
                                            <label for="payment<?= $key ?>">
                                                <div class="radio-check">
                                                    <div class="bg-radio-check"></div>
                                                    <i class="bi bi-check"></i>
                                                </div>
                                                <img src="<?= base_url() . $value['image'] ?>" alt="" class="game-img" height="75" width="75" style="height: 50px; ">

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
<?php include('modal.php') ?>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://api.sandbox.veritrans.co.id/v2/assets/js/veritrans.min.js"></script>

<script>
    var SITE_URL = '<?php echo site_url(); ?>';
    var payment = document.getElementsByName("payment");
    var item = document.getElementsByName("item");

    function refresh_page() {
        location.reload();
    }

    function lanjut() {
        var pembayaran = $('#pembayaran_hide').val();
        var harga = $('#harga_hide').val();
        var game = $('#game_hide').val();
        var id_player = $('#id_player').val();
        var server = $('#server').val();
        var kode_voucher_hide = $('#kode_voucher_hide').val();
        var index_item_hide = $('#index_item_hide').val();
        var va_number;
        var payment;

        console.log(harga)
        console.log(id_player)

        $.ajax({
            url: '<?= base_url() ?>/order/proses',
            type: 'POST',
            data: {
                token_id: Veritrans.client_key,
                pembayaran: pembayaran,
                harga: harga,
                game: game,
                id_player: id_player,
                server: server,
                kode_voucher: kode_voucher_hide,
                key: index_item_hide
            },

            success: function(data) {
                $('#modalinfo').modal('hide');
                var parse = JSON.parse(data);

                // Set the date we're counting down to
                var limit = parse.batas_pembayaran;
                var countDownDate = new Date(limit).getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // nampilin counting down
                    document.getElementById("batas_pembayaran").innerHTML = hours + " Jam " + minutes + " Menit " + seconds + " Detik ";

                    // jika counting down abis reload ke url(ordercancel)
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("batas_pembayaran").innerHTML = "Status: Gagal Pembayaran";
                    }
                }, 1000);

                $('#invoice').html(parse.invoice);
                $('#invoice_hide').val(parse.invoice);

                if (parse.type_payment == 'bca' || parse.type_payment == 'bri' || parse.type_payment == 'bni') {
                    va_number = parse.va_numbers[0].va_number
                    $('#modal_bayar').modal('show');
                    $('#va').html(va_number);
                    $('#va_hide').val(va_number);
                    $('#pembayaran2').html(parse.type_payment.toUpperCase());
                    $('#pembayaran2_hide').val(parse.type_payment);
                } else if (parse.type_payment == 'permata') {
                    va_number = parse.permata_va_number;
                    $('#modal_bayar').modal('show');
                    $('#va').html(va_number);
                    $('#va_hide').val(va_number);
                    $('#pembayaran2').html(parse.type_payment.toUpperCase());
                    $('#pembayaran2_hide').val(parse.type_payment);
                } else if (parse.type_payment == 'mandiri') {
                    var bill_key = parse.bill_key;
                    var bill_code = parse.biller_code;
                    console.log(bill_code);
                    console.log(parse);
                    $('#modal_bill').modal('show');
                    $('#kode_bil').html(bill_code);
                    $('#kode_bil_hide').val(bill_code);
                    $('#key_bil').html(bill_key);
                    $('#key_bil_hide').val(bill_key);
                    $('#pembayaran3').html(parse.type_payment.toUpperCase());
                    $('#pembayaran3_hide').val(parse.type_payment);
                } else if (parse.type_payment == 'gopay') {
                    $('#modal_qr').modal('show');
                    $('#qr_code').attr('src', parse.actions[0].url);
                    $('#pembayaran2s').html(parse.type_payment.toUpperCase());
                    $('#pembayaran2s_hide').val(parse.type_payment);
                    console.log(parse.type_payment);
                } else {
                    va_number = parse.payment_code;
                    $('#modal_conv').modal('show');
                    $('#kode_pay').html(va_number);
                    $('#kode_pay_hide').val(va_number);
                    $('#pembayaran4').html(parse.type_payment.toUpperCase());
                    $('#pembayaran4_hide').val(parse.type_payment);
                    console.log(parse.type_payment);
                }
            }
        });
    }

    async function submitForm() {
        $("#loading").show();
        var check = false;

        if (!$("input[name='item']:checked").val()) {
            Swal.fire({
                type: "warning",
                title: 'Peringatan!',
                text: 'Silahkan pilih Diamond terlebih dahulu!',
                confirmButtonClass: 'btn btn-warning',
            });
        } else {
            for (var i = 0, length = item.length; i < length; i++) {
                if (item[i].checked) {
                    // do whatever you want with the checked radio
                    // console.log(item[i].value)

                    const param = new FormData($('#formPay')[0]);
                    param.append('key', i);
                    param.append('item', item[i].value);

                    await fetch(SITE_URL + '/order/check', {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: param,
                        })
                        .then(response => response.json())
                        .then(response => {
                            if (response.status === true) {

                                var price = formatRupiah(response.data.harga, 'Rp. ')
                                console.log(price);

                                $('#harga').html(price);
                                $('#harga_hide').val(response.data.harga);
                                $('#game_hide').val(response.data.game);
                                $('#kode_voucher_hide').val(item[i].value);
                                $('#index_item_hide').val(i);
                                $('#username').html(response.data.username);
                                $('#id_server').html(response.data.uid + " (" + response.data.zid + ")");

                                if (!$("input[name='payment']:checked").val()) {
                                    Swal.fire({
                                        type: "warning",
                                        title: 'Peringatan!',
                                        text: 'Silahkan pilih Pembayaran terlebih dahulu!',
                                        confirmButtonClass: 'btn btn-warning',
                                    });
                                } else {
                                    for (var x = 0, length = payment.length; x < length; x++) {
                                        if (payment[x].checked) {
                                            // do whatever you want with the checked radio
                                            console.log(payment[x].value)
                                            $('#pembayaran').html(payment[x].value.toUpperCase());
                                            $('#pembayaran_hide').val(payment[x].value);
                                            // only one radio can be logically checked, don't check the rest
                                            $('#modalinfo').modal('show');
                                            break;
                                        }
                                    }
                                }
                            } else if (response.status === false) {
                                Swal.fire({
                                    type: "warning",
                                    title: 'Gagal!',
                                    text: 'Data tidak ditemukan, silahkan masukkan ID Player / Server yang sesuai.',
                                    confirmButtonClass: 'btn btn-warning',
                                });

                                $('[name="id_player"]').addClass(response.error_class['id_player']);
                                $('[name="id_player"]').next().text(response.error_string['id_player']);
                                $('[name="server"]').addClass(response.error_class['server']);
                                $('[name="server"]').next().text(response.error_string['server']);
                            }
                        })
                        .catch((error) => {
                            Swal.fire({
                                type: "error",
                                title: 'Kesalahan!',
                                text: 'Silahkan cek ulang data.',
                                confirmButtonClass: 'btn btn-danger',
                            });
                            console.error('Error:', error);
                        })
                        .finally(() => {
                            $("#loading").hide();
                        });

                    // only one radio can be logically checked, don't check the rest
                    break;
                }
            }
        }
    }

    function formatRupiah(angka, prefix) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return prefix == undefined ? ribuan : (ribuan ? 'Rp. ' + ribuan : '');
    }
</script>