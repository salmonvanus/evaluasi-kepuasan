<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_gejala');
        $this->load->model('Data_pasien_konsultasi');
        $this->load->model('Data_gejala_pasien');
        $this->load->model('Data_penyakit');

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/side_bar');
        $this->load->view('user/konsultasi');
        $this->load->view('templates_user/footer');
    }

    // fungsi untuk tambah pasien
    public function add_pasien()
    {
        $this->form_validation->set_rules('add_nama_pasien', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('add_jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Pilih jenis kelamin'
        ]);
        $this->form_validation->set_rules('add_alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('add_no_telp', 'Nomor Telepon', 'required|trim', [
            'required' => 'No Telp tidak boleh kosong'
        ]);

        //jika data pasien yang dimasukkan tidak valid
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/side_bar');
            $this->load->view('user/konsultasi');
            $this->load->view('templates_user/footer');
        }
        // jika data pasien yang di masukkan valid, insert ke database
        else {
            $created_date = date("Y-m-d H:i:s");
            $random_int = rand();
            $data = [
                'kode_pasien'        => $random_int,
                'nama_pasien'        => $this->input->post('add_nama_pasien'),
                'jenis_kelamin'      => $this->input->post('add_jenis_kelamin'),
                'alamat'             => $this->input->post('add_alamat'),
                'no_telp'            => $this->input->post('add_no_telp'),
                'tanggal_konsultasi' => $created_date
            ];
            $insert = $this->db->insert('pasien_konsultasi', $data);
            if ($insert) {
                $this->session->set_flashdata('message', "<script> 
                swal({
                title: 'Sukses!',
                text : 'Data yang anda masukkan berhasil disimpan!',
                type: 'success'
                });
                </script>");
                redirect('Konsultasi/pertanyaan/' . $random_int);
            }
        }
    }

    //fungsi untuk menampilkan pertanyaan
    public function pertanyaan($kode_pasien)
    {
        $data['hitung_gejala']  = $this->db->count_all('gejala');
        $data['gejala']         = $this->db->get('gejala')->result_array();
        $data['gejala_2']       = $this->db->get('gejala')->result_array();
        $data['kode_pasien']    = $kode_pasien;

        $this->load->view('templates_user/header');
        $this->load->view('templates_user/side_bar');
        $this->load->view('user/pertanyaan', $data);
        $this->load->view('templates_user/footer');
    }

    public function show_hasil_konsultasi()
    {
        $data['id_gejala']      = $this->input->post('add_id_gejala');
        $data['cf_user']        = $this->input->post('add_bobot_nilai');
        $data['id_pasien']      = $this->input->post('add_id_pasien');
        $kode_pasien            = $this->input->post('add_kode_pasien');
        $data['gejala']         = $this->Data_gejala->daftar_gejala();
        $data['count_gejala']   = count($data['gejala']);
        $id_pasien              = $this->input->post('add_id_pasien');
        $data['pasien']         = $this->Data_pasien_konsultasi->ambil_pasien_by_id($id_pasien);
        $data['cek_pasien']             = $this->db->get_where('gejala_pasien', ['id_pasien' => $id_pasien])->result_array();
        $data['cek_hasil_pasien']       = $this->db->get_where('hasil_analisa_pasien', ['id_pasien' => $id_pasien])->result_array();

        // var_dump($data['cf_user']);
        $count = array_count_values($data['cf_user']);
        if ($count[0] == 15) {
            $this->session->set_flashdata('error_empty', "<script> 
                swal({
                title: 'Maaf!',
                text : 'Minimal Pilih 3 Data!',
                type: 'warning'
                });
                </script>");

            redirect('Konsultasi/pertanyaan/' . $kode_pasien);
        }
        if ($count[0] == 14) {
            $this->session->set_flashdata('error_empty', "<script> 
                swal({
                title: 'Maaf!',
                text : 'Minimal Pilih 3 Data!',
                type: 'warning'
                });
                </script>");

            redirect('Konsultasi/pertanyaan/' . $kode_pasien);
        }
        if ($count[0] == 13) {
            $this->session->set_flashdata('error_empty', "<script> 
                swal({
                title: 'Maaf!',
                text : 'Minimal Pilih 3 Data!',
                type: 'warning'
                });
                </script>");

            redirect('Konsultasi/pertanyaan/' . $kode_pasien);
        } else {
            if (count($data['cek_pasien']) > 1) {
                $this->db->where('id_pasien', $id_pasien);
                $this->db->from('gejala_pasien');
                $this->db->delete();
            }
            if (count($data['cek_hasil_pasien']) > 1) {
                $this->db->where('id_pasien', $id_pasien);
                $this->db->from('hasil_analisa_pasien');
                $this->db->delete();
            }
        }
        // print_r(
        //     $count[0]
        // );
        // die;

        /////////////////////////////////////////////////////

        // if (count($data['cek_pasien']) > 1) {
        //     $this->db->where('id_pasien', $id_pasien);
        //     $this->db->from('gejala_pasien');
        //     $this->db->delete();
        // }
        // if (count($data['cek_hasil_pasien']) > 1) {
        //     $this->db->where('id_pasien', $id_pasien);
        //     $this->db->from('hasil_analisa_pasien');
        //     $this->db->delete();
        // }

        $this->load->view('templates_user/header');
        $this->load->view('templates_user/side_bar');
        $this->load->view('user/hasil_konsultasi', $data);
        $this->load->view('templates_user/footer');
    }

    // perhitungan metode forward chaining dan metode certain factor
    public function perhitungan()
    {
        $id_gejala = $this->input->post('add_id_gejala');
        $cf_user   = $this->input->post('add_bobot_nilai');
        $id_pasien = $this->input->post('add_id_pasien');

        $cek_pasien = $this->db->get_where('gejala_pasien', ['id_pasien' => $id_pasien])->result_array();
        $cek_hasil_pasien = $this->db->get_where('hasil_analisa_pasien', ['id_pasien' => $id_pasien])->result_array();
        if (count($cek_pasien) > 1) {
            $this->db->where('id_pasien', $id_pasien);
            $this->db->from('gejala_pasien');
            $this->db->delete();
        }

        if (count($cek_hasil_pasien) > 1) {
            $this->db->where('id_pasien', $id_pasien);
            $this->db->from('hasil_analisa_pasien');
            $this->db->delete();
        }

        for ($i = 0; $i < count($id_gejala); $i++) {
            if ($cf_user[$i] != 0) {
                $this->db->select('id_basis_pengetahuan');
                $this->db->select('id_penyakit');
                $this->db->select('id_gejala');
                $this->db->select('cf_pakar_basis_pengetahuan');
                $this->db->from('basis_pengetahuan');
                $this->db->where('id_gejala', $id_gejala[$i]);
                $q = $this->db->get()->result_array();

                $cf_pakar = array_column($q, 'cf_pakar_basis_pengetahuan');

                foreach ($q as $key) {
                    $cf_gejala[$i] = $cf_pakar[0] * $cf_user[$i];
                    $data['id_pasien']      = $id_pasien;
                    $data['id_gejala']      = $id_gejala[$i];
                    $data['id_penyakit']    = $key['id_penyakit'];
                    $data['cf_pakar']       = $cf_pakar[0];
                    $data['cf_user']        = $cf_user[$i];
                    $data['cf_gejala']      = $cf_gejala[$i];

                    $insert = $this->Data_gejala_pasien->insert($data);
                }
            }
        }

        $this->db->select('*');
        $this->db->from('gejala_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=gejala_pasien.id_penyakit');
        $this->db->where('gejala_pasien.id_pasien', $id_pasien);
        $show_gp = $this->db->get()->result_array();

        var_dump($show_gp);
        $id_penyakit    = array_column($show_gp, 'id_penyakit');

        $total_penyakit    = $this->Data_penyakit->daftar_penyakit();

        for ($l = 0; $l < count($total_penyakit); $l++) {
            $this->db->select('*');
            $this->db->from('gejala_pasien');
            $this->db->join('penyakit', 'penyakit.id_penyakit=gejala_pasien.id_penyakit');
            $this->db->where('penyakit.id_penyakit', $id_penyakit[$l]);
            $this->db->where('gejala_pasien.id_pasien', $id_pasien);
            $result = $this->db->get()->result_array();

            $cf_gejala      = array_column($result, 'cf_gejala');
            $nama_penyakit  = array_column($result, 'nama_penyakit');

            $cf_1_2 = $cf_gejala[0] + $cf_gejala[1] * (1 - $cf_gejala[0]);

            $g = 2;
            $cf_old[$g] = $cf_1_2;

            for ($v = 2; $v < count($result); $v++) {

                $cf_old[$g] = $cf_old[$g] + $cf_gejala[$v] * (1 - $cf_old[$g]);

                if ($v == (count($result) - 1)) {
                    $datax['id_pasien']     = $id_pasien;
                    $datax['id_penyakit']   = $id_penyakit[$l];
                    $datax['hasil_analisa'] = $cf_old[$g];
                    $hasil = $cf_old[$g] * 100;
                    $hasil_analisa = round($hasil, 4);
                    $datax['kepercayaan_cf'] = $hasil_analisa;
                    $insert_data = $this->db->insert('hasil_analisa_pasien', $datax);
                }
            }
        }
        $this->db->select('*');
        $this->db->from('hasil_analisa_pasien');
        $this->db->order_by('hasil_analisa_pasien.kepercayaan_cf', 'DESC');
        // $this->db->order_by('hasil_analisa_pasien.kepercayaan_cf', 'DESC');
        $this->db->join('penyakit', 'penyakit.id_penyakit = hasil_analisa_pasien.id_penyakit');
        $this->db->where('hasil_analisa_pasien.id_pasien', $id_pasien);
        $show_hasil_analisa = $this->db->get()->result_array();
        $max = max($show_hasil_analisa);
        $norut = 1;
        foreach ($show_hasil_analisa as $baris) {
            echo "<tr>";
            echo "<td>" . $norut++ . "</td>" . "<br />";
            echo "<td>" . $baris['nama_penyakit'] . "<br/>";
            echo "<td>" . $baris['kepercayaan_cf'];
            echo "</tr>";
        }
        echo "Penyakit yang dialami pasien adalah : " . "<b>" . $max['nama_penyakit'] . "</b>";
        echo "<hr />";
        echo "<br />";
    }
}
