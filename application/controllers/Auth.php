<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login | SIGAR';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // sukses login
            $this->login();
        }
    }

    private function login()
    {
        $email = htmlspecialchars($this->input->post('username', true));
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('user', ['username' => $email])->row_array();

        if ($user) {
            //cek password
            if ($password == $user['password']) {
                // password benar
                $data = [
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
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Logout Berhasil</div>');
        redirect('auth');
    }
}
