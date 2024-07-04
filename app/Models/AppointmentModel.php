<?php

namespace App\Models;
use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'appointment_date', 'status'];
}
