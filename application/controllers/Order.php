<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->authorization       = "Authorization: Bearer 93|VHb6ulLg8EvrlxrNAZUsujtTkTb5RTRH5OmNjhNU";
    }


    public function voucher($slug)
    {
        $url = 'https://apivouchergame.com/api/product/' . $slug . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $data = json_decode($response, true);

        $getPayment = $this->db->query('SELECT * FROM t_payment')->result_array();

        $result = array(
            'isi'   => 'user/detail',
            'data'  => $data['data']['denominations'],
            'payment' => $getPayment,
            'slug'  => $slug
        );

        // var_dump($result['data']);
        // die;
        $this->load->view('templates/wrapper', $result);
    }

    function detail()
    {
        $status = true;
        $data = [];
        $item = $this->input->post('item');
        $slug = $this->input->post('slug');
        $key = $this->input->post('key');
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
}
