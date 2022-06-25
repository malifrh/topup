<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Notifications extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index_post()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        var_dump("test");
        return $result;
    }

    function handling_post()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        // var_dump($json_result);
        var_dump($result);
        error_log(print_r($result, TRUE));
        return $result;
    }

    public function input_nilai_post()
    {
        $post   = $this->input->post();
        $status = true;

        $nilai        = $post['nilai'];
        $id_pendaftar = $post['id_pendaftar'];
        $id_program   = $post['id_program'];
        $id_level     = $post['id_level'];

        $results = $this->db->select('a.*')
            ->from('t_blk_pendaftaran a')
            ->where('a.id_pendaftaran', $id_pendaftar)
            ->get()->row();

        if ($id_level != null) {
            $queryMateri = $this->m_pelatihan->getDataMasterMateriOnlineLevel()->result();
        } else {
            $queryMateri = $this->m_pelatihan->getDataMasterMateriOnline()->result();
        }

        if (isset($results)) {
            if ($nilai < 60) {
                $this->response([
                    'response' => false,
                    'message'  => 'Maaf anda tidak lulus pada ujian test materi'
                ], REST_Controller::HTTP_NOT_ACCEPTABLE);
            } else {
                $data_sertifikat = $this->m_pelatihan->cek_data_sertifikat_by_id_online();
                $materi          = $queryMateri;
                $program         = $this->m_pelatihan->getDataMasterPelatihanOnline()->row();
                $level           = $this->m_pelatihan->getDataLevel()->row();

                $this->qr_code(str_pad($id_pendaftar, 4, "0", STR_PAD_LEFT));

                if ($program->lampiran_sertifikat  != '0') {
                    $file = $this->sertifikat($data_sertifikat, $materi, $program, $nilai, $level);
                } else {
                    $file = $this->sertifikat_non($data_sertifikat, null, $program, $nilai, $level);
                }

                $pdf_name  = @$data_sertifikat->nik . '-' . @$program->nama_master_program . '_Online' . '_' . time() . '.pdf';
                $nama_file = base_url() . 'assets/file/pdf/' . $pdf_name;
                $datas     = array(
                    'file_sertifikat'   => $pdf_name,
                );

                $this->response([
                    'response'    => true,
                    'sertifikat'  => base_url() . 'assets/file/pdf/' . $pdf_name,
                    'sertif_name' => $pdf_name,
                    'message'     => 'Anda lulus dalam ujian tersebut'
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->set_response([
                'status'  => FALSE,
                'message' => 'id_pendaftar tidak ditemukan',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        echo json_encode(['status' => $status]);
    }
}
