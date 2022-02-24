<?php

namespace App\Models\schedule;

use CodeIgniter\Model;

class Schedule_model extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'id';

    protected $allowedFields = ['program_id', 'date', 'start_time', 'end_time', 'image', 'description'];
}
