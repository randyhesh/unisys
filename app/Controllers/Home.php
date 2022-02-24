<?php

namespace App\Controllers;

use App\Models\channel\Channel_model;
use App\Models\program\Program_model;
use App\Models\schedule\Schedule_model;

class Home extends BaseController
{
    public function index()
    {
        $channel_model = new Channel_model();
        $data['channels'] = count($channel_model->findAll());

        $program_model = new Program_model();
        $data['programs'] = count($program_model->findAll());

        $schedule_model = new Schedule_model();
        $data['schedules'] = count($schedule_model->findAll());

        $data['title'] = "Dashboard";
        echo $this->template('/dashboard/admin_dashboard', $data);
    }
}
