<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->model('m_admin');
    }

    public function index()
    {
        // forum
        $this->load->library('pagination');

        $total =  $this->db->count_all('forum');
        $config['base_url'] = 'http://localhost/sigar/user/index/';
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
        $data['forum'] = $this->db->get('forum', $config['per_page'], $data['start'])->result_array();
        // end forum

        // data pengaturan website
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO META
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;
        $data['pengurus'] = $this->m_data->get_pengurus();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_homepage', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function kontak()
    {
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO META
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;
        $data['pengurus'] = $this->m_data->get_pengurus();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/kontak', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function anggaran()
    {
        $data['anggaran'] = $this->m_admin->lihat_anggaran();

        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO META
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;
        $data['pengurus'] = $this->m_data->get_pengurus();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/anggaran', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function jadwal()
    {
        $data['jadwal'] = $this->db->get('jadwal')->result_array();

        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO META
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;
        $data['pengurus'] = $this->m_data->get_pengurus();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/jadwal', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function aspirasi()
    {
        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $aspirasi = $this->input->post('aspirasi');
            $date = $this->input->post('tanggal');

            $tambah = array(
                'nama' => $nama,
                'aspirasi' => $aspirasi,
                'tanggal' => $date
            );
            $this->db->insert('aspirasi', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Aspirasi Berhasil Dikirim</div>');
            redirect('user/aspirasi');
        } else {
            $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

            // SEO META
            $data['meta_keyword'] = $data['pengaturan']->nama;
            $data['meta_description'] = $data['pengaturan']->deskripsi;
            $data['pengurus'] = $this->m_data->get_pengurus();

            $this->load->view('frontend/v_header', $data);
            $this->load->view('frontend/aspirasi', $data);
            $this->load->view('frontend/v_footer', $data);
        }
    }

    public function tambah_forum()
    {
        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $pertanyaan = $this->input->post('pertanyaan');
            $date = $this->input->post('tanggal');

            $tambah = array(
                'nama' => $nama,
                'pertanyaan' => $pertanyaan,
                'tanggal' => $date
            );
            $this->db->insert('forum', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Pertanyaan Berhasil Dikirim ke Forum</div>');
            redirect('user/tambah_forum');
        } else {
            $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

            // SEO META
            $data['meta_keyword'] = $data['pengaturan']->nama;
            $data['meta_description'] = $data['pengaturan']->deskripsi;
            $data['pengurus'] = $this->m_data->get_pengurus();

            $this->load->view('frontend/v_header', $data);
            $this->load->view('frontend/tambah_forum', $data);
            $this->load->view('frontend/v_footer', $data);
        }
    }

    public function tambah_jawaban()
    {
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $jawaban = $this->input->post('jawaban');
            $date = $this->input->post('tanggal');

            $tambah = array(
                'id_forum' => $id,
                'nama_balasan' => $nama,
                'jawaban' => $jawaban,
                'tanggal' => $date
            );
            $this->db->insert('balasan', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Jawaban</div>');
            redirect('user');
        } else {
            $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

            // SEO META
            $data['meta_keyword'] = $data['pengaturan']->nama;
            $data['meta_description'] = $data['pengaturan']->deskripsi;
            $data['pengurus'] = $this->m_data->get_pengurus();

            $this->load->view('frontend/v_header', $data);
            $this->load->view('frontend/tambah_jawaban', $data);
            $this->load->view('frontend/v_footer', $data);
        }
    }

    public function jawaban()
    {
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO META
        $data['meta_keyword'] = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;
        $data['pengurus'] = $this->m_data->get_pengurus();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/jawaban', $data);
        $this->load->view('frontend/v_footer', $data);
    }
}
