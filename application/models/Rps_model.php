<?php

class Rps_model extends CI_Model
{
    public function getData()
    {
        $this->db->select('*')
            ->from('rps')
            ->join('dosen', 'dosen.id = rps.id_dosen', 'left');
        return $this->db->get('');
    }
}
