<?php

namespace App\Models;

use CodeIgniter\Model;

class WoundCareModel extends Model
{
    protected $table = 'wound_care_sessions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'title', 'description'];
}
