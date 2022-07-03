<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Masukkan Email anda']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|trim|min_length[3]|matches[password_2]', [
            'required' => 'Masukkan Password',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password anda tidak cocok'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'    => 'Register'
            );
            $this->load->view('templates/head', $data);
            $this->load->view('user/register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'email'         => $this->input->post('email'),
                'password'         => md5($this->input->post('password_1', true)),
                'role_id'         => '2',
                'tgl_daftar'     => date('Y-m-d H:i:s'),
            );

            $this->db->insert('users', $data);
            redirect('auth/login');
        }
    }
}
