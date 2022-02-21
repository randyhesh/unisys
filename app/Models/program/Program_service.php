<?php

class Program_service extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * save program data
     * @param $program_model
     * @return mixed
     */
    function insert_program($program_model)
    {
        return $this->db->insert($program_model, 'program');
    }

    /**
     * update program data
     * @param $program_model
     * @return mixed
     */
    function update_program($program_model)
    {
        $data = array(
            'name' => $program_model->get_name(),
            'channel_id' => $program_model->get_channel_id(),
            'updated_by' => $program_model->get_update_by(),
            'updated_date' => $program_model->get_updated_date()
        );

        $this->db->where('id', $program_model->get_id());
        return $this->db->update('program', $data);
    }

    /**
     * get program list
     * @return mixed
     */
    function get_all_programs()
    {

        $this->db->select('program.*');
        $this->db->from('program');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * get program detail
     * @param $id
     * @return mixed
     */
    function get_program($id)
    {

        $this->db->select('*');
        $this->db->from('program');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * delete program
     * @param $program_model
     * @return mixed
     */
    function delete_program($program_model)
    {
        $data = array(
            'del_status' => $program_model->get_del_status(),
            'updated_by' => $program_model->get_update_by(),
            'updated_date' => $program_model->get_updated_date()
        );

        $this->db->where('id', $program_model->get_id());
        return $this->db->update('program', $data);
    }

    /**
     * activate or inactivate program
     * @param $program_model
     * @return mixed
     */
    function change_status($program_model)
    {
        $data = array(
            'publish_status' => $program_model->get_publish_status(),
            'updated_by' => $program_model->get_update_by(),
            'updated_date' => $program_model->get_updated_date()
        );

        $this->db->where('id', $program_model->get_id());
        return $this->db->update('program', $data);
    }
}