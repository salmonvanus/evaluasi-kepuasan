<?php

class Data_basis_pengetahuan extends CI_Model
{

    private $table = "basis_pengetahuan";

    function daftar_basis_pengetahuan()
    {
        $this->db->join('penyakit', 'penyakit.id_penyakit = basis_pengetahuan.id_penyakit');
        $this->db->join('gejala', 'gejala.id_gejala = basis_pengetahuan.id_gejala');
        return $this->db->get($this->table)->result_array();
    }

    function ambil_basis_pengetahuan($id)
    {
        $this->db->where('id_basis_pengetahuan', $id);
        return $this->db->get($this->table)->row_array();
    }

    function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }

    function ubah($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function hapus($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }

    function show_aturan()
    {
        $hitung_penyakit    = $this->Data_penyakit->total_penyakit();

        $this->db->select('id_penyakit');
        $ambil_id_penyakit = $this->db->get('penyakit')->result_array();
        $id_penyakit = array_column($ambil_id_penyakit, 'id_penyakit');

        $i = 0;
        while ($i < $hitung_penyakit) {
            $this->db->select('gejala.nama_gejala');
            $this->db->select('penyakit.nama_penyakit');
            $this->db->from('basis_pengetahuan');
            $this->db->join('penyakit', 'penyakit.id_penyakit = basis_pengetahuan.id_penyakit');
            $this->db->join('gejala', 'gejala.id_gejala = basis_pengetahuan.id_gejala');
            $this->db->order_by('penyakit.nama_penyakit');
            $this->db->where('basis_pengetahuan.id_penyakit', $id_penyakit[$i]);
            $query = $this->db->get()->result_array();
            $t = array_column($query, 'nama_gejala');
            $d = array_column($query, 'nama_penyakit');
            echo "JIKA " . $t[0] . "<br />";
            for ($j = 1; $j < count($t); $j++) {
                echo "DAN: {$t[$j]} <br>";
            }
            echo "MAKA " . $d[$i] . "<br />";

            var_dump($query);

            $i++;
        }
    }
}
