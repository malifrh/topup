<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
date_default_timezone_set('Asia/Jakarta');

class Handling extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->authorization       = "Authorization: Bearer 152|CcZyE71bF6FeMgoQRWfLcDvHxQ6lsgBjjqCcypGE";
    }

    function callbackNotif_post()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        // var_dump($json_result);
        // die;
        $status = $result->transaction_status;

        $getAPIVOUCHERGAME = $this->db->query('SELECT id_player, voucher_game, server_player, kode_diamond, harga FROM t_transaksi WHERE id_order = "' . $result->order_id . '"')->row();
        // var_dump($result);
        $slug = $getAPIVOUCHERGAME->voucher_game;
        $item = $getAPIVOUCHERGAME->kode_diamond;

        if ($result) {
            $status_callback = 'Sukses';
            if ($status == 'settlement') {
                $post = array(
                    'uid'   => $getAPIVOUCHERGAME->id_player,
                    'zid'   => $getAPIVOUCHERGAME->server_player
                );

                $url = 'https://apivouchergame.com/api/sandbox/product/' . $slug . '' . "/" . '' . $item . '';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
                $response = curl_exec($ch);

                $data = json_decode($response, true);

                $status_transaksi = 'Sedang di proses';
            } else if ($status == 'expire' || $status == 'deny' || $status == 'cancel') {
                $status_transaksi = 'Transaksi Gagal';
            } else if ($status == 'pending') {
                $status_transaksi = 'Menunggu Pembayaran';
            }

            // var_dump($data->data);
            // var_dump($data['data']);
            // die;
            $updateTransaksi = array(
                'status_transaksi' => $status_transaksi,
                'midtrans_status'  => $status,
                'voucher_status'   => $data['data']['transaction_status'],
                'invoice_voucher'  => $data['data']['invoice'],
                'update_date'      => date('Y-m-d H:i:s')
            );

            $this->db->where('id_order', $result->order_id);
            $this->db->update('t_transaksi', $updateTransaksi);
        } else {
            $status_callback = 'Gagal';
        }


        $dataInsert = array(
            'json'        => $json_result,
            'status'      => $status_callback,
            'create_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_callback_midtrans', $dataInsert);

        echo json_encode(['status' => $status, 'data' => $data, 'response' => $response]);
    }

    function callbackVoucher_post()
    {
        $json_results = file_get_contents('php://input');
        $results = json_decode($json_results);
        // var_dump($json_results);
        // var_dump($results);
        // // die;
        $status = $results->status;
        // var_dump($status);
        // die;

        if ($results) {
            $status_callback = 'Sukses';
            if ($status == 'success') {

                $status_transaksi = 'Transaksi Berhasil';
            } else if ($status == 'incoming' || $status == 'deny' || $status == 'cancel' || $status == 'failed') {
                $status_transaksi = 'Proses';
            }

            $updateTransaksi = array(
                'status_transaksi' => $status_transaksi,
                'voucher_status'  => $status,
                'update_date'      => date('Y-m-d H:i:s')
            );

            $this->db->where('invoice_voucher', $results->invoice);
            $update = $this->db->update('t_transaksi', $updateTransaksi);

            $this->db->select('kode_diamond, contact, index_item, invoice, voucher_game, harga, pembayaran');
            $this->db->from('t_transaksi');
            $this->db->where('invoice_voucher', $results->invoice);
            $getInvoice = $this->db->get()->row();

            if ($getInvoice->voucher_game == 'free-fire' || $getInvoice->voucher_game == 'free-fire-max') {
                $title = 'FREE FIRE';
            } else if ($getInvoice->voucher_game == 'mobile-legend') {
                $title = 'MOBILE LEGEND';
            } else if ($getInvoice->voucher_game == 'call-of-duty-mobile') {
                $title = 'CALL OF DUTY';
            } else if ($getInvoice->voucher_game == 'sausage-man') {
                $title = 'SAUSAGE MAN';
            } else if ($getInvoice->voucher_game == 'arena-of-valor') {
                $title = 'ARENA OF VALOR';
            } else if ($getInvoice->voucher_game == 'higgs-domino') {
                $title = 'HIGGS DOMINO';
            } else if ($getInvoice->voucher_game == 'pubg-mobile') {
                $title = 'PUBG MOBILE';
            } else if ($getInvoice->voucher_game == 'ragnarok-x-next-generation') {
                $title = 'RAGNAROK X: NEXT GENERATION';
            } else {
                $title = 'STEAM WALLET';
            }

            $urlVoucher = 'https://apivouchergame.com/api/product/' . $getInvoice->voucher_game . '';
            $ch = curl_init($urlVoucher);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            $datas = json_decode($response, true);

            $diamond = $datas['data']['denominations'][$getInvoice->index_item]['name'];

            if ($update && $getInvoice->contact != null) {
                // var_dump($getInvoice->contact);
                // die;
                $curls = curl_init();
                $msg = 'Halo Sister !
Berikut Adalah Rincian Pesanan Anda

Informasi pembelian :

Produk : ' . $title . " ($diamond)" . '
No.Invoice : ' . $getInvoice->invoice . '
Harga : Rp ' . $getInvoice->harga . '
Total : Rp ' . $getInvoice->harga . '
Pembayaran: ' . strtoupper($getInvoice->pembayaran) . '
Untuk Detail Order Selengkapnya Klik Link di bawah!
http://percobaan-topup.epizy.com/invoice/detail/TP260422197080

===============
Estimasi Proses :
- Proses Otomatis :  1-3 Menit
- Delay 7 Hari : 7-8 Hari
Mohon Menunggu Sesuai Estimasi Proses
===============


Di tunggu Next Ordernya , Semoga Braderpedia Sehat Selalu Dan Lancar Rezekinya

Terimakasih';

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

                // var_dump($responses);
                // var_dump($json_respose);
                // var_dump($decode);
                // die;


                $dataInsert = array(
                    'json'        => $json_respose,
                    'message'     => $msg,
                    'data'      => 'id :' . $decode['data']['id'],
                    'create_date' => date('Y-m-d H:i:s')
                );

                $this->db->insert('log_callback_whacenter', $dataInsert);
                // echo $responses;
            }
        } else {
            $status_callback = 'Gagal';
        }

        $dataInsert = array(
            'json'        => $json_results,
            'message'     => $results->message,
            'status'      => $status_callback,
            'create_date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_callback_voucher', $dataInsert);
        echo json_encode(['status' => $status, 'response' => $responses]);
    }
}
