<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Daftar Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Buku_model', 'buku');

        $data['buku'] = $this->buku->getBuku();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori_id', 'kategori', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Judul buku harus di isi '
        ]);
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', [
            'required' => 'Penulis buku jangan sampai kosong'
        ]);
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required', [
            'required' => 'Penerbit buku jangan sampai kosong'
        ]);
        $this->form_validation->set_rules('kode_buku', 'Kode buku', 'required', [
            'required' => 'Kode buku klik tombol Generate Kode'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[4]', [
            'max_length' => 'Tahun Buku Kepanjangan !',
            'required' => 'Tahun terbit buku jangan sampai kosong !'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok buku jangan sampai kosong !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori_id' => $this->input->post('kategori_id'),
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'kode_buku' => $this->input->post('kode_buku'),
                'tahun' => $this->input->post('tahun'),
                'stok' => $this->input->post('stok')
            ];

            $this->db->insert('buku', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Daftar Buku telah di tambahkan </div> ');
            redirect('buku');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Daftar Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Buku_model', 'buku');

        $data['buku'] = $this->buku->getBukuByid($id);
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori_id', 'kategori', 'required');

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Judul buku harus di isi '
        ]);
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', [
            'required' => 'Penulis buku jangan sampai kosong'
        ]);
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required', [
            'required' => 'Penerbit buku jangan sampai kosong'
        ]);
        $this->form_validation->set_rules('kode_buku', 'Kode buku', 'required', [
            'required' => 'Kode buku klik tombol Generate Kode'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[4]', [
            'max_length' => 'Tahun Buku Kepanjangan !',
            'required' => 'Tahun terbit buku jangan sampai kosong !'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required', [
            'required' => 'Stok buku jangan sampai kosong !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->buku->ubahBuku($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Buku ini telah di edit ! </div> ');
            redirect('buku');
        }
    }

    public function delete($id)
    {
        $this->load->model('Buku_model', 'buku');

        $this->buku->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Buku berhasil di delete </div> ');
        redirect('buku');
    }




    public function kategori()
    {
        $data['title'] = 'Kategori Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('kategori', ['nama' => $this->input->post('nama')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kategori Buku baru ditambahkan ! </div> ');
            redirect('buku/kategori');
        }
    }

    public function editKategori($id) {
        $data['title'] = 'Edit Kategori Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Buku_model', 'buku');

        $data['kategori'] = $this->buku->getKategoriByid($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/editkategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->buku->ubahKategori($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kategori Buku baru saja di edit ! </div> ');
            redirect('buku/kategori');
        }
    }

    public function deleteKategori($id)
    {
        $this->load->model('Buku_model', 'buku');

        $this->buku->deleteKategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Buku berhasil di delete </div> ');
        redirect('buku/kategori');
    }
}
