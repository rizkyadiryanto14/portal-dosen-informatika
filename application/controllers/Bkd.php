<?php

class Bkd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bkd_model');
    }
    public function index()
    {
        $data['bkd'] = $this->Bkd_model->getAllData();
        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('admin/bkd', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $nip    = $this->input->post('nip');
        $nama   = $this->input->post('nama');

        $config['upload_path']          = './upload/bkd/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/bkd', $error);
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $data = array(
                'file'      => $upload_data['uploads']['file_name'],
                'nip'       => $nip,
                'nama'      => $nama,
            );
            $insert = $this->Bkd_model->tambahData($data);
            if ($insert) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Di Tambahkan</div>');
                redirect(base_url('bkd'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di Tambahkan</div>');
                redirect(base_url('bkd'));
            }
        }
    }

    public function edit_data()
    {

        $nip    = $this->input->post('nip');
        $nama   = $this->input->post('nama');

        $config['upload_path']          = './upload/bkd/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/bkd', $error);
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $data = array(
                'file'      => $upload_data['uploads']['file_name'],
                'nip'       => $nip,
                'nama'      => $nama,
            );

            $update = $this->Bkd_model->editData($this->input->post('id'), $data);
            if ($update) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di ubah</div>');
                redirect(base_url('bkd'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di ubah</div>');
                redirect(base_url('bkd'));
            }
        }
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');
        $hapus = $this->Bkd_model->hapusData($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Di Hapus</div>');
            redirect(base_url('bkd'));
        }
    }
}
