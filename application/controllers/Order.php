<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->authorization       = "Authorization: Bearer 152|CcZyE71bF6FeMgoQRWfLcDvHxQ6lsgBjjqCcypGE";
        $params = array('server_key' => 'SB-Mid-server-dyT-ryGH1MDVgI79u6lD6aG6', 'production' => false);
        $this->load->library('veritrans');
        $this->veritrans->config($params);
    }

    public function getHarga()
    {
        $slug = $this->input->post('slug');
        $item = $this->input->post('item');

        $url = 'https://apivouchergame.com/api/product/' . $slug . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $data = json_decode($response, true);

        $result['harga'] = $data['data']['denominations'][$item]['price'];

        echo $result['harga'];
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

        // var_dump($data);
        // die;

        $getPayment = $this->db->query('SELECT * FROM t_payment')->result_array();

        $this->db->select('*');
        $this->db->from('t_game');
        $this->db->where('slug', $slug);
        $datas = $this->db->get()->row();

        $title = $datas->name;


        $result = array(
            'isi'   => 'user/detail',
            'data'  => $data['data']['denominations'],
            'url'   => $datas->url_image,
            'payment' => $getPayment,
            'slug'  => $slug,
            'title' => $title
        );

        $this->load->view('templates/wrapper', $result);
    }

    public function proses()
    {
        $harga        = $this->input->post('harga');
        $game         = $this->input->post('game');
        $pembayaran   = $this->input->post('pembayaran');
        $id_player    = $this->input->post('id_player');
        $server       = $this->input->post('server');
        $kode_voucher = $this->input->post('kode_voucher');
        $key          = $this->input->post('key');
        $contact      = $this->input->post('contact');

        $id_user      = $this->session->userdata('id_user');

        $time = time();
        $order_time = date("Y-m-d H:i:s O", $time);
        $batas = date('Y-m-d H:i:s O', strtotime('1 hour'));
        $invoice = 'INV' . rand();
        $order_id = 'ORDER-' . uniqid();

        $transaction_details = array(
            'order_id'             => $order_id,
            'gross_amount'     => $harga
        );

        // Populate customer's Info
        $customer_details = array(
            'email'                     => "mail@me.com",
            'phone'                     => @$contact,
        );

        if ($pembayaran == 'bni' || $pembayaran == 'bri') {
            $payment_type = 'bank_transfer';
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                $payment_type       => array(
                    'bank'    => $pembayaran
                ),
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => $order_time,
                    'expiry_duration' => 60,
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
                    'order_time' => $order_time,
                    'expiry_duration' => 60,
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
                    'order_time' => $order_time,
                    'expiry_duration' => 60,
                    'unit' => 'minute'
                )
            );
        } else if ($pembayaran == 'gopay') {
            $payment_type = $pembayaran;
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => $order_time,
                    'expiry_duration' => 60,
                    'unit' => 'minute'
                ),
            );
        } else {
            $payment_type = $pembayaran;
            $transaction_data = array(
                'payment_type'      => $payment_type,
                'transaction_details'   => $transaction_details,
                'customer_details'      => $customer_details,
                'custom_expiry' => array(
                    'order_time' => $order_time,
                    'expiry_duration' => 60,
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
            // var_dump($e->getMessage());
        }
        // var_dump($response);
        // die();

        if ($response) {
            if ($response->transaction_status == "capture") {
                echo json_encode($response);
            } else if ($response->transaction_status == "deny") {
                echo json_encode($response);
            } else if ($response->transaction_status == "challenge") {
                echo json_encode($response);
            } else {
                $response->type_payment = $pembayaran;
                $response->batas_pembayaran = $batas;
                $response->invoice = $invoice;
                echo json_encode($response);
            }
        }

        if ($payment_type == 'permata') {
            $va_number = $response->permata_va_number;
        } else if ($payment_type == 'bank_transfer') {
            $va_number = $response->va_numbers[0]->va_number;
        }

        if ($payment_type == 'gopay' || $payment_type == 'qris') {
            $gopayRedirect = @$response->actions[0]->url;
        }

        if ($payment_type == 'shopeepay') {
            $shopeepayRedirect = @$response->actions[0]->url;
        }

        $status_transaksi = 'Menunggu Pembayaran';

        $dataInsert = array(
            'id_order'            => $order_id,
            'id_user'             => @$id_user,
            'id_player'           => $id_player,
            'invoice'             => $invoice,
            'voucher_game'        => $game,
            'server_player'       => $server,
            'kode_diamond'        => $kode_voucher,
            'harga'               => $harga,
            'status_transaksi'    => $status_transaksi,
            'payment_type'        => $payment_type,
            'pembayaran'          => $pembayaran,
            'midtrans_status'     => $response->transaction_status,
            'redeem_code_voucher' => null,
            'invoice_voucher'     => null,
            'va_number'           => @$va_number,
            'kode_pembayaran'     => @$response->payment_code,
            'bill_code'           => @$response->biller_code,
            'bill_key'            => @$response->bill_key,
            'deeplink_redirect'   => @$shopeepayRedirect,
            'qr_code'             => @$gopayRedirect,
            'redirect_qrcode'     => @$response->actions[1]->url,
            'voucher_status'      => null,
            'index_item'          => $key,
            'create_date'         => $order_time,
            'batas_pembayaran'    => $batas,
            'contact'             => @$contact
        );

        $insert = $this->db->insert('t_transaksi', $dataInsert);
    }

    function check()
    {
        $status = true;
        $data = [];
        $slug = $this->input->post('slug');
        $key = $this->input->post('key');
        $this->_validate();

        $url = 'https://apivouchergame.com/api/product/' . $slug . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $data = json_decode($response, true);

        $result = $data;


        if ($slug == 'mobile-legend') {

            $post = array(
                'uid' => $this->input->post('id_player'),
                'zid' => $this->input->post('server')
            );
        } else {

            $post = array(
                'uid' => $this->input->post('id_player'),
            );
        }

        $urls = 'https://apivouchergame.com/api/check-game-id/' . $slug . '';
        $chs = curl_init($urls);
        curl_setopt($chs, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($chs, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chs, CURLOPT_POST, true);
        curl_setopt($chs, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->authorization));
        curl_setopt($chs, CURLOPT_POSTFIELDS, json_encode($post));
        $responses = curl_exec($chs);
        $datas = json_decode($responses, true);

        if ($slug == 'mobile-legend') {
            if ($datas['code'] != 204) {
                $result['harga'] = $data['data']['denominations'][$key]['price'];
                $result['game'] = $slug;
                $result['username'] = $datas['result'];
                $result['uid'] = $this->input->post('id_player');
                $result['zid'] = $this->input->post('server');
                $data = $result;
            } else {
                $status = false;
            }
        } else {
            if ($datas['code'] != 204) {
                $result['harga'] = $data['data']['denominations'][$key]['price'];
                $result['game'] = $slug;
                $result['username'] = $datas['result'];
                $result['uid'] = $this->input->post('id_player');
                $data = $result;
            } else {
                $status = false;
            }
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
