<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth', 'auth');
    }

    public function index()
    {
        if ($this->input->post()) {
            $this->login();
        } else {
            $data['title'] = 'Login | KARANG TARUNA';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->auth->get_user($username);

        if ($user) {
            //cek password
            if ($password == $user['password']) {
                // password benar
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'password' => $user['password'],
                    'status' => "login"
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username Salah</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Logout Berhasil</div>');
        redirect('auth');
    }
}
