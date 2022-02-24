<?php

namespace App\Controllers;

use App\Models\channel\Channel_model;
use App\Models\program\Program_model;
use App\Models\schedule\Schedule_model;

class Schedule extends BaseController
{
    /**
     * load all schedules
     */
    public function index()
    {
        $schedule_model = new Schedule_model();
        $data['schedules'] = $schedule_model->select('schedule.*,program.name as program_name,channel.name as channel_name')
            ->join('program', 'program.id=schedule.program_id')
            ->join('channel', 'channel.id=program.channel_id')
            ->findAll();

        $data['title'] = "Schedule";
        echo $this->template('/schedule/manage_schedule', $data);
    }

    /**
     * load program scheduling view
     */
    public function get_schedule_program_view()
    {
        $data['title'] = "Schedule Programmes";
        $channel_model = new Channel_model();
        $data['channel_list'] = $channel_model->orderBy('name', 'ASC')->findAll();

        echo $this->template('/schedule/schedule_program', $data);
    }

    /**
     * insert schedule data
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function store()
    {
        $schedule_date = $this->request->getVar('schedule_date');
        $program_ids = $this->request->getVar('program_id');
        $start_times = $this->request->getVar('start_time');
        $end_times = $this->request->getVar('end_time');
        $images = $this->request->getVar('prg_image');
        $descriptions = $this->request->getVar('description');

        for ($i = 0; $i < count($program_ids); $i++) {

            $schedule_model = new Schedule_model();
            $data = [
                'program_id' => $program_ids[$i],
                'date' => $schedule_date,
                'start_time' => $start_times[$i],
                'end_time' => $end_times[$i],
                'image' => $images[$i],
                'description' => $descriptions[$i]
            ];

            $schedule_model->insert($data);

            unset($data);
        }

        return $this->response->redirect(base_url('/schedule-list'));
    }

}