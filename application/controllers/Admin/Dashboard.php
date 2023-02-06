<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');
    }
}
