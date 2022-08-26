<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
date_default_timezone_set('Asia/Jakarta');

class Handling extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->authorization       = "Authorization: Bearer 165|sBJEcvQLW9EH4UVZ5mbdR5Ad5w3Wn3LHW5vO3bH6";
        // $this->authorization       = "Authorization: Bearer 163|p7OZvLgt2xpGUKeWTxvGqzvQZaxwmNkZ0uxkzMDl";
    }

    function callbackNotif_post()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        $status = $result->transaction_status;

        $getAPIVOUCHERGAME = $this->db->query('SELECT id_player, voucher_game, server_player, kode_diamond, harga FROM t_transaksi WHERE id_order = "' . $result->order_id . '"')->row();

        $slug = $getAPIVOUCHERGAME->voucher_game;
        $item = $getAPIVOUCHERGAME->kode_diamond;

        if ($result) {
            $status_callback = 'Sukses';
            if ($status == 'settlement') {

                $post = [
                    'uid' => $getAPIVOUCHERGAME->id_player,
                    'zid' => $getAPIVOUCHERGAME->server_player
                ];
                $url = 'https://apivouchergame.com/api/production/product/' . $slug . '' . "/" . '' . $item . '';

                try {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
                    $resultVoucher = curl_exec($ch);
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                }

                // $ch = curl_init($url);
                // $curl_init = curl_init();
                // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                // $response = curl_exec($ch);

                $data = json_decode($resultVoucher, true);

                // curl_setopt_array($curl_init, array(
                //     CURLOPT_URL => $url,
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_HTTPHEADER => array('Content-Type: application/json', $this->authorization),
                //     CURLOPT_ENCODING => '',
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 30,
                //     CURLOPT_FOLLOWLOCATION => true,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => 'POST',
                //     CURLOPT_POSTFIELDS => json_encode(array('uid' => $getAPIVOUCHERGAME->id_player, 'zid' => $getAPIVOUCHERGAME->server_player), true),
                // ));

                // $responses = curl_exec($curl_init);

                // // curl_close($curl_init);

                $json_respose = json_encode($resultVoucher);
                // $decode = json_decode($responses, true);

                $status_transaksi = 'Sedang di proses';
            } else if ($status == 'expire' || $status == 'deny' || $status == 'cancel') {
                $status_transaksi = 'Transaksi Gagal';
            } else if ($status == 'pending') {
                $status_transaksi = 'Menunggu Pembayaran';
            }

            var_dump("response result : " . $resultVoucher);
            var_dump($data);
            // die;
            // var_dump($decode);
            // var_dump($json_respose);
            // var_dump($decode);
            // var_dump($decode->product);
            // var_dump($decode['data']);
            // var_dump($decode['data']['invoice']);


            $updateTransaksi = array(
                'status_transaksi' => $status_transaksi,
                'midtrans_status'  => $status,
                'voucher_status'   => $data['data']['transaction_status'],
                'invoice_voucher'  => $data['data']['invoice'],
                'update_date'      => date('Y-m-d H:i:s')
            );

            $this->db->where('id_order', $result->order_id);
            $this->db->update('t_transaksi', $updateTransaksi);

            $this->db->select('kode_diamond, contact, index_item, invoice, voucher_game, harga, pembayaran');
            $this->db->from('t_transaksi');
            $this->db->where('id_order', $result->order_id);
            $getInvoice = $this->db->get()->row();

            $getTitle = $this->db->query('SELECT tg.name FROM t_game as tg WHERE slug = "' . $getInvoice->voucher_game . '"')->row();

            $urlVoucher = 'https://apivouchergame.com/api/product/' . $getInvoice->voucher_game . '';
            $chs = curl_init($urlVoucher);
            curl_setopt($chs, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($chs, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($chs);

            $datas = json_decode($response, true);

            $diamond = $datas['data']['denominations'][$getInvoice->index_item]['name'];

            $format_rupiah = "Rp " . number_format($getInvoice->harga, 0, ',', '.');

            if ($data['data']['transaction_status'] == 'success') {
                $status_transaksi = 'Transaksi Berhasil';
                if ($getInvoice->contact != null) {

                    $curls = curl_init();
                    $msg = 'Halo Sister !
            Berikut Adalah Rincian Pesanan Anda

            Informasi pembelian :

            Produk : ' . $getTitle->name . " ($diamond)" . '
            No.Invoice : ' . $getInvoice->invoice . '
            Harga :' . $format_rupiah . '
            Total : ' . $format_rupiah . '
            Pembayaran: ' . strtoupper($getInvoice->pembayaran) . '

            ===============
            Estimasi Proses :
            - Proses Otomatis :  1-3 Menit
            - Delay 7 Hari : 7-8 Hari
            Mohon Menunggu Sesuai Estimasi Proses
            ===============


            Di tunggu Next Ordernya , Semoga Sehat Selalu Dan Lancar Rezekinya

            Terimakasih';
                    //                 $msg = 'Halo Sister !
                    // Berikut Adalah Rincian Pesanan Anda

                    // Informasi pembelian :

                    // Produk : ' . $getTitle->name . " ($diamond)" . '
                    // No.Invoice : ' . $getInvoice->invoice . '
                    // Harga :' . $format_rupiah . '
                    // Total : ' . $format_rupiah . '
                    // Pembayaran: ' . strtoupper($getInvoice->pembayaran) . '
                    // Untuk Detail Order Selengkapnya Klik Link di bawah!
                    // http://percobaan-topup.epizy.com/invoice/detail/' . $getInvoice->invoice . '

                    // ===============
                    // Estimasi Proses :
                    // - Proses Otomatis :  1-3 Menit
                    // - Delay 7 Hari : 7-8 Hari
                    // Mohon Menunggu Sesuai Estimasi Proses
                    // ===============


                    // Di tunggu Next Ordernya , Semoga Sehat Selalu Dan Lancar Rezekinya

                    // Terimakasih';

                    curl_setopt_array($curls, array(
                        CURLOPT_URL => 'https://app.whacenter.com/api/send',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('device_id' => '6d93e0222a0b640c1b49e2e716e32401', 'number' => $getInvoice->contact, 'message' => $msg),
                    ));

                    $responses = curl_exec($curls);

                    curl_close($curls);

                    $json_respose = json_encode($responses);
                    $decode = json_decode($responses, true);


                    $dataInsert = array(
                        'json'        => $json_respose,
                        'message'     => $msg,
                        'data'      => 'id :' . $decode['data']['id'],
                        'create_date' => date('Y-m-d H:i:s')
                    );

                    $this->db->insert('log_callback_whacenter', $dataInsert);
                    // echo $responses;
                }
            }

            var_dump($this->db->last_query());
            // die;
        } else {
            $status_callback = 'Gagal';
        }


        $dataInsert = array(
            'json'        => $json_result,
            'status'      => $status_callback,
            'create_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_callback_midtrans', $dataInsert);

        $dataInsertVoucher = array(
            'json'        => $json_respose,
            'create_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_callback_voucher', $dataInsertVoucher);

        // echo json_encode(['status' => $status, 'data' => $data, 'response' => $response]);
    }

    function callbackVoucher_post()
    {
        $json_results = file_get_contents('php://input');
        $results = json_decode($json_results, true);

        $status = $results['status'];

        // var_dump($status);
        // die;


        if ($results) {
            $status_callback = 'Sukses';
            if ($status == 'success') {

                $status_transaksi = 'Transaksi Berhasil';
            } else if ($status == 'incoming') {
                $status_transaksi = 'Proses';
            } else {
                $status_transaksi = 'Gagal';
            }

            $updateTransaksi = array(
                'status_transaksi' => $status_transaksi,
                'voucher_status'  => $status,
                'update_date'      => date('Y-m-d H:i:s')
            );

            $this->db->where('invoice_voucher', $results['invoice']);
            $update = $this->db->update('t_transaksi', $updateTransaksi);

            //             $this->db->select('kode_diamond, contact, index_item, invoice, voucher_game, harga, pembayaran');
            //             $this->db->from('t_transaksi');
            //             $this->db->where('invoice_voucher', $results['invoice']);
            //             $getInvoice = $this->db->get()->row();

            //             $getTitle = $this->db->query('SELECT tg.name FROM t_game as tg WHERE slug = "' . $getInvoice->voucher_game . '"')->row();

            //             $urlVoucher = 'https://apivouchergame.com/api/product/' . $getInvoice->voucher_game . '';
            //             $ch = curl_init($urlVoucher);
            //             curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //             $response = curl_exec($ch);

            //             $datas = json_decode($response, true);

            //             $diamond = $datas['data']['denominations'][$getInvoice->index_item]['name'];

            //             $format_rupiah = "Rp " . number_format($getInvoice->harga, 0, ',', '.');

            //             if ($update && $getInvoice->contact != null) {

            //                 $curls = curl_init();
            //                 $msg = 'Halo Sister !
            // Berikut Adalah Rincian Pesanan Anda

            // Informasi pembelian :

            // Produk : ' . $getTitle->name . " ($diamond)" . '
            // No.Invoice : ' . $getInvoice->invoice . '
            // Harga :' . $format_rupiah . '
            // Total : ' . $format_rupiah . '
            // Pembayaran: ' . strtoupper($getInvoice->pembayaran) . '

            // ===============
            // Estimasi Proses :
            // - Proses Otomatis :  1-3 Menit
            // - Delay 7 Hari : 7-8 Hari
            // Mohon Menunggu Sesuai Estimasi Proses
            // ===============


            // Di tunggu Next Ordernya , Semoga Sehat Selalu Dan Lancar Rezekinya

            // Terimakasih';
            //                 //                 $msg = 'Halo Sister !
            //                 // Berikut Adalah Rincian Pesanan Anda

            //                 // Informasi pembelian :

            //                 // Produk : ' . $getTitle->name . " ($diamond)" . '
            //                 // No.Invoice : ' . $getInvoice->invoice . '
            //                 // Harga :' . $format_rupiah . '
            //                 // Total : ' . $format_rupiah . '
            //                 // Pembayaran: ' . strtoupper($getInvoice->pembayaran) . '
            //                 // Untuk Detail Order Selengkapnya Klik Link di bawah!
            //                 // http://percobaan-topup.epizy.com/invoice/detail/' . $getInvoice->invoice . '

            //                 // ===============
            //                 // Estimasi Proses :
            //                 // - Proses Otomatis :  1-3 Menit
            //                 // - Delay 7 Hari : 7-8 Hari
            //                 // Mohon Menunggu Sesuai Estimasi Proses
            //                 // ===============


            //                 // Di tunggu Next Ordernya , Semoga Sehat Selalu Dan Lancar Rezekinya

            //                 // Terimakasih';

            //                 curl_setopt_array($curls, array(
            //                     CURLOPT_URL => 'https://app.whacenter.com/api/send',
            //                     CURLOPT_RETURNTRANSFER => true,
            //                     CURLOPT_ENCODING => '',
            //                     CURLOPT_MAXREDIRS => 10,
            //                     CURLOPT_TIMEOUT => 0,
            //                     CURLOPT_FOLLOWLOCATION => true,
            //                     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //                     CURLOPT_CUSTOMREQUEST => 'POST',
            //                     CURLOPT_POSTFIELDS => array('device_id' => '6d93e0222a0b640c1b49e2e716e32401', 'number' => $getInvoice->contact, 'message' => $msg),
            //                 ));

            //                 $responses = curl_exec($curls);

            //                 curl_close($curls);

            //                 $json_respose = json_encode($responses);
            //                 $decode = json_decode($responses, true);


            //                 $dataInsert = array(
            //                     'json'        => $json_respose,
            //                     'message'     => $msg,
            //                     'data'      => 'id :' . $decode['data']['id'],
            //                     'create_date' => date('Y-m-d H:i:s')
            //                 );

            //                 $this->db->insert('log_callback_whacenter', $dataInsert);
            //                 // echo $responses;
            //             }
        } else {
            $status_callback = 'Gagal';
        }

        $dataInsertVoucher = array(
            'json'        => $json_results,
            'status'      => $status_callback,
            'message'     => $results['message'],
            'create_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_callback_voucher', $dataInsertVoucher);
        // echo json_encode(['status' => $status, 'response' => $responses]);
    }
}
