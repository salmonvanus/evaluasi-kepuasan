<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->db->select('*');
        $this->db->from('pasien_konsultasi');
        $this->db->join('hasil_analisa_pasien', 'hasil_analisa_pasien.id_pasien=pasien_konsultasi.id_pasien', 'left');
        $this->db->where('hasil_analisa_pasien.id_pasien', NULL);
        $cek_hasil_pasien = $this->db->get()->result_array();

        foreach ($cek_hasil_pasien as $data) {
            $kode_pasien = $data['kode_pasien'];
            $this->db->where('kode_pasien', $kode_pasien);
            $this->db->delete('pasien_konsultasi');
        }

        $this->load->view('templates_landing/header');
        $this->load->view('user/index');
        $this->load->view('templates_landing/footer');
    }
}
