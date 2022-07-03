<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function cek_login()
    {
        $email = set_value('email');

        $pass = md5(set_value('password'));

        $result   = $this->db->where('email', $email)
            ->where('password', $pass)
            ->limit(1)
            ->get('users');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function user($id)
    {
        $result   = $this->db->where('id_user', $id)
            ->limit(1)
            ->get('users');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
