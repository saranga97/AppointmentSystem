<?php

namespace App\Models;

use CodeIgniter\Model;

class RecommendationModel extends Model
{
    protected $table = 'recommendations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'description', 'created_at'];
}
