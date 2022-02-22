<?php

namespace App\Controllers;

use App\Models\channel\Channel_model;
use App\Models\channel\Channel_service;

class Channels extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->channel_model = new Channel_model();
        var_dump($this->channel_model);
        //$this->channel_service = new Channel_service();
    }

    public function index()
    {
        $data['channels'] = $this->channel_service->get_all_channels();
        $data['title'] = "Manage Channels";
        echo $this->template('/channel/manage_channel', $data);
    }

    function save_channel()
    {
        $channel_model = new Channel_model();
        $channel_service = new Channel_service();

        $channel_model->set_name($this->input->post('name_text'));
        $channel_model->set_age($this->input->post('age_text'));

        echo $channel_service->insert_channel($channel_model);
    }

    function load_edit_channel($id)
    {

        $channel_service = new Channel_service();
        $data['channel'] = $channel_service->get_channel($id);

        return $this->load->view('channel_views/edit_view', $data);
    }

    function delete_channel()
    {
        $channel_model = new Channel_model();
        $channel_service = new Channel_service();

        $channel_model->set_id($this->input->post('id'));

        echo $channel_service->delete_channel($channel_model);
    }

    function edit_channel()
    {

        $channel_model = new Channel_model();
        $channel_service = new Channel_service();

        $channel_model->set_id($this->input->post('id_text'));
        $channel_model->set_name($this->input->post('name_text'));
        $channel_model->set_age($this->input->post('age_text'));

        echo $channel_service->up($channel_model);
    }
}