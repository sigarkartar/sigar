<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');


        if ($this->session->userdata['status'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Anda Harus Login Dahulu</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
        $data['title'] = 'Home | PLN RUNGKUT SURABAYA';

        if ($this->input->post()) {
            $idpel = $this->input->post('idpel');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $keterangan = $this->input->post('keterangan');
            $pk = $this->input->post('pk');
            $tanggal = $this->input->post('tanggal');
            $biaya = $this->input->post('biaya');
            $file = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi, "./assets/img/" . $file);

            $tambah = array(
                'id_pelanggan' => $idpel,
                'nama' => $nama,
                'alamat' => $alamat,
                'keterangan' => $keterangan,
                'pk_geser_meter' => $pk,
                'tanggal_pembayaran' => $tanggal,
                'biaya' => $biaya,
                'dokumentasi' => $file,
            );
            $this->db->insert('data', $tambah);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diajukan</div>');
            redirect('user/index');
        } else {
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/user_footer');
        }
    }

    public function history()
    {
        $data['title'] = 'History | PLN RUNGKUT SURABAYA';
        $data['user'] = $this->db->get('data')->result_array();
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/history', $data);
        $this->load->view('templates/user_footer');
    }

    public function hapus_data()
    {
        $id = $this->input->get('id');
        $hapus = $this->db->get_where('data', ['id_data' => $id])->row_array();
        unlink("./assets/img/" . $hapus['dokumentasi']);

        $this->db->where('id_data', $id);
        $this->db->delete('data');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Telah Dihapus</div>');
        redirect('user/history');
    }

    public function ubah_data()
    {
        $data['title'] = 'Ubah Data | PLN RUNGKUT SURABAYA';

        $this->form_validation->set_rules('idpel', 'ID pelanggan', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/ubah_data', $data);
            $this->load->view('templates/user_footer');
        } else {
            $id = $this->input->post('id');
            $idpel = htmlspecialchars($this->input->post('idpel', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $alamat = $this->input->post('alamat');
            $keterangan = $this->input->post('keterangan');
            $pk = $this->input->post('pk');
            $tanggal = $this->input->post('tanggal');
            $biaya = $this->input->post('biaya');
            $query = $this->db->get_where('data', ['id_data' => $id])->row_array();

            $user = array(
                'id_pelanggan' => $idpel,
                'nama' => $nama,
                'alamat' => $alamat,
                'keterangan' => $keterangan,
                'pk_geser_meter' => $pk,
                'tanggal_pembayaran' => $tanggal,
                'biaya' => $biaya
            );

            $this->db->where('id_data', $id);
            $this->db->update('data', $user);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Telah Diupdate</div>');
            redirect('user/history');
        }
    }
}
