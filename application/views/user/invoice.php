<style>
    .swal2-container {
        display: grid;
        position: fixed;
        z-index: 2060;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        box-sizing: border-box;
        grid-template-areas: "top-start     top            top-end""center-start  center         center-end""bottom-start  bottom-center  bottom-end";
        grid-template-rows: minmax(-webkit-min-content, auto) minmax(-webkit-min-content, auto) minmax(-webkit-min-content, auto);
        grid-template-rows: minmax(min-content, auto) minmax(min-content, auto) minmax(min-content, auto);
        height: 100%;
        padding: .625em;
        overflow-x: hidden;
        transition: background-color .1s;
        -webkit-overflow-scrolling: touch
    }
</style>

<div class="content-wrapper" style="margin-left: 0px;">
    <section class="container section pb-3">
        <div class="section-content">
            <div class="row">
                <div class="col-md-10" style="margin-right: auto!important;margin-left: auto!important;">
                    <div class="card bg-cyan">
                        <div class="card-header">
                            <div>Check Invoice</div>
                        </div>
                        <div class="card-body">
                            <form id="formCheck" method="post" action="#" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Invoice</label>
                                            <input type="text" name="invoice" class="form-control" id="invoice" placeholder="Xxx..." required>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button class="btn my-btn-primary float-end" id="checkID" onclick="check()">Check</button>
                        </div>
                    </div>

                    <div class="card">
                        <input type="hidden" name="id_invoice" id="id_invoice" value="asd">
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tabel">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Produk</th>
                                                <th>ID Player</th>
                                                <th>Harga</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript" language="javascript">
    var dataTable;
    var BASE_URL = '<?php echo base_url(); ?>';
    var SITE_URL = '<?php echo site_url(); ?>';

    $(document).ready(function() {
        dataTable = $('#tabel').DataTable({
            paginationType: 'full_numbers',
            processing: true,
            serverSide: true,
            filter: false,
            autoWidth: false,
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            ajax: {
                url: '<?php echo site_url('tables/ajax_list') ?>',
                type: 'POST',
                beforeSend: function() {
                    $("#loading").show();
                },
                data: function(data) {
                    data.filter = {
                        'id_invoice': $('#id_invoice').val()

                    };
                    data.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                    data.type = 'data_list_invoice';
                },
                complete: function(settings, json) {
                    $("#loading").hide();
                }
            },
            language: {
                sProcessing: 'Sedang memproses...',
                sLengthMenu: 'Tampilkan _MENU_ entri',
                sZeroRecords: 'Tidak ditemukan data yang sesuai',
                sInfo: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
                sInfoEmpty: 'Menampilkan 0 sampai 0 dari 0 entri',
                sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
                sInfoPostFix: '',
                sSearch: 'Cari:',
                sUrl: '',
                oPaginate: {
                    sFirst: '<<',
                    sPrevious: '<',
                    sNext: '>',
                    sLast: '>>'
                }
            },
            order: [0, 'desc'],
            columns: [{
                    'data': 'no'
                },
                {
                    'data': 'produk'
                },
                {
                    'data': 'id_player'
                },
                {
                    'data': 'harga'
                },
                {
                    'data': 'create_date'
                },
                {
                    'data': 'status_transaksi'
                },
            ],


        });

        function table_data() {
            dataTable.ajax.reload(null, true);
        }

        $("#id_invoice").change(function() {
            table_data();
        });

        $("#checkID").click(function() {
            var invoice = $('#invoice').val();
            $('#id_invoice').val(invoice)
            table_data();
            console.log(invoice);
        });
    });

    function check() {
        var invoice = $('#invoice').val();
        $('#id_invoice').val(invoice)
    }

    function refresh_page() {
        location.reload();
    }

    function towaktu(data) {
        var time = data.toString();

        if (time.length == 1) {
            var hrs = '0' + time;
        } else {
            var hrs = time;
        }
        return hrs + ":00";
    }

    function towaktuDes(data) {
        var time = data.toString();

        if (time.length == 1) {
            var hrs = '0' + time;
        } else {
            var hrs = time;
        }
        return hrs + ":00";
    }
</script>