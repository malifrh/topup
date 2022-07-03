<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth', 'm_auth');
    }

    public function login()
    {

        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email belum ditambahkan!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password belum ditambahkan!']);
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'    => 'Login'
            );
            $this->load->view('templates/head', $data);
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->m_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Email atau Password anda Salah!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
                redirect('auth/login');
            } else {
                $dataSession['id_user'] = $auth->id_user;
                $dataSession['email'] = $auth->email;
                $this->session->set_userdata($dataSession);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('welcome');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
