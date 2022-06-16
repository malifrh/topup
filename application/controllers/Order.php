<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function voucher($slug)
    {
        $url = 'https://apivouchergame.com/api/product/' . $slug . '';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $data = json_decode($response, true);

        $result = array(
            'isi'   => 'user/detail',
            'data'  => $data['data']['denominations']
        );

        // var_dump($result['data']);
        // die;
        $this->load->view('templates/wrapper', $result);
    }
}
