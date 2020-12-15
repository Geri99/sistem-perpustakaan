<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam_model extends CI_Model
{
    public function getPinjam()
    {
        $query = " SELECT `peminjam`.*, `buku`.`judul`,`kode_buku`
        FROM `peminjam` 
        JOIN `buku` 
        ON `peminjam`.`buku_id` = `buku`.`id` ";

        return $this->db->query($query)->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peminjam');
    }
}
