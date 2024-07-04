<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemStatusModel extends Model
{
    protected $table = 'system_status';
    protected $primaryKey = 'id';
    protected $allowedFields = ['status'];

    public function getStatus()
    {
        return $this->first()['status'];
    }

    public function updateStatus($status)
    {
        return $this->update(1, ['status' => $status]);  // Assuming there's only one row with id = 1
    }
}
