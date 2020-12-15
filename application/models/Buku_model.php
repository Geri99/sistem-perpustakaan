<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{

    public function getBuku()
    {
        $query = " SELECT `buku`.*, `kategori`.`nama` 
        FROM `buku` 
        JOIN `kategori` 
        ON `buku`.`kategori_id` = `kategori`.`id` ";

        return $this->db->query($query)->result_array();
    }

    public function getBukuByid($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }

    public function ubahBuku($id)
    {
        $data = [
            "kategori_id" => $this->input->post('kategori_id'),
            "judul" => $this->input->post('judul'),
            "penulis" => $this->input->post('penulis'),
            "penerbit" => $this->input->post('penerbit'),
            "kode_buku" => $this->input->post('kode_buku'),
            "tahun" => $this->input->post('tahun'),
            "stok" => $this->input->post('stok')
        ];

        $this->db->where('id', $id);
        $this->db->update('buku', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('buku');
    }

    public function getKategoriByid($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function ubahKategori($id) {
        $data = [
            'nama' => $this->input->post('nama')
        ];

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    public function deleteKategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
    }

    
}
