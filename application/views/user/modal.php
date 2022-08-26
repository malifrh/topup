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
                <h5 class="modal-title" id="modalCreate">Info Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="detail()" aria-label="Close">
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
                                    <td width="29%"><span id="invoiceVA"></span></td>
                                    <input type="hidden" name="invoiceVA_hide" id="invoiceVA_hide">
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
                                    <td><span id="batas_pembayaranVA"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" onclick="detail()" data-dismiss="modal">Tutup</button>
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
                <h5 class="modal-title" id="modalCreate">Info Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="detail()" aria-label="Close">
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
                                    <td width="29%"><span id="invoiceBill"></span></td>
                                    <input type="hidden" name="invoiceBill_hide" id="invoiceBill_hide">
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
                                    <td><span id="batas_pembayaranBill"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" onclick="detail()" data-dismiss="modal">Tutup</button>
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
                <button type="button" class="close" data-dismiss="modal" onclick="detail()" aria-label="Close">
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
                                    <td width="29%"><span id="invoiceQR"></span></td>
                                    <input type="hidden" name="invoiceQR_hide" id="invoiceQR_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaranQR"></span></td>
                                    <input type="hidden" name="pembayaranQR_hide" id="pembayaranQR_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaranQR"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="qr-code">
                            <span class="font-weight-bold text-center">Silahkan Scan QR</span>
                        </div>
                        <div style="border-radius:2px;display:flex;flex-direction:column;align-items:center;background:white">
                            <a href="" id="url" target="_blank" alt="QR CODE QRIS">
                                <img src="" style="width: 100%; height:50%;" id="qr_code" name="qr_code" alt="">
                            </a>
                        </div>

                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" onclick="detail()" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_gopay" name="modal_gopay" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xxxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreate">Info Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="detail()" aria-label="Close">
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
                                    <td width="29%"><span id="invoiceGopay"></span></td>
                                    <input type="hidden" name="invoiceGopay_hide" id="invoiceGopay_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="pembayaranGopay"></span></td>
                                    <input type="hidden" name="pembayaranGopay_hide" id="pembayaranGopay_hide">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Batas Pembayaran</td>
                                    <td>:</td>
                                    <td><span id="batas_pembayaranGopay"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="qr-code">
                            <span class="font-weight-bold text-center">Silahkan Scan QR</span>
                        </div>
                        <div style="border-radius:2px;display:flex;flex-direction:column;align-items:center;background:white">
                            <a href="" id="url_gopay" target="_blank" alt="QR CODE GOPAY">
                                <img src="" style="width: 100%; height:50%;" id="gopay_code" name="gopay_code" alt="">
                            </a>
                        </div>

                    </form>
                </div>
                <div style="padding-left: 60px;" class="center">
                    <div class="modal-footer" id="btn_footer">
                        <button type="button" class="btn btn-warning" onclick="detail()" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>