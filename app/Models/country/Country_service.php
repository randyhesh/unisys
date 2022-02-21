<?php

class Country_service extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * get all country list
     * @return mixed
     */
    function get_all_countries()
    {

        $this->db->select('countries.*');
        $this->db->from('countries');
        $query = $this->db->get();
        return $query->result();
    }
}