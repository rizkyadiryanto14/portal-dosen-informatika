<?php

class Dashboard_model extends CI_Model
{
    public function CountDosen()
    {
        return $this->db->count_all_results('dosen');
    }
}
