        <div class="categories-collections">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="collections" style="margin-top:0px">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <button type="button" class="btn bg-yellow btn-lg btn-block"> <span id="tgl"></span> <br> <span id="tgl_order"></span></button>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless table-lg">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold">Nomor Invoice</td>
                                                        <td>:</td>
                                                        <td><span id="nomor_invoice"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Nama Produk (Diamond)</td>
                                                        <td>:</td>
                                                        <td><span id="nama_produk"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">UserID (Server)</td>
                                                        <td>:</td>
                                                        <td><span id="user_id"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Pembayaran</td>
                                                        <td>:</td>
                                                        <td><span id="pembayaran"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Status Pembayaran</td>
                                                        <td>:</td>
                                                        <td><span id="status_pembayaran"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">Status Transaksi</td>
                                                        <td>:</td>
                                                        <td><span id="status_transaksi"></span></td>
                                                    </tr>
                                                    <tr id="kode_pem" style="display: none;">
                                                        <td class="font-weight-bold">Kode Pembayaran</td>
                                                        <td>:</td>
                                                        <td><span id="kode_pembayaran"></span></td>
                                                    </tr>
                                                    <tr id="virtual_acc" style="display: none;">
                                                        <td class="font-weight-bold">Virtual Account</td>
                                                        <td>:</td>
                                                        <td><span id="va_account"></span></td>
                                                    </tr>
                                                    <tr id="billing" style="display: none;">
                                                        <td class="font-weight-bold">Kode Billing</td>
                                                        <td>:</td>
                                                        <td><span id="kode_bill"></span></td>
                                                    </tr>
                                                    <tr id="billings" style="display: none;">
                                                        <td class="font-weight-bold">Key Billing</td>
                                                        <td>:</td>
                                                        <td><span id="key_bill"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="row" id="rowShopee" style="display: none;">
                                                <input type="hidden" name="link_shopee" id="link_shopee">
                                                <button type="button" class="btn btn-primary" onclick="bayarShopee()" data-dismiss="modal">Bayar dengan ShopeePay</button>
                                            </div>
                                            <div class="row" id="rowGopay" style="display: none;">
                                                <div style="border-radius:2px;display:flex;flex-direction:column;align-items:center;background:white">
                                                    <a href="" id="url" target="_blank" alt="QR CODE GOPAY">
                                                        <img src="" style="width: 100%; height:50%;" id="qr_code" name="qr_code" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" language="javascript">
            var dataTable;
            var BASE_URL = '<?php echo base_url(); ?>';
            var SITE_URL = '<?php echo site_url(); ?>';
            var invoices = '<?= $invoice; ?>';

            $(document).ready(function() {
                info(invoices);
            });

            async function info(invoice) {
                $("#loading").show();
                const param = new FormData();
                param.append('invoice', invoice);

                await fetch(SITE_URL + '/invoice/ajax_info', {
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
                            var tgl_order = formatDate(response.data.create_date);
                            var waktu_order = formatTime(response.data.create_date);
                            var tgl_batas = formatDate(response.data.batas_pembayaran);
                            var waktu_batas = formatTime(response.data.batas_pembayaran);

                            $('#tgl_order').html(response.data.invoice);
                            $('#nomor_invoice').html(response.data.invoice);
                            $('#nama_produk').html(response.data.produk);
                            $('#user_id').html(response.data.id_player + ' (' + response.data.server_player + ')');
                            $('#pembayaran').html(response.data.pembayaran.toUpperCase());
                            if (response.data.midtrans_status == 'settlement') {
                                var status_midtrans = 'Pembayaran Berhasil';
                            } else {
                                var status_midtrans = 'Pending';
                            }
                            $('#status_pembayaran').html(status_midtrans);
                            $('#status_transaksi').html(response.data.status_transaksi);

                            if (response.data.midtrans_status == 'pending') {
                                $('#tgl').html('Batas Pembayaran :');
                                $('#tgl_order').html(tgl_batas + ' ' + waktu_batas + ' WIB')

                                if (response.data.payment_type == 'bank_transfer' || response.data.payment_type == 'permata') {
                                    $('#virtual_acc').show();
                                    $('#billing').hide();
                                    $('#kode_pem').hide();
                                    $('#rowShopee').hide();
                                    $('#va_account').html(response.data.va_number);
                                } else if (response.data.payment_type == 'echannel') {
                                    $('#kode_pem').hide();
                                    $('#rowShopee').hide();
                                    $('#virtual_acc').hide();
                                    $('#billing').show();
                                    $('#billings').show();
                                    $('#kode_bill').html(response.data.bill_code);
                                    $('#key_bill').html(response.data.bill_key);
                                } else if (response.data.payment_type == 'cstore') {
                                    $('#virtual_acc').hide();
                                    $('#rowShopee').hide();
                                    $('#billing').hide();
                                    $('#billings').hide();
                                    $('#kode_pem').show();
                                    $('#kode_pembayaran').html(response.data.kode_pembayaran);

                                } else if (response.data.payment_type == 'gopay') {
                                    $('#rowShopee').hide();
                                    $('#virtual_acc').hide();
                                    $('#rowShopee').hide();
                                    $('#billing').hide();
                                    $('#billings').hide();
                                    $('#rowGopay').show();
                                    $('#qr_code').attr('src', response.data.qr_code);
                                    $('#url').attr('href', response.data.qr_code);
                                } else {
                                    $('#rowShopee').show();
                                    $('#link_shopee').val(response.data.deeplink_redirect);
                                }
                            } else {
                                $('#tgl').html('Tanggal Pembelian :');
                                $('#tgl_order').html(tgl_order + ' ' + waktu_order + ' WIB')
                            }
                        } else if (response.status === false) {
                            Swal.fire({
                                type: "warning",
                                title: 'Peringatan!',
                                text: 'Data tidak ditemukan.',
                                confirmButtonClass: 'btn btn-warning',
                                timer: 1500
                            });
                        }
                    })
                    .catch((error) => {
                        Swal.fire({
                            type: "error",
                            title: 'Kesalahan!',
                            text: 'Terjadi Kesalahan.',
                            confirmButtonClass: 'btn btn-danger',
                        });
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        $("#loading").hide();
                    });
            }

            function bayarShopee() {

                var link = $('#link_shopee').val();

                window.location.href = link;
            }

            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }

            function formatTime(date) {
                var d = new Date(date),
                    minute = '' + d.getMinutes(),
                    hours = d.getHours();
                if (minute.length < 2)
                    minute = '0' + minute;
                if (hours.length < 2)
                    hours = '0' + hours;
                return [hours, minute].join(':');
            }

            function kapital(str) {
                return str.replace(/\w\S*/g,
                    function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                    });
            }
        </script>