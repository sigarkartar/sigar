<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin', 'admin');

        if ($this->session->userdata['status'] != "login") {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Anda Harus Login Dahulu</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $id = $this->session->userdata['id_user'];
        $data['user'] = $this->admin->get_user($id);
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $id = $this->session->userdata['id_user'];
        $data['user'] = $this->admin->get_user($id);
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function setting()
    {
        $id = $this->session->userdata['id_user'];
        $data['user'] = $this->admin->get_user($id);
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/setting', $data);
            $this->load->view('templates/footer');
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $nama = htmlspecialchars($this->input->post('nama', true));

            $user = array(
                'username' => $username,
                'nama' => $nama
            );
            $id = $data['user']['id_user'];
            $this->admin->setting($id, $user);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Telah Diupdate</div>');
            redirect('admin/setting');
        }
    }

    public function user()
    {
        if ($this->session->userdata['role_id'] == 1) {
            $data['user'] = $this->admin->get_user_role();
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf Anda Tidak Punya Akses Untuk Masuk Ke Menu User!</div>');
            redirect('admin');
        }
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_user()
    {
        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $role_id = $this->input->post('role_id');
            $result = $this->db->get_where('user', ['username' => $username])->row_array();
            if (!$result) {
                if ($password1 == $password2) {
                    $tambah = array(
                        'nama' => $nama,
                        'username' => $username,
                        'role_id' => $role_id,
                        'password' => md5($password2),
                        'image' => "default_zyuper.png"
                    );
                    $this->admin->tambah_user($tambah);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    User Berhasil Ditambahkan</div>');
                    redirect('admin/user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Konfirmasi Password Tidak Sama</div>');
                    redirect('admin/tambah_user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username Sudah Terdaftar</div>');
                redirect('admin/tambah_user');
            }
        } else {
            $data['title'] = 'Admin | KARANG TARUNA';
            $data['url'] = current_url();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus_user()
    {
        $id = $this->input->get('id');
        $this->admin->hapus_user($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User Telah Dihapus</div>');
        redirect('admin/user');
    }

    public function ubah_data_user()
    {
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_data_user', $data);
            $this->load->view('templates/footer');
        } else {
            //berhasil update
            $id = $this->input->post('id');
            $username = htmlspecialchars($this->input->post('username', true));
            $nama = $this->input->post('nama');
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            // cek lanjutan
            if ($password1 == $password2) {
                // berhasil
                $user = array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => md5($password2)
                );
                $this->admin->ubah_user($id, $user);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil Diganti</div>');
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Konfirmasi Password Salah</div>');
                redirect('admin/user');
            }
        }
    }

    public function password()
    {
        $id = $this->session->userdata['id_user'];
        $data['user'] = $this->admin->get_user($id);
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/password', $data);
            $this->load->view('templates/footer');
        } else {
            // berhasil
            $passwordlama = md5($this->input->post('passwordlama', true));
            $password1 = md5($this->input->post('password1', true));
            $password2 = md5($this->input->post('password2', true));
            // password lama sama
            if ($passwordlama == $data['user']['password']) {
                // cek lanjutan
                if ($password1 == $password2) {
                    // berhasil
                    $user = array(
                        'password' => $password2
                    );
                    $id = $data['user']['id_user'];
                    $this->admin->ganti_password($id, $user);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil Diganti</div>');
                    redirect('admin/password');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Baru Tidak Sama</div>');
                    redirect('admin/password');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Lama Salah</div>');
                redirect('admin/password');
            }
        }
    }

    public function aspirasi()
    {
        $this->load->library('pagination');

        $total =  $this->db->count_all('aspirasi');
        $config['base_url'] = 'http://localhost/sigar/admin/aspirasi';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $data['start'] = $this->uri->segment(3);

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        $per_page = $config['per_page'];
        $start = $data['start'];
        $data['user'] = $this->admin->get_aspirasi($per_page, $start);
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/aspirasi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aspirasi()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_aspirasi', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = htmlspecialchars($this->input->post('nama', true));
            $aspirasi = $this->input->post('aspirasi');

            $tambah = array(
                'nama' => $nama,
                'aspirasi' => $aspirasi
            );
            $this->admin->tambah_aspirasi($tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Aspirasi Berhasil Ditambahkan</div>');
            redirect('admin/aspirasi');
        }
    }

    public function ubah_aspirasi()
    {
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_aspirasi', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama = htmlspecialchars($this->input->post('nama', true));
            $aspirasi = $this->input->post('aspirasi');

            $user = array(
                'nama' => $nama,
                'aspirasi' => $aspirasi
            );

            $this->admin->ubah_asprasi($id, $user);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Aspirasi Telah Diupdate</div>');
            redirect('admin/aspirasi');
        }
    }

    public function hapus_aspirasi()
    {
        $id = $this->input->get('id');

        $this->admin->hapus_aspirasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Aspirasi Telah Dihapus</div>');
        redirect('admin/aspirasi');
    }

    // public function search_data()
    // {
    //     $data['title'] = 'Admin | PLN RUNGKUT SURABAYA';
    //     $data['url'] = current_url();

    //     $this->form_validation->set_rules('search', 'Search', 'trim|required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('admin/index', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $search = htmlspecialchars($this->input->post('search', true));
    //         $data['search'] = $this->db->get_where('data', ['id_pelanggan' => $search])->result_array();
    //         if ($data['search']) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             $this->load->view('admin/search_data', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    //             Data Yang Dicari Tidak Ada</div>');
    //             redirect('admin/data');
    //         }
    //     }
    // }

    public function anggaran()
    {
        if ($this->session->userdata['role_id'] != 1 && $this->session->userdata['role_id'] != 3) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf Anda Tidak Punya Akses Untuk Masuk Ke Menu Anggaran!</div>');
            redirect('admin');
        }
        $this->load->library('pagination');

        $total =  $this->db->count_all('anggaran');
        $config['base_url'] = 'http://localhost/sigar/admin/anggaran';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $data['start'] = $this->uri->segment(3);

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        $per_page = $config['per_page'];
        $start = $data['start'];
        $data['user'] = $this->admin->get_anggaran($per_page, $start);
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anggaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_anggaran()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $tanggal = $this->input->post('tanggal');
            $jenis = $this->input->post('jenis');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('keterangan');

            $tambah = array(
                'tanggal_anggaran' => $tanggal,
                'jenis_anggaran' => $jenis,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan
            );
            $this->db->insert('anggaran', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Anggaran Berhasil Ditambahkan</div>');
            redirect('admin/anggaran');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_anggaran', $data);
            $this->load->view('templates/footer');
        }
    }

    public function ubah_anggaran()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $id = $this->input->post('id');
            $tanggal = $this->input->post('tanggal');
            $jenis = $this->input->post('jenis');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('keterangan');

            $update = array(
                'tanggal_anggaran' => $tanggal,
                'jenis_anggaran' => $jenis,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan
            );
            $this->admin->ubah_anggaran($id, $update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Anggaran Berhasil Diubah</div>');
            redirect('admin/anggaran');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_anggaran', $data);
            $this->load->view('templates/footer');
        }
    }

    public function lihat_anggaran()
    {
        $data['user'] = $this->admin->lihat_anggaran();
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat_anggaran', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_anggaran()
    {
        $id = $this->input->get('id');
        $row = $this->db->get_where('anggaran', ['id_anggaran' => $id])->row_array();

        $this->db->where('id_anggaran', $id);
        $this->db->delete('anggaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anggaran Telah Dihapus</div>');
        redirect('admin/anggaran');
    }

    public function jadwal()
    {
        if ($this->session->userdata['role_id'] != 1 && $this->session->userdata['role_id'] != 2) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf Anda Tidak Punya Akses Untuk Masuk Ke Menu Jadwal!</div>');
            redirect('admin');
        }
        $this->load->library('pagination');

        $total =  $this->db->count_all('jadwal');
        $config['base_url'] = 'http://localhost/sigar/admin/jadwal';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $data['start'] = $this->uri->segment(3);

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        $data['user'] = $this->db->get('jadwal', $config['per_page'], $data['start'])->result_array();
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jadwal()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $deskripsi = $this->input->post('deskripsi');

            $tambah = array(
                'nama_jadwal' => $nama,
                'tanggal_jadwal' => $tanggal,
                'deskripsi' => $deskripsi
            );
            $this->db->insert('jadwal', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jadwal Berhasil Ditambahkan</div>');
            redirect('admin/jadwal');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_jadwal', $data);
            $this->load->view('templates/footer');
        }
    }

    public function ubah_jadwal()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $deskripsi = $this->input->post('deskripsi');

            $tambah = array(
                'nama_jadwal' => $nama,
                'tanggal_jadwal' => $tanggal,
                'deskripsi' => $deskripsi
            );
            $this->db->where('id_jadwal', $id);
            $this->db->update('jadwal', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jadwal Berhasil Diubah</div>');
            redirect('admin/jadwal');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_jadwal', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus_jadwal()
    {
        $id = $this->input->get('id');
        $row = $this->db->get_where('jadwal', ['id_jadwal' => $id])->row_array();

        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jadwal Telah Dihapus</div>');
        redirect('admin/jadwal');
    }

    public function forum()
    {
        $this->load->library('pagination');

        $total =  $this->db->count_all('forum');
        $config['base_url'] = 'http://localhost/sigar/admin/forum';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $data['start'] = $this->uri->segment(3);

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        $data['user'] = $this->db->get('forum', $config['per_page'], $data['start'])->result_array();
        $data['title'] = 'Admin | KARANG TARUNA';
        $data['url'] = current_url();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/forum', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_forum()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $pertanyaan = $this->input->post('pertanyaan');

            $tambah = array(
                'nama' => $nama,
                'pertanyaan' => $pertanyaan
            );
            $this->db->insert('forum', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Forum Berhasil Ditambahkan</div>');
            redirect('admin/forum');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_forum', $data);
            $this->load->view('templates/footer');
        }
    }

    public function ubah_forum()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $pertanyaan = $this->input->post('pertanyaan');

            $tambah = array(
                'nama' => $nama,
                'pertanyaan' => $pertanyaan
            );
            $this->db->where('id_forum', $id);
            $this->db->update('forum', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Forum Berhasil Diubah</div>');
            redirect('admin/forum');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_forum', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus_forum()
    {
        $id = $this->input->get('id');

        $this->db->where('id_forum', $id);
        $this->db->delete('forum');

        $this->db->where('id_forum', $id);
        $this->db->delete('balasan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Forum Telah Dihapus</div>');
        redirect('admin/forum');
    }

    public function jawaban()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';
        $id = $this->input->get('id');
        $data['id'] = $this->db->get_where('forum', ['id_forum' => $id])->row_array();
        $data['jawaban'] = $this->db->query("SELECT * FROM forum JOIN balasan ON balasan.id_forum=forum.id_forum WHERE forum.id_forum=$id")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jawaban', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jawaban()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $jawaban = $this->input->post('jawaban');

            $tambah = array(
                'id_forum' => $id,
                'nama_balasan' => $nama,
                'jawaban' => $jawaban
            );
            $this->db->insert('balasan', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jawaban Berhasil Ditambahkan</div>');
            redirect('admin/forum');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_jawaban', $data);
            $this->load->view('templates/footer');
        }
    }

    public function ubah_jawaban()
    {
        $data['url'] = current_url();
        $data['title'] = 'Admin | Karang Taruna';

        if ($this->input->post()) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $jawaban = $this->input->post('jawaban');

            $tambah = array(
                'nama_balasan' => $nama,
                'jawaban' => $jawaban
            );
            $this->db->where('id_balasan', $id);
            $this->db->update('balasan', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jawaban Berhasil Diubah</div>');
            redirect('admin/forum');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah_jawaban', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus_jawaban()
    {
        $id = $this->input->get('id');

        $this->db->where('id_balasan', $id);
        $this->db->delete('balasan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jawaban Telah Dihapus</div>');
        redirect('admin/forum');
    }

    public function current_url()
    {
        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $validurl = str_replace("&", "amp", $url);

        return $validurl;
    }
}
