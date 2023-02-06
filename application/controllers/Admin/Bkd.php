<?php

class Bkd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bkd_model');
        $this->load->model('Dosen_model');
    }

    public function index()
    {

        $data['bkd'] = $this->Bkd_model->getAllData()->result_array();
        $data['dosen'] = $this->Dosen_model->getAllData();

        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('admin/bkd', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $config['upload_path']          = './upload/bkd/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|svg|pdf|docx|doc|rtf|txt';
        $this->load->library('upload', $config);

        if (!empty($_FILES['bukti_pendidikan'])) {
            $this->upload->do_upload('bukti_pendidikan');
            $bukti_pendidikan = $this->upload->data();
            $file_bukti_pendidikan = $bukti_pendidikan['file_name'];
        }

        if (!empty($_FILES['bukti_penelitian'])) {
            $this->upload->do_upload('bukti_penelitian');
            $bukti_penelitian = $this->upload->data();
            $file_bukti_penelitian = $bukti_penelitian['file_name'];
        }

        if (!empty($_FILES['bukti_pengabdian'])) {
            $this->upload->do_upload('bukti_pengabdian');
            $bukti_pengabdian = $this->upload->data();
            $file_bukti_pengabdian = $bukti_pengabdian['file_name'];
        }


        if (!empty($_FILES['penunjang'])) {
            $this->upload->do_upload('penunjang');
            $penunjang = $this->upload->data();
            $file_penunjang = $penunjang['file_name'];
        }


        if (!empty($_FILES['print_sister'])) {
            $this->upload->do_upload('print_sister');
            $print_sister = $this->upload->data();
            $file_print_sister = $print_sister['file_name'];
        }

        $id_dosen           = $this->input->post('id_dosen');
        $tahun_ajaran       = $this->input->post('tahun_ajaran');
        $semester           = $this->input->post('semester');

        $data = array(
            'id_dosen'          => $id_dosen,
            'tahun_ajaran'      => $tahun_ajaran,
            'semester'          => $semester,
            'bukti_pendidikan'  => $file_bukti_pendidikan,
            'bukti_pengabdian'  => $file_bukti_pengabdian,
            'bukti_penelitian'  => $file_bukti_penelitian,
            'penunjang'         => $file_penunjang,
            'print_sister'      => $file_print_sister
        );

        // var_dump($data);
        // die();

        $insert = $this->Bkd_model->tambahData($data);
        if ($insert) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambahkan</div>');
            redirect(base_url('admin/bkd'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di Tambahkan</div>');
            redirect(base_url('admin/bkd'));
        }


        // if (!$this->upload->do_upload('bukti_pendidikan') and !$this->upload->do_upload('bukti_pengabdian')) {
        //     $error = array('error' => $this->upload->display_errors());

        //     $this->load->view('admin/bkd', $error);
        // } else {
        //     $upload_data = array('uploads' => $this->upload->data());

        //     $data['bukti_pendidikan'] = $upload_data['uploads']['file_name'];



        //     var_dump($data);
        //     die();
        //     $insert = $this->Bkd_model->tambahData($data);

        //     if ($insert) {
        //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambahkan</div>');
        //         redirect(base_url('admin/bkd'));
        //     } else {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di Tambahkan</div>');
        //         redirect(base_url('admin/bkd'));
        //     }
        // }
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
                redirect(base_url('admin/bkd'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Di ubah</div>');
                redirect(base_url('admin/bkd'));
            }
        }
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');
        $hapus = $this->Bkd_model->hapusData($id);
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
            redirect(base_url('admin/bkd'));
        }
    }
}
