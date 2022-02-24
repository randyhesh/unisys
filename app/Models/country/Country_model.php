<?php

namespace App\Models\country;

use CodeIgniter\Model;

class Country_model extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';

    protected $allowedFields = ['country_code', 'country_name'];

}
