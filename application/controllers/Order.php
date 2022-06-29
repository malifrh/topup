<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->authorization       = "Authorization: Bearer 120|stNhbJE0tepgFIA7hEuDKz2CpWIBi9Y1l62klcVB";
        $params = array('server_key' => 'SB-Mid-server-dyT-ryGH1MDVgI79u6lD6aG6', 'production' => false);
        $this->load->library('veritrans');
        $this->veritrans->config($params);
    }


    public function voucher($slug)
    {
        $url = 'https://apivouchergame.com/api/product/' . $slug . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $data = json_decode($response, true);

        $getPayment = $this->db->query('SELECT * FROM t_payment')->result_array();

        if ($slug == 'free-fire' || $slug == 'free-fire-max') {
            $title = 'FREE FIRE';
        } else if ($slug == 'mobile-legend') {
            $title = 'MOBILE LEGEND';
        } else if ($slug == 'call-of-duty-mobile') {
            $title = 'CALL OF DUTY';
        } else if ($slug == 'sausage-man') {
            $title = 'SAUSAGE MAN';
        } else if ($slug == 'arena-of-valor') {
            $title = 'ARENA OF VALOR';
        } else if ($slug == 'higgs-domino') {
            $title = 'HIGGS DOMINO';
        } else if ($slug == 'pubg-mobile') {
            $title = 'PUBG MOBILE';
        } else if ($slug == 'ragnarok-x-next-generation') {
            $title = 'RAGNAROK X: NEXT GENERATION';
        } else {
            $title = 'STEAM WALLET';
        }

        $result = array(
            'isi'   => 'user/detail',
            'data'  => $data['data']['denominations'],
            'payment' => $getPayment,
            'slug'  => $slug,
            'title' => $title
        );

        // var_dump($result['data']);
        // die;
        $this->load->view('templates/wrapper', $result);
    }

    public function proses()
    {
        $harga = $this->input->post('harga');
        $game = $this->input->post('game');
        $pembayaran = $this->input->post('pembayaran');
        $id_player = $this->input->post('id_player');
        $server = $this->input->post('server');
        $kode_voucher = $this->input->post('kode_voucher');

        $invoice = 'INV-' . uniqid();
        $order_id = 'ORDER-' . uniqid();

        $transaction_details = array(
            'order_id'             => $order_id,
            'gross_amount'     => $harga
        );

        // Populate customer's Info
        $customer_details = array(
            'email'                     => "andrisetiawan@me.com",
            'phone'                     => "0813223118014",
        );

        if ($pembayaran == 'bca' || $pembayaran == 'bni' || $pembayaran == 'bri') {
            $payment_type = 'bank_transfer';
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                $payment_type       => array(
                    'bank'    => $pembayaran
                ),
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => date('Y-m-d H:i:s') . ' +0700',
                    'expiry_duration' => 10,
                    'unit' => 'minute'
                )
            );
        } else if ($pembayaran == 'mandiri') {
            $payment_type = 'echannel';
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                $payment_type       => array(
                    'bill_info1'    => 'Payment',
                    'bill_info2'    => 'Online Purchase'
                ),
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => date('Y-m-d H:i:s') . ' +0700',
                    'expiry_duration' => 10,
                    'unit' => 'minute'
                )
            );
        } else if ($pembayaran == 'permata') {
            $payment_type = 'permata';
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => date('Y-m-d H:i:s') . ' +0700',
                    'expiry_duration' => 10,
                    'unit' => 'minute'
                )
            );
        } else if ($pembayaran == 'alfamart') {
            $payment_type = 'cstore';
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                $payment_type       => array(
                    'store'    => $pembayaran,
                    'message'  => 'Message',
                    'alfamart_free_text_1' => '1st row of receipt,',
                    'alfamart_free_text_2' => 'This is the 2nd row,',
                    'alfamart_free_text_3' => '3rd row. The end.'
                ),
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => date('Y-m-d H:i:s') . ' +0700',
                    'expiry_duration' => 10,
                    'unit' => 'minute'
                )
            );
        } else if ($pembayaran == 'indomaret') {
            $payment_type = 'cstore';
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                $payment_type       => array(
                    'store'    => $pembayaran,
                    'message'  => 'Message',
                ),
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => date('Y-m-d H:i:s') . ' +0700',
                    'expiry_duration' => 10,
                    'unit' => 'minute'
                )
            );
        } else {
            $payment_type = $pembayaran;
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => date('Y-m-d H:i:s') . ' +0700',
                    'expiry_duration' => 10,
                    'unit' => 'minute'
                ),
            );
        }

        // var_dump($transaction_data);
        // die;
        $params = array('server_key' => 'SB-Mid-server-dyT-ryGH1MDVgI79u6lD6aG6', 'production' => false);
        $this->load->library('veritrans', $params);
        $response = null;
        try {
            $response = $this->veritrans->vtdirect_charge($transaction_data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if ($response) {
            if ($response->transaction_status == "capture") {
                echo json_encode($response);
            } else if ($response->transaction_status == "deny") {
                echo json_encode($response);
            } else if ($response->transaction_status == "challenge") {
                echo json_encode($response);
            } else {
                $response->type_payment = $pembayaran;
                echo json_encode($response);
            }
        }

        $status_transaksi = 'Menunggu Pembayaran';

        $dataInsert = array(
            'id_order' => $order_id,
            'id_user'  => null,
            'id_player' => $id_player,
            'voucher_game' => $game,
            'server_player' => $server,
            'kode_diamond'  => $kode_voucher,
            'harga'         => $harga,
            'status_transaksi' => $status_transaksi,
            'payment_type'  => $payment_type,
            'pembayaran'    => $pembayaran,
            'midtrans_status'   => $response->transaction_status,
            'redeem_code_voucher'   => null,
            'invoice_voucher'       => null,
            'va_number'             => @$response->va_numbers[0]->va_number,
            'qr_code'               => null,
            'redirect_qrcode'       => null,
            'voucher_status'        => null,
            'create_date'           => date('Y-m-d H:i:s')
        );

        // var_dump($dataInsert);
        $this->db->insert('t_transaksi', $dataInsert);
    }

    function check()
    {
        $status = true;
        $data = [];
        $item = $this->input->post('item');
        $slug = $this->input->post('slug');
        $key = $this->input->post('key');
        $this->_validate();
        // die();

        $url = 'https://apivouchergame.com/api/product/' . $slug . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        // $url = 'https://apivouchergame.com/api/sandbox/product/' . $slug . '' . "/" . '' . $item . '';
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, "93|VHb6ulLg8EvrlxrNAZUsujtTkTb5RTRH5OmNjhNU");
        // $response = curl_exec($ch);

        $data = json_decode($response, true);
        // var_dump($data);

        $result = $data;
        // var_dump($result);
        // var_dump($result);
        // var_dump($responses);
        // die();


        // $post = array(
        //     'uid' => $this->input->post('id_player'),
        //     'zid' => $this->input->post('server')
        // );

        // $urls = 'https://apivouchergame.com/api/checkGameId/mobile-legend';
        // $chs = curl_init($urls);
        // curl_setopt($chs, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        // curl_setopt($chs, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($chs, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($chs, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
        // curl_setopt($chs, CURLOPT_POSTFIELDS, $post);
        // $responses = curl_exec($chs);
        // // var_dump($result);
        // $datas = json_decode($responses, true);
        // var_dump($datas);
        // die();
        // var_dump($this->db->last_query());die();

        if ($result) {
            // $undangan_test->tanggal_pelaksanaan_ujian = date('d-m-Y', strtotime($undangan_test->tanggal_pelaksanaan_ujian));
            // $undangan_test->program_pelatihan = $undangan_test->nama_pelatihan;
            $result['harga'] = $data['data']['denominations'][$key]['price'];
            $result['game'] = $slug;
            $data = $result;
        } else {
            $status = false;
        }

        echo json_encode(['status' => $status, 'data' => $data]);
    }

    private function _validate()
    {
        $data = [];

        $id_player = $this->input->post('id_player');
        $server = $this->input->post('server');


        $data['error_class']  = [];
        $data['error_string'] = [];
        $data['status']       = true;

        if ($id_player == '') {
            $data['error_class']['id_player']  = 'is-invalid';
            $data['error_string']['id_player'] = 'ID Player tidak boleh kosong';
            $data['status']                         = false;
        }

        if ($server == '') {
            $data['error_class']['server']  = 'is-invalid';
            $data['error_string']['server'] = 'Server tidak boleh kosong';
            $data['status']                = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit();
        }
    }
}
