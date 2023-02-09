<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        if ($this->session->userdata('masuk') != true) {
            show_404();
        }
    }
    public function index()
    {
        $data['dashboard'] = $this->Dashboard_model->CountDosen();
        // var_dump($data);
        // die();
        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
