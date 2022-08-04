<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {

        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

        $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung

        $total_registrasi = $this->db->query('SELECT COUNT(id_user) as total FROM users WHERE role_id = "2"')->row();

        $total_transaksi = $this->db->query('SELECT COUNT(id_transaksi) as total_transaksi FROM t_transaksi')->row();

        $total_pendapatan = $this->db->query('SELECT SUM(harga) as total_pendapatan FROM t_transaksi WHERE status_transaksi = "Transaksi Berhasil"')->row();

        $data = array(
            'isi'              => 'admin/dashboard',
            'title'            => 'Dashboard',
            'total_pengunjung' => $totalpengunjung,
            'total_transaksi'  => $total_transaksi->total_transaksi,
            'total_pendapatan' => $total_pendapatan->total_pendapatan,
            'total_registrasi' => $total_registrasi->total
        );
        $this->load->view('templates_admin/wrapper', $data);
    }
}
