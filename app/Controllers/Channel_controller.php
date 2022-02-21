<?php

class Channel_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('channel/Channel_model');
        $this->load->model('channel/Channel_service');
    }

    public function index() {
        $channel_service = new Channel_service();
        $data['channels'] = $channel_service->get_all_channels();
        return $this->load->view('channel_views/channel_main', $data);
    }

    function save_channel() {
        $channel_model = new Channel_model();
        $channel_service = new Channel_service();

        $channel_model->set_name($this->input->post('name_text'));
        $channel_model->set_age($this->input->post('age_text'));

        echo $channel_service->insert_channel($channel_model);
    }

    function load_edit_channel($id) {

        $channel_service = new Channel_service();
        $data['channel'] = $channel_service->get_channel($id);

        return $this->load->view('channel_views/edit_view', $data);
    }

    function delete_channel() {
        $channel_model = new Channel_model();
        $channel_service = new Channel_service();

        $channel_model->set_id($this->input->post('id'));

        echo $channel_service->delete_channel($channel_model);
    }

    function edit_channel() {

        $channel_model = new Channel_model();
        $channel_service = new Channel_service();

        $channel_model->set_id($this->input->post('id_text'));
        $channel_model->set_name($this->input->post('name_text'));
        $channel_model->set_age($this->input->post('age_text'));

        echo $channel_service->insert_channel($channel_model);
    }

}