<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function index()
    {

        $data = array(
            'isi'   => 'user/invoice',
            'title'    => 'Check Invoice | Topup'
        );
        $this->load->view('templates/wrapper', $data);
    }
}
