<?php

class Channel_model extends CI_Model
{

    private $id;
    private $country_code;
    private $country_name;

    function get_id()
    {
        return $this->id;
    }

    function get_country_code()
    {
        return $this->country_code;
    }

    function get_country_name()
    {
        return $this->country_name;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function set_country_code($country_code)
    {
        $this->country_code = $country_code;
    }

    function set_country_name($country_name)
    {
        $this->country_name = $country_name;
    }

}
