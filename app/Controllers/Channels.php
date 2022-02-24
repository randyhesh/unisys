<?php

namespace App\Controllers;

use App\Models\channel\Channel_model;
use App\Models\country\Country_model;

class Channels extends BaseController
{
    /**
     * load all channels
     */
    public function index()
    {
        $channel_model = new Channel_model();
        $data['channels'] = $channel_model->select('channel.*,countries.country_name')
            ->join('countries', 'countries.id=channel.country_id')->findAll();

        $data['title'] = "Manage Channels";
        echo $this->template('/channel/manage_channel', $data);
    }

    /**
     * get add channel form
     * @return string
     */
    public function get_channel_add_view()
    {
        $data['title'] = "Add Channel";

        $country_model = new Country_model();
        $data['countries'] = $country_model->orderBy('country_name', 'ASC')->findAll();

        echo $this->template('/channel/channel_add', $data);
    }

    /**
     * insert channel data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function store()
    {
        $channel_model = new Channel_model();
        $data = [
            'name' => $this->request->getVar('name'),
            'country_id' => $this->request->getVar('country_id'),
            'channel_url' => $this->request->getVar('channel_url')
        ];
        $channel_model->insert($data);
        return $this->response->redirect(base_url('/channel-list'));
    }

    /**
     * get channel details
     * @param null $id
     * @return string
     */
    public function get_channel_details($id = null)
    {
        $channel_model = new Channel_model();
        $country_model = new Country_model();

        $data['title'] = "Edit Channel";
        $data['channel_detail'] = $channel_model->where('id', $id)->first();
        $data['countries'] = $country_model->orderBy('country_name', 'ASC')->findAll();

        echo $this->template('/channel/channel_edit', $data);
    }

    /**
     * update channel data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function update()
    {
        $channel_model = new Channel_model();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'country_id' => $this->request->getVar('country_id'),
            'channel_url' => $this->request->getVar('channel_url')
        ];

        $channel_model->update($id, $data);
        return $this->response->redirect(base_url('/channel-list'));
    }

    /**
     * update delete status
     * @param null $id
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function delete($id = null)
    {
        $channel_model = new Channel_model();

        $data = [
            'del_status' => 1
        ];

        $channel_model->update($id, $data);
        return $this->response->redirect(base_url('/channel-list'));
    }
}