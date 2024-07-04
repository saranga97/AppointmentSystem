<?php

namespace App\Models;

use CodeIgniter\Model;

class TreatmentModel extends Model
{
    protected $table = 'treatments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'description'];
}
