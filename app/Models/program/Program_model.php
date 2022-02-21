<?php

class Program_model extends CI_Model
{

    private $id;
    private $name;
    private $channel_id;
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
     * get name
     * @return mixed
     */
    function get_name()
    {
        return $this->name;
    }

    /**
     * get channel id
     * @return mixed
     */
    function get_channel_id()
    {
        return $this->channel_id;
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
     * set name
     * @param $name
     */
    function set_name($name)
    {
        $this->name = $name;
    }

    /**
     * set channel id
     * @param $channel_id
     */
    function set_channel_id($channel_id)
    {
        $this->channel_id = $channel_id;
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
