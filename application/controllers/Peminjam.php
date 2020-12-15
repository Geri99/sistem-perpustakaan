<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Transaksi Pinjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Pinjam_model', 'pinjam');

        $data['pinjam'] = $this->pinjam->getPinjam();
        $data['buku'] = $this->db->get('buku')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|max_length[8]|min_length[8]', [
            'min_length' => 'minimal 8 Digit',
            'max_length' => 'maksimal 8 Digit'
        ]);
        $this->form_validation->set_rules('buku_id', 'Buku', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|max_length[12]|min_length[10]', [
            'min_length' => 'Harap isi No Handphone dengan minimal 11 karakter',
            'max_length' => 'Maaf jangan melebihi batas Karakter !!!'
        ]);
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal peminjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal peminjam', 'required');
        $this->form_validation->set_rules('status', 'Dipinjam', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peminjam/index', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'buku_id' => $this->input->post('buku_id'),
                'no_hp' => $this->input->post('no_hp'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => $this->input->post('status')
            ];

            $this->db->insert('peminjam', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Peminjam sudah di tambahkan ! Jangan lupa di kembalikan !!! </div> ');
            redirect('peminjam');

        }
    }

    public function kembali($id_trx) {
        if($id_trx){
            $data = [
                'tanggal_kembali' => date('Y-m-d H:i:s'),
                'status' => 'Kembali'
            ];

            $this->db->where('id' ,$id_trx);
            $this->db->update('peminjam', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Buku yanng di pinjam sudah di kembalikan !! Terimakasih. </div> ');
            redirect('peminjam');

        }
    }

    public function delete($id){
        $this->load->model('pinjam_model', 'pinjam');

        $this->pinjam->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Peminjam Berhasil di delete </div> ');
        redirect('peminjam');
    }
}
