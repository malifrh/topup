<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_invoice extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function cek_invoice()
    {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('t_transaksi');
        $this->db->where('invoice', $post['invoice']);
        $result = $this->db->get();

        return $result;
    }
}
