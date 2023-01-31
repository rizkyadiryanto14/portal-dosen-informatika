<?php

class Bkd_model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('bkd')->result_array();
    }

    public function tambahData($data)
    {
        return $this->db->insert('bkd', $data);
    }

    public function editData($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('bkd', $data);
        return $query;
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('bkd');
        return $query;
    }
}
