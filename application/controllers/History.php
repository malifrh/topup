<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function index()
    {

        $data = array(
            'isi'   => 'user/history',
            'title'    => '| Riwayat Transaksi'
        );
        $this->load->view('templates/wrapper', $data);
    }
}
