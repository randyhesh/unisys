<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard";
        echo $this->template('/dashboard/admin_dashboard', $data);
    }
}
