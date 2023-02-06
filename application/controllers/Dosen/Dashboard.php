<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('dosen/templates/head');
        $this->load->view('dosen/templates/sidebar');
        $this->load->view('dosen/templates/navbar');
        $this->load->view('dosen/dashboard');
        $this->load->view('dosen/templates/footer');
    }
}
