<?php

namespace App\Controllers;

use App\Models\program\Program_model;
use App\Models\channel\Channel_model;

class Programs extends BaseController
{
    /**
     * load all programs
     */
    public function index()
    {
        $program_model = new Program_model();
        $data['programs'] = $program_model->select('program.*,channel.name as channel_name')
            ->join('channel', 'channel.id=program.channel_id')->findAll();

        $data['title'] = "Manage Programs";
        echo $this->template('/program/manage_program', $data);
    }

    /**
     * get add program form
     * @return string
     */
    public function get_program_add_view()
    {
        $data['title'] = "Add Program";

        $channel_model = new Channel_model();
        $data['channels'] = $channel_model->orderBy('name', 'ASC')->findAll();

        echo $this->template('/program/program_add', $data);
    }

    /**
     * insert program data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function store()
    {
        $program_model = new Program_model();
        $data = [
            'name' => $this->request->getVar('name'),
            'channel_id' => $this->request->getVar('channel_id')
        ];
        $program_model->insert($data);
        return $this->response->redirect(base_url('/program-list'));
    }

    /**
     * get program details
     * @param null $id
     * @return string
     */
    public function get_program_details($id = null)
    {
        $program_model = new Program_model();
        $channel_model = new Channel_model();

        $data['title'] = "Edit Program";
        $data['program_detail'] = $program_model->where('id', $id)->first();
        $data['channels'] = $channel_model->orderBy('name', 'ASC')->findAll();

        echo $this->template('/program/program_edit', $data);
    }

    /**
     * update program data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function update()
    {
        $program_model = new Program_model();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'channel_id' => $this->request->getVar('channel_id')
        ];

        $program_model->update($id, $data);
        return $this->response->redirect(base_url('/program-list'));
    }

    /**
     * update delete status
     * @param null $id
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function delete($id = null)
    {
        $program_model = new Program_model();

        $data = [
            'del_status' => 1
        ];

        $program_model->update($id, $data);
        return $this->response->redirect(base_url('/program-list'));
    }

    /**
     * get program list for selected channel
     * @param null $channel_id
     * @return string
     */
    public function get_program_for_channel($channel_id = null)
    {
        $channel_id = $this->request->getVar('channel_id');

        $program_model = new Program_model();
        $program_list = $program_model->where('channel_id', $channel_id)->findAll();

        $tbl_body = "";
        foreach ($program_list as $program) {
            $tbl_body .= '<tr id="program_' . $program['id'] . '">
    <td>' . $program['name'] . '</td>
    <td><a onclick="add_program_to_tbl(\'' . $program['id'] . '\')" class="btn btn-success btn-sm">Add</a> </td>
</tr>';

        }

        return $tbl_body;

    }

    /**
     * get program detail
     * @return string
     */
    public function get_program_detail()
    {

        $program_id = $this->request->getVar('program_id');
        $program_model = new Program_model();
        $program = $program_model->where('id', $program_id)->first();

        $tbl_body = '<tr id="schedule_prg_' . $program['id'] . '">
    <td>
    ' . $program['name'] . '
        <input type="hidden" name="program_id[]" value="' . $program['id'] . '" class="form-control"/>
    </td>
	<td>
        <input type="text" name="start_time[]" class="form-control"/>
    </td>
    <td>
        <input type="text" name="end_time[]" class="form-control"/>
    </td>
    <td>
        <div id="dZUpload" class="dropzone">
                                            <div class="dz-default dz-message">
                                                <span>Drop file or click here to upload</span></div>
                                        </div>
                                        <input type="hidden" class="form-control" name="prg_image[]" value=""/>
    </td>
    <td>
        <textarea class="form-control" name="description[]"></textarea>
    </td>
    <td>
        <a onclick="delete_row(\'' . $program['id'] . '\')" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash"></i></a>
    </td>                                
</tr>';

        return $tbl_body;

    }

}