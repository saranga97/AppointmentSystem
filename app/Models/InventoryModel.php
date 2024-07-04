<?php

namespace App\Models;
use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'item_name', 'quantity'];
}
