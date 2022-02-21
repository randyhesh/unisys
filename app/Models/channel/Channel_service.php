<?php

class Channel_service extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * save channel data
     * @param $channel_model
     * @return mixed
     */
    function insert_channel($channel_model)
    {
        return $this->db->insert($channel_model, 'channel');
    }

    /**
     * update channel data
     * @param $channel_model
     * @return mixed
     */
    function update_channel($channel_model)
    {
        $data = array(
            'name' => $channel_model->get_name(),
            'country_id' => $channel_model->get_country_id(),
            'channel_url' => $channel_model->get_channel_url(),
            'updated_by' => $channel_model->get_update_by(),
            'updated_date' => $channel_model->get_updated_date()
        );

        $this->db->where('id', $channel_model->get_id());
        return $this->db->update('channel', $data);
    }

    /**
     * get channel list
     * @return mixed
     */
    function get_all_channels()
    {
        $this->db->select('channel.*');
        $this->db->from('channel');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * get channel detail
     * @param $id
     * @return mixed
     */
    function get_channel($id)
    {
        $this->db->select('*');
        $this->db->from('channel');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * delete channel
     * @param $channel_model
     * @return mixed
     */
    function delete_channel($channel_model)
    {
        $data = array(
            'del_status' => $channel_model->get_del_status(),
            'updated_by' => $channel_model->get_update_by(),
            'updated_date' => $channel_model->get_updated_date()
        );

        $this->db->where('id', $channel_model->get_id());
        return $this->db->update('program', $data);
    }

    /**
     * activate or inactivate channel
     * @param $channel_model
     * @return mixed
     */
    function change_status($channel_model)
    {
        $data = array(
            'publish_status' => $channel_model->get_publish_status(),
            'updated_by' => $channel_model->get_update_by(),
            'updated_date' => $channel_model->get_updated_date()
        );

        $this->db->where('id', $channel_model->get_id());
        return $this->db->update('program', $data);
    }
}