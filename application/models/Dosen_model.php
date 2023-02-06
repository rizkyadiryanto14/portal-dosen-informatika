<?php

class Dosen_model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('dosen')->result();
    }

    public function tambahDosen($data)
    {
        return $this->db->insert('dosen', $data);
    }
}
