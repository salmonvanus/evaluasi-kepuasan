<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Kuesioner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load Model
        $this->load->model('data/tabel_layanan');
        $this->load->model('data/tabel_pertanyaan');
        $this->load->model('data/tabel_responden_harapan');
        $this->load->model('data/tabel_responden_persepsi');
        $this->load->model('data/tabel_biodata_responden');

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['parent']     = "Kuesioner";
        $data['display']    = "Kuesioner";
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Kuesioner";
        $data['href'][1]    = "";

        $data['layanan']    = $this->tabel_layanan->all();
        // var_dump($data);
        // die;

        $this->load->view('user/kuesioner', $data);
    }

    public function view()
    {
        $data['layanan']    = $this->tabel_layanan->all();
        $data['parent']     = "Kuesioner";
        $data['display']    = "Kuesioner";
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Kuesioner";
        $data['href'][1]    = "";

        $id_layanan['id_layanan']       = $this->input->post('layanan_id');
        $id['id']                       = $this->input->post('layanan_id');
        $data['pertanyaan_harapan']     = $this->tabel_pertanyaan->get_pertanyaan_harapan_by_id_layanan($id_layanan);
        $data['pertanyaan_persepsi']    = $this->tabel_pertanyaan->get_pertanyaan_persepsi_by_id_layanan($id_layanan);
        $data['id_layanan']             = $this->input->post('layanan_id');
        $data['layanan']                = $this->tabel_layanan->get($id);

        $this->load->view('user/view_kuesioner', $data);
    }

    public function inputKuesioner() 
    {
        $biodata_responden['nama']              = $this->input->post('add_nama');
        $biodata_responden['kode_responden']    = $this->input->post('add_kode_responden');
        $biodata_responden['alamat']            = $this->input->post('add_alamat');
        $biodata_responden['tanggal']           = date('Y-m-d');
        $biodata_responden['id_layanan']        = $this->input->post('add_id_layanan');
        $id_pertanyaan_harapan                  = $this->input->post('add_id_pertanyaan_harapan');
        $responden_harapan                      = $this->input->post('add_responden_harapan');
        $nilai_harapan                          = $this->input->post('add_nilai_harapan');
        $id_pertanyaan_persepsi                 = $this->input->post('add_id_pertanyaan_persepsi');
        $responden_persepsi                     = $this->input->post('add_responden_persepsi');
        $nilai_persepsi                         = $this->input->post('add_nilai_persepsi');

        // var_dump($biodata_responden);
        // die;
        $input_biodata_responden = $this->db->insert('biodata_responden',$biodata_responden);
        if ($input_biodata_responden == true) {
            for ($i = 0; $i < count($id_pertanyaan_harapan); $i++) {
            $data = array(
                'id_pertanyaan_harapan' => $id_pertanyaan_harapan[$i],
                'responden_harapan' => $responden_harapan[$i],
                'nilai_harapan' => $nilai_harapan[$i]
            );

            $this->tabel_responden_harapan->create($data); 
            }

        for ($i = 0; $i < count($id_pertanyaan_persepsi); $i++) {
            $data = array(
                'id_pertanyaan_persepsi' => $id_pertanyaan_persepsi[$i],
                'responden_persepsi' => $responden_persepsi[$i],
                'nilai_persepsi' => $nilai_persepsi[$i]
            );

            $this->tabel_responden_persepsi->create($data);
            }

        $this->session->set_flashdata('success', "Pengisian Kesioner Berhasil!");
        redirect('kuesioner');

        } else {
            $this->session->set_flashdata('error', "Pengisian Kesioner Gagal!");
            redirect('kuesioner');
        }

        

    }

}
