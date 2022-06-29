<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Handling extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->authorization       = "Authorization: Bearer 119|vvtPdTedfPJ0Ltxb8cU0j2HicoHA2ve3ZzC6dhrG";
    }

    function callbackNotif_post()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        $status = $result->transaction_status;

        $getAPIVOUCHERGAME = $this->db->query('SELECT id_player, voucher_game, server_player, kode_diamond, harga FROM t_transaksi WHERE id_order = "' . $result->order_id . '"')->row();
        // var_dump($result);
        $slug = $getAPIVOUCHERGAME->voucher_game;
        $item = $getAPIVOUCHERGAME->kode_diamond;

        if ($status == 'settlement') {
            $post = array(
                'uid'   => $getAPIVOUCHERGAME->id_player,
                'zid'   => $getAPIVOUCHERGAME->server_player
            );

            $url = 'https://apivouchergame.com/api/production/product/' . $slug . '' . "/" . '' . $item . '';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
            $response = curl_exec($ch);
            // var_dump(json_encode($post));
            // die;

            $data = json_decode($response, true);

            $status_transaksi = 'Sedang di proses';
        } else if ($status == 'expire' || $status == 'deny' || $status == 'cancel') {
            $status_transaksi = 'Transaksi Gagal';
        } else if ($status == 'pending') {
            $status_transaksi = 'Menunggu Pembayarans';
        }

        $updateTransaksi = array(
            'status_transaksi' => $status_transaksi,
            'midtrans_status'  => $status,
            'voucher_status'   => $data['data']['transaction_status'],
            'invoice_voucher'  => $data['data']['invoice'],
            'update_date'      => date('Y-m-d H:i:s')
        );

        $this->db->where('id_order', $result->order_id);
        $this->db->update('t_transaksi', $updateTransaksi);

        echo json_encode(['status' => $status, 'data' => $data, 'response' => $response]);
        // var_dump($this->db->last_query());
        // die;
    }

    function callbackVoucher_post()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        $status = $result->status;

        if ($result) {
            if ($status == 'success') {

                $status_transaksi = 'Transaksi Berhasil';
                $this->response([
                    'response'    => true,
                    'result'      => $result,
                    'status'      => $status,
                    'message'     => $result->message
                ], REST_Controller::HTTP_OK);
            } else if ($status == 'expire' || $status == 'deny' || $status == 'cancel') {
                $status_transaksi = 'Transaksi Gagal';
                $this->response([
                    'response'    => true,
                    'status'      => $status,
                    'message'     => $result->message
                ], REST_Controller::HTTP_OK);
            }

            $updateTransaksi = array(
                'status_transaksi' => $status_transaksi,
                'voucher_status'  => $status,
                'update_date'      => date('Y-m-d H:i:s')
            );

            $this->db->where('invoice_voucher', $result->invoice);
            $this->db->update('t_transaksi', $updateTransaksi);

            $this->response([
                'response'    => true,
                'status'      => $status,
                'result'  => $result,
                'message'     => 'Response ditemukan'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'response' => false,
                'message'  => 'Maaf tidak ada response'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
