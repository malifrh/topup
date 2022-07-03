<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");

class Tables extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_table');
    }

    public function ajax_list()
    {
        $type    = $this->input->post('type');
        $data     = array();
        $start    = isset($_POST['start']) ? intval($_POST['start']) : 0;
        $length   = isset($_POST['length']) ? intval($_POST['length']) : 10;
        $sort     = isset($_POST['columns'][$_POST['order'][0]['column']]['data']) ? strval($_POST['columns'][$_POST['order'][0]['column']]['data']) : 'nama';
        $order    = isset($_POST['order'][0]['dir']) ? strval($_POST['order'][0]['dir']) : 'asc';
        $filter   = @$_POST['filter'];
        $no = $this->input->post('start');

        switch ($type) {
            case 'data_list_invoice':
                $list = $this->m_table->get_datatables('data_list_invoice', $sort, $order);
                // var_dump($this->db->last_query());
                foreach ($list as $l) {
                    $no++;

                    if ($l->voucher_game == 'free-fire' || $l->voucher_game == 'free-fire-max') {
                        $title = 'FREE FIRE';
                    } else if ($l->voucher_game == 'mobile-legend') {
                        $title = 'MOBILE LEGEND';
                    } else if ($l->voucher_game == 'call-of-duty-mobile') {
                        $title = 'CALL OF DUTY';
                    } else if ($l->voucher_game == 'sausage-man') {
                        $title = 'SAUSAGE MAN';
                    } else if ($l->voucher_game == 'arena-of-valor') {
                        $title = 'ARENA OF VALOR';
                    } else if ($l->voucher_game == 'higgs-domino') {
                        $title = 'HIGGS DOMINO';
                    } else if ($l->voucher_game == 'pubg-mobile') {
                        $title = 'PUBG MOBILE';
                    } else if ($l->voucher_game == 'ragnarok-x-next-generation') {
                        $title = 'RAGNAROK X: NEXT GENERATION';
                    } else {
                        $title = 'STEAM WALLET';
                    }

                    $url = 'https://apivouchergame.com/api/product/' . $l->voucher_game . '';
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);

                    $datas = json_decode($response, true);

                    $diamond = $datas['data']['denominations'][$l->index_item]['name'];

                    $l->no = $no;
                    $l->produk = $title . " ($diamond)";
                    // $l->aksi = "
                    // 	<a href='javascript:void(0)' class='btn btn-info btn-xs block' title='Detail Anggota' onclick='detail(" . $l->id_transaksi    . ")'>
                    // 	<i class='fa fa-eye'></i> Detail
                    // 	</a>";

                    $data[] = $l;
                }

                $output = array(
                    "draw"              => $_POST['draw'],
                    "recordsTotal"      => $this->m_table->count_all('data_list_invoice', $sort, $order),
                    "recordsFiltered"   => $this->m_table->count_filtered('data_list_invoice', $sort, $order),
                    "data"              => $data,
                    'filter'            => $filter,
                );
                echo json_encode($output);
                break;

            case 'data_list_history':
                $list = $this->m_table->get_datatables('data_list_history', $sort, $order);
                // var_dump($this->db->last_query());
                foreach ($list as $l) {
                    $no++;

                    if ($l->voucher_game == 'free-fire' || $l->voucher_game == 'free-fire-max') {
                        $title = 'FREE FIRE';
                    } else if ($l->voucher_game == 'mobile-legend') {
                        $title = 'MOBILE LEGEND';
                    } else if ($l->voucher_game == 'call-of-duty-mobile') {
                        $title = 'CALL OF DUTY';
                    } else if ($l->voucher_game == 'sausage-man') {
                        $title = 'SAUSAGE MAN';
                    } else if ($l->voucher_game == 'arena-of-valor') {
                        $title = 'ARENA OF VALOR';
                    } else if ($l->voucher_game == 'higgs-domino') {
                        $title = 'HIGGS DOMINO';
                    } else if ($l->voucher_game == 'pubg-mobile') {
                        $title = 'PUBG MOBILE';
                    } else if ($l->voucher_game == 'ragnarok-x-next-generation') {
                        $title = 'RAGNAROK X: NEXT GENERATION';
                    } else {
                        $title = 'STEAM WALLET';
                    }

                    $url = 'https://apivouchergame.com/api/product/' . $l->voucher_game . '';
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);

                    $datas = json_decode($response, true);

                    $diamond = $datas['data']['denominations'][$l->index_item]['name'];

                    $l->no = $no;
                    $l->produk = $title . " ($diamond)";
                    // $l->aksi = "
                    //     <a href='javascript:void(0)' class='btn btn-info btn-xs block' title='Detail Anggota' onclick='detail(" . $l->id_transaksi    . ")'>
                    //     <i class='fa fa-eye'></i> Detail
                    //     </a>";

                    $data[] = $l;
                }

                $output = array(
                    "draw"              => $_POST['draw'],
                    "recordsTotal"      => $this->m_table->count_all('data_list_history', $sort, $order),
                    "recordsFiltered"   => $this->m_table->count_filtered('data_list_history', $sort, $order),
                    "data"              => $data,
                    'filter'            => $filter,
                );
                echo json_encode($output);
                break;

            case 'data_list_produk':
                $url = 'https://apivouchergame.com/api/product';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                $result = json_decode($response, true);
                $list = $result['data']['service'];
                foreach ($list as $l) {
                    $no++;

                    $l['no'] = $no;
                    $l['produk'] = $l['name'];
                    $slug = $l['slug'];
                    $l['aksi'] = '
                            <a href="' . base_url('admin/product/detail/' . $slug . '') . '" class="btn btn-info block" title="Detail Item">
                            <i class="fa fa-list"></i> Detail
                            </a>';

                    $data[] = $l;
                }

                $output = array(
                    "draw"              => $_POST['draw'],
                    // "recordsTotal"      => $this->m_table->count_all('data_list_product', $sort, $order),
                    // "recordsFiltered"   => $this->m_table->count_filtered('data_list_product', $sort, $order),
                    "data"              => $data,
                    'filter'            => $filter,
                );
                echo json_encode($output);
                break;

            case 'data_list_detail_produk':
                $url = 'https://apivouchergame.com/api/product/' . $filter['slug'] . '';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                $result = json_decode($response, true);
                $list = $result['data']['denominations'];
                foreach ($list as $l) {
                    $no++;

                    $l['no'] = $no;
                    $l['produk'] = $l['name'];
                    $l['code']  = $l['code'];
                    $l['harga'] = $l['price'];

                    $data[] = $l;
                }

                $output = array(
                    "draw"              => $_POST['draw'],
                    // "recordsTotal"      => $this->m_table->count_all('data_list_product', $sort, $order),
                    // "recordsFiltered"   => $this->m_table->count_filtered('data_list_product', $sort, $order),
                    "data"              => $data,
                    'filter'            => $filter,
                );
                echo json_encode($output);
                break;

            case 'data_list_history_admin':
                $list = $this->m_table->get_datatables('data_list_history_admin', $sort, $order);
                // var_dump($this->db->last_query());
                foreach ($list as $l) {
                    $no++;

                    if ($l->voucher_game == 'free-fire' || $l->voucher_game == 'free-fire-max') {
                        $title = 'FREE FIRE';
                    } else if ($l->voucher_game == 'mobile-legend') {
                        $title = 'MOBILE LEGEND';
                    } else if ($l->voucher_game == 'call-of-duty-mobile') {
                        $title = 'CALL OF DUTY';
                    } else if ($l->voucher_game == 'sausage-man') {
                        $title = 'SAUSAGE MAN';
                    } else if ($l->voucher_game == 'arena-of-valor') {
                        $title = 'ARENA OF VALOR';
                    } else if ($l->voucher_game == 'higgs-domino') {
                        $title = 'HIGGS DOMINO';
                    } else if ($l->voucher_game == 'pubg-mobile') {
                        $title = 'PUBG MOBILE';
                    } else if ($l->voucher_game == 'ragnarok-x-next-generation') {
                        $title = 'RAGNAROK X: NEXT GENERATION';
                    } else {
                        $title = 'STEAM WALLET';
                    }

                    $url = 'https://apivouchergame.com/api/product/' . $l->voucher_game . '';
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);

                    $datas = json_decode($response, true);

                    $diamond = $datas['data']['denominations'][$l->index_item]['name'];

                    $l->no = $no;
                    $l->produk = $title . " ($diamond)";
                    $l->code = $l->kode_diamond;
                    $l->status_midtrans = ucfirst($l->midtrans_status);
                    $l->status_voucher = ucfirst($l->voucher_status);

                    $data[] = $l;
                }

                $output = array(
                    "draw"              => $_POST['draw'],
                    "recordsTotal"      => $this->m_table->count_all('data_list_history_admin', $sort, $order),
                    "recordsFiltered"   => $this->m_table->count_filtered('data_list_history_admin', $sort, $order),
                    "data"              => $data,
                    'filter'            => $filter,
                );
                echo json_encode($output);
                break;

            case 'data_list_user':
                $list = $this->m_table->get_datatables('data_list_user', $sort, $order);
                foreach ($list as $l) {
                    $no++;

                    $l->no = $no;

                    $data[] = $l;
                }

                $output = array(
                    "draw"              => $_POST['draw'],
                    "recordsTotal"      => $this->m_table->count_all('data_list_user', $sort, $order),
                    "recordsFiltered"   => $this->m_table->count_filtered('data_list_user', $sort, $order),
                    "data"              => $data,
                    'filter'            => $filter,
                );
                echo json_encode($output);
                break;
            default:
                break;
        }
    }
}
