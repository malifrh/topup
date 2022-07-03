<div class="modal fade" id="modalinfo" name="modalinfo" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xxxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreate">Info Pendaftar</h5>
                <button type="button" class="close" onclick="refresh_page()" data-dismiss=" modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="container">
                <div class="modal-body">
                    <form method="post" id="forminfo" action="#">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td width="20%" class="font-weight-bold">Username</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="username"></span></td>
                                    <input type="hidden" name="game_hide" id="game_hide">
                                    <input type="hidden" name="kode_voucher_hide" id="kode_voucher_hide">
                                    <input type="hidden" name="index_item_hide" id="index_item_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">ID</td>
                                    <td>:</td>
                                    <td><span id="id_server"></span></td>
                                    <input type="hidden" name="id_server_hide" id="id_server_hide">
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
                        <button type="button" class="btn btn-warning" onclick="refresh_page()" data-dismiss="modal">Tutup</button>
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
                                    <td width="20%" class="font-weight-bold">Invoice</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="invoice"></span></td>
                                    <input type="hidden" name="invoice_hide" id="invoice_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Virtual Account</td>
                                    <td>:</td>
                                    <td><span id="va"></span></td>
                                    <input type="hidden" name="va_hide" id="va_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran2"></span></td>
                                    <input type="hidden" name="pembayaran2_hide" id="pembayaran2_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaran"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_bill" name="modal_bill" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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
                                    <td width="20%" class="font-weight-bold">Invoice</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="invoice"></span></td>
                                    <input type="hidden" name="invoice_hide" id="invoice_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran3"></span></td>
                                    <input type="hidden" name="pembayaran3_hide" id="pembayaran3_hide">
                                    <input type="hidden" name="kode_voucher_hide" id="kode_voucher_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kode Billing</td>
                                    <td>:</td>
                                    <td><span id="kode_bil"></span></td>
                                    <input type="hidden" name="kode_bil_hide" id="kode_bil_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Key Billing</td>
                                    <td>:</td>
                                    <td><span id="key_bil"></span></td>
                                    <input type="hidden" name="key_bil_hide" id="key_bil_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaran"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_conv" name="modal_conv" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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
                                    <td width="20%" class="font-weight-bold">Invoice</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="invoice"></span></td>
                                    <input type="hidden" name="invoice_hide" id="invoice_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Kode Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="kode_pay"></span></td>
                                    <input type="hidden" name="kode_pay_hide" id="kode_pay_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran4"></span></td>
                                    <input type="hidden" name="pembayaran4_hide" id="pembayaran4_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaran"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_qr" name="modal_qr" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xxxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreate">Info Pembayaran</h5>
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
                                    <td width="20%" class="font-weight-bold">Invoice</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="invoice"></span></td>
                                    <input type="hidden" name="invoice_hide" id="invoice_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Virtual Account</td>
                                    <td>:</td>
                                    <td><span id="va"></span></td>
                                    <input type="hidden" name="va_hide" id="va_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran2s"></span></td>
                                    <input type="hidden" name="pembayaran2s_hide" id="pembayaran2s_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaran"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="align-center">
                            <div class="qr-code">
                                <span class="font-weight-bold text-center">Silahkan Scan QR</span>
                            </div>
                            <img src="" style="width: 75%; height:50%;" id="qr_code" name="qr_code" alt="">
                        </div>

                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="test_modal" name="test_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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
                                    <td width="20%" class="font-weight-bold">Invoice</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><span id="va"></span></td>
                                    <input type="hidden" name="va_hide" id="va_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Virtual Account</td>
                                    <td>:</td>
                                    <td><span id="va"></span></td>
                                    <input type="hidden" name="va_hide" id="va_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaran2"></span></td>
                                    <input type="hidden" name="pembayaran2_hide" id="pembayaran2_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaran"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>