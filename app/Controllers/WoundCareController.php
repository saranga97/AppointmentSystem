<?php

namespace App\Controllers;

use App\Models\WoundCareModel;

class WoundCareController extends BaseController
{
    public function index()
    {
        $model = new WoundCareModel();
        $data['wound_care'] = $model->findAll();
        return view('wound_care/index', $data);
    }

    public function create()
    {
        return view('wound_care/create');
    }

    public function store()
    {
        $model = new WoundCareModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ];
        $model->save($data);
        return redirect()->to('/wound_care');
    }
}
