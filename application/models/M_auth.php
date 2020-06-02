<?php

/**
 * 
 */
class M_auth extends CI_Model
{
    public function get_user($username)
    {
        $result = $this->db->get_where('user', ['username' => $username]);

        return $result->row_array();
    }
}
