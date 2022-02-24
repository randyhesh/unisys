<?php

namespace App\Models\channel;

use CodeIgniter\Model;

class Channel_model extends Model
{
    protected $table = 'channel';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'country_id', 'channel_url'];
}
