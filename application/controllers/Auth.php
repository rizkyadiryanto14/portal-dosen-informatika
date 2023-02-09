<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $title = array(
                'title'     => 'Login | Portal Akademik'
            );
            $this->load->view('auth/templates/head', $title);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role'  => $user['role_id']
                ];
                $this->session->set_userdata('masuk', $data, TRUE);
                if ($user['role_id'] == '1') {
                    redirect(base_url('admin/dashboard'));
                } elseif ($user['role_id'] == '2') {
                    redirect(base_url('dosen/dashboard'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Atau Password Salah</div>');
                redirect(base_url('auth'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
            redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }

    public function Register()
    {
        $nama       = $this->input->post('nama');
        $nidn       = $this->input->post('nidn');
        $password   = $this->input->post('password');
        $password2  = $this->input->post('password2');

        if ($password != $password2) {
            $this->session->set_flashdata('message', 'password dan konfirmasi password tidak sama');
            redirect('auth');
        } else {
            $data = array(
                'nama'      => $nama,
                'nidn'      => $nidn,
                'password'  => $password
            );

            $insertData = $this->db->insert('users', $data);
            if ($insertData) {
                $this->session->set_flashdata('message', 'Registrasi Berhasil');
                redirect(base_url('auth'));
            } else {
                $this->session->set_flashdata('message', 'Gagal Registrasi');
                redirect(base_url('auth'));
            }
        }
    }
}
