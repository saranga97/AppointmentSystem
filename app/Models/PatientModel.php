<?php

namespace App\Models;
use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'email', 'phone', 'address', 'created_at'];
}
