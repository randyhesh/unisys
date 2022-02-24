<?php
namespace App\Models\program;

use CodeIgniter\Model;

class Program_model extends Model
{
    protected $table = 'program';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'channel_id'];


}
