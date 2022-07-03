<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_table extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($type = null, $sort = null, $order = null)
    {
        switch ($type) {
            case 'data_list_invoice':
                $filter   = @$_POST['filter'];
                $this->db->select('*');
                $this->db->from('t_transaksi');
                $this->db->where('invoice', $filter['id_invoice']);
                if ($_POST['order'][0]['column'] == 0) {
                    $this->db->order_by('id_transaksi', $order);
                } else {
                    $this->db->order_by($sort, $order);
                }

                break;

            case 'data_list_history':
                $filter   = @$_POST['filter'];
                $this->db->select('*');
                $this->db->from('t_transaksi');
                $this->db->where('id_user', $this->session->userdata('id_user'));
                if ($_POST['order'][0]['column'] == 0) {
                    $this->db->order_by('id_transaksi', $order);
                } else {
                    $this->db->order_by($sort, $order);
                }

                break;

            case 'data_list_history_admin':
                $filter   = @$_POST['filter'];
                $this->db->select('*');
                $this->db->from('t_transaksi');
                if ($_POST['order'][0]['column'] == 0) {
                    $this->db->order_by('id_transaksi', $order);
                } else {
                    $this->db->order_by($sort, $order);
                }

                break;

            case 'data_list_user':
                $filter   = @$_POST['filter'];
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('role_id !=', '1');
                if ($_POST['order'][0]['column'] == 0) {
                    $this->db->order_by('id_user', $order);
                } else {
                    $this->db->order_by($sort, $order);
                }

                break;

            default:
                # code...
                break;
        }
    }

    function get_datatables($type = null, $sort = null, $order = null)
    {
        $this->_get_datatables_query($type, $sort, $order);

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($type = null)
    {
        $this->_get_datatables_query($type);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($type = null)
    {
        $this->_get_datatables_query($type);
        $db_results = $this->db->get();
        $results = $db_results->result();
        $num_rows = $db_results->num_rows();
        return $num_rows;
    }
}
