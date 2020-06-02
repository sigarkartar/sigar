<?php

/**
 * 
 */
class M_admin extends CI_Model
{
    public function get_user($id)
    {
        $result = $this->db->get_where('user', ['id_user' => $id]);

        return $result->row_array();
    }

    public function get_user_role()
    {
        $result = $this->db->query("SELECT * FROM user WHERE role_id > 1");

        return $result->result_array();
    }

    public function tambah_user($tambah)
    {
        $this->db->insert('user', $tambah);

        return $this->db->affected_rows();
    }

    public function ubah_user($id, $user)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $user);

        return $this->db->affected_rows();
    }

    public function hapus_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');

        return $this->db->affected_rows();
    }

    public function setting($id, $user)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $user);

        return $this->db->affected_rows();
    }

    public function ganti_password($id, $user)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $user);

        return $this->db->affected_rows();
    }

    public function get_aspirasi($per_page, $start)
    {
        $result = $this->db->get('aspirasi', $per_page, $start);

        return $result->result_array();
    }

    public function tambah_aspirasi($tambah)
    {
        $this->db->insert('aspirasi', $tambah);

        return $this->db->affected_rows();
    }

    public function ubah_asprasi($id, $user)
    {
        $this->db->where('id_aspirasi', $id);
        $this->db->update('aspirasi', $user);

        return $this->db->affected_rows();
    }

    public function hapus_aspirasi($id)
    {
        $this->db->where('id_aspirasi', $id);
        $this->db->delete('aspirasi');

        return $this->db->affected_rows();
    }

    public function get_anggaran($per_page, $start)
    {
        $result = $this->db->get('anggaran', $per_page, $start);

        return $result->result_array();
    }

    public function tambah_anggaran($tambah)
    {
        $this->db->insert('anggaran', $tambah);

        return $this->db->affected_rows();
    }

    public function ubah_anggaran($id, $update)
    {
        $this->db->where('id_anggaran', $id);
        $this->db->update('anggaran', $update);

        return $this->db->affected_rows();
    }

    public function lihat_anggaran()
    {
        $result = $this->db->query("SELECT * FROM anggaran ORDER BY tanggal_anggaran ASC");

        return $result->result_array();
    }

    public function hapus_anggaran($id)
    {
        $this->db->where('id_anggaran', $id);
        $this->db->delete('anggaran');

        return $this->db->affected_rows();
    }
}
