<?php

class Schedule_service extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * save schedule data
     * @param $schedule_model
     * @return mixed
     */
    function insert_schedule($schedule_model)
    {
        return $this->db->insert($schedule_model, 'schedule');
    }

    /**
     * update schedule data
     * @param $schedule_model
     * @return mixed
     */
    function update_schedule($schedule_model)
    {
        $data = array(
            'name' => $schedule_model->get_name(),
            'program_id' => $schedule_model->get_program_id(),
            'date' => $schedule_model->get_date(),
            'start_time' => $schedule_model->get_start_time(),
            'end_time' => $schedule_model->get_end_time(),
            'image' => $schedule_model->get_image(),
            'description' => $schedule_model->get_description(),
            'updated_by' => $schedule_model->get_update_by(),
            'updated_date' => $schedule_model->get_updated_date()
        );

        $this->db->where('id', $schedule_model->get_id());
        return $this->db->update('schedule', $data);
    }

    /**
     * get schedule list
     * @return mixed
     */
    function get_all_schedules()
    {
        $this->db->select('schedule.*');
        $this->db->from('schedule');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * get schedule detail
     * @param $id
     * @return mixed
     */
    function get_schedule($id)
    {
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * delete schedule
     * @param $schedule_model
     * @return mixed
     */
    function delete_schedule($schedule_model)
    {
        $data = array(
            'del_status' => $schedule_model->get_del_status(),
            'updated_by' => $schedule_model->get_update_by(),
            'updated_date' => $schedule_model->get_updated_date()
        );

        $this->db->where('id', $schedule_model->get_id());
        return $this->db->update('schedule', $data);
    }

    /**
     * activate or inactivate schedule
     * @param $schedule_model
     * @return mixed
     */
    function change_status($schedule_model)
    {
        $data = array(
            'publish_status' => $schedule_model->get_publish_status(),
            'updated_by' => $schedule_model->get_update_by(),
            'updated_date' => $schedule_model->get_updated_date()
        );

        $this->db->where('id', $schedule_model->get_id());
        return $this->db->update('schedule', $data);
    }
}