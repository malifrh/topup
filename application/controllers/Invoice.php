<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_invoice', 'm_invoice');
    }


    public function index()
    {

        $data = array(
            'isi'   => 'user/invoice',
            'title'    => '| Check Invoice'
        );
        $this->load->view('templates/wrapper', $data);
    }

    public function detail($invoice)
    {
        $data = array(
            'isi'   => 'user/detail_invoice',
            'title'    => '| Invoice',
            'invoice'   => $invoice
        );
        $this->load->view('templates/wrapper', $data);
    }

    public function ajax_info()
    {
        $status = true;
        $data = [];
        $invoice = $this->input->post('invoice');
        $getInvoice = $this->m_invoice->cek_invoice($invoice)->row();

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

        $url = 'https://apivouchergame.com/api/product/' . $getInvoice->voucher_game . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $datas = json_decode($response, true);

        $diamond = $datas['data']['denominations'][$getInvoice->index_item]['name'];


        if ($getInvoice) {
            $getInvoice->produk = $title . " ($diamond)";

            $data = $getInvoice;
        } else {
            $status = false;
        }

        echo json_encode(['status' => $status, 'data' => $data]);
    }
}
