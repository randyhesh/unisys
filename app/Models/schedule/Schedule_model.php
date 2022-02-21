<?php

class Schedule_model extends CI_Model
{

    private $id;
    private $program_id;
    private $date;
    private $start_time;
    private $end_time;
    private $image;
    private $description;
    private $publish_status;
    private $del_status;
    private $added_by;
    private $added_date;
    private $updated_by;
    private $updated_date;

    /**
     * get id
     * @return mixed
     */
    function get_id()
    {
        return $this->id;
    }

    /**
     * get program id
     * @return mixed
     */
    function get_program_id()
    {
        return $this->program_id;
    }

    /**
     * get program date
     * @return mixed
     */
    function get_date()
    {
        return $this->date;
    }

    /**
     * get start time
     * @return mixed
     */
    function get_start_time()
    {
        return $this->start_time;
    }

    /**
     * get end time
     * @return mixed
     */
    function get_end_time()
    {
        return $this->end_time;
    }

    /**
     * get image
     * @return mixed
     */
    function get_image()
    {
        return $this->image;
    }

    /**
     * get description
     * @return mixed
     */
    function get_description()
    {
        return $this->description;
    }

    /**
     * get acitve or inactive status
     * @return mixed
     */
    function get_publish_status()
    {
        return $this->publish_status;
    }

    /**
     * get delete status
     * @return mixed
     */
    function get_del_status()
    {
        return $this->del_status;
    }

    /**
     * get added by user
     * @return mixed
     */
    function get_added_by()
    {
        return $this->added_by;
    }

    /**
     * get added date
     * @return mixed
     */
    function get_added_date()
    {
        return $this->added_date;
    }

    /**
     * get updated by user
     * @return mixed
     */
    function get_updated_by()
    {
        return $this->updated_by;
    }

    /**
     * get updated date
     * @return mixed
     */
    function get_updated_date()
    {
        return $this->updated_date;
    }

    /**
     * set id
     * @param $id
     */
    function set_id($id)
    {
        $this->id = $id;
    }

    /**
     * set program id
     * @param $program_id
     */
    function set_program_id($program_id)
    {
        $this->program_id = $program_id;
    }

    /**
     * set date
     * @param $date
     */
    function set_date($date)
    {
        $this->date = $date;
    }

    /**
     * set start time
     * @param $start_time
     */
    function set_start_time($start_time)
    {
        $this->start_time = $start_time;
    }

    /**
     * set end time
     * @param $end_time
     */
    function set_end_time($end_time)
    {
        $this->end_time = $end_time;
    }

    /**
     * set image
     * @param $image
     */
    function set_image($image)
    {
        $this->image = $image;
    }

    /**
     * set description
     * @param $description
     */
    function set_description($description)
    {
        $this->description = $description;
    }

    /**
     * set inactive or active status
     * @param $publish_status
     */
    function set_publish_status($publish_status)
    {
        $this->publish_status = $publish_status;
    }

    /**
     * set delete status
     * @param $del_status
     */
    function set_del_status($del_status)
    {
        $this->del_status = $del_status;
    }

    /**
     * set added by user
     * @param $added_by
     */
    function set_added_by($added_by)
    {
        $this->added_by = $added_by;
    }

    /**
     * set added by date
     * @param $added_date
     */
    function set_added_date($added_date)
    {
        $this->added_date = $added_date;
    }

    /**
     * set updated by user
     * @param $updated_by
     */
    function set_updated_by($updated_by)
    {
        $this->updated_by = $updated_by;
    }

    /**
     * set updated by date
     * @param $updated_date
     */
    function set_updated_date($updated_date)
    {
        $this->updated_date = $updated_date;
    }

}
