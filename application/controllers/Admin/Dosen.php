<?php

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
    }

    public function index()
    {
        $data['dosen'] = $this->Dosen_model->getAllData();
        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('admin/dosen', $data);
        $this->load->view('templates/footer');
    }

    public function tambahData()
    {
        $nip    = $this->input->post('nip');
        $nama   = $this->input->post('nama');
        $email  = $this->input->post('email');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nip'       => $nip,
            'nama'      => $nama,
            'email'     => $email,
            'alamat'    => $alamat,
        );

        $config['upload_path']       = './upload/dosen/';
        $config['allowed_types']     = 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
        $config['max_size']          = '6048'; // KB
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/dosen', $error);
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $data['gambar'] = $upload_data['uploads']['file_name'];


            $input = $this->Dosen_model->tambahDosen($data);
            if ($input) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambahkan</div>');
                redirect(base_url('dosen/list'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di Tambahkan</div>');
                redirect(base_url('dosen/list'));
            }
        }
    }
}
