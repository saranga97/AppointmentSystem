<?php

namespace App\Controllers;

use App\Models\InventoryModel;

class InventoryController extends BaseController
{
    public function index()
    {
        $model = new InventoryModel();
        $data['inventories'] = $model->findAll();
        return view('inventories/index', $data);
    }

    public function create()
    {
        return view('inventories/create');
    }

    public function store()
    {
        $model = new InventoryModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity')
        ];
        $model->save($data);
        return redirect()->to('/inventories');
    }
}
