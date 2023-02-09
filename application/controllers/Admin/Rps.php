<?php

class Rps extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('Rps_model');
        if ($this->session->userdata('masuk') != true) {
            show_404();
        }
    }

    public function index()
    {
        $data['dosen'] = $this->Dosen_model->getAllData();
        $data['rps']   = $this->Rps_model->getData()->result();
        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('admin/rps', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $id_dosen = $this->input->post('id_dosen');

        $data = array(
            'id_dosen'  => $id_dosen,
        );

        $config['upload_path']          = './upload/rps';
        $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileRPS')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File Data Gagal Di Tambahkan</div>');
            redirect(base_url('admin/rps'));
        } else {
            $upload = array('uploads' => $this->upload->data());
            $data['fileRPS'] = $upload['uploads']['file_name'];

            $insert = $this->db->insert('rps', $data);
            if ($insert) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambahkan</div>');
                redirect(base_url('admin/rps'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di Tambahkan</div>');
                redirect(base_url('admin/rps'));
            }
        }
    }
}
