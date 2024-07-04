<?php

namespace App\Controllers;

use App\Models\ReportModel;

class ReportController extends BaseController
{
    public function index()
    {
        $model = new ReportModel();
        $data['reports'] = $model->findAll();
        return view('reports/index', $data);
    }

    public function create()
    {
        return view('reports/create');
    }

    public function store()
    {
        $model = new ReportModel();
        $data = [
            'report_type' => $this->request->getPost('report_type'),
            'content' => $this->request->getPost('content')
        ];
        $model->save($data);
        return redirect()->to('/reports');
    }
}
