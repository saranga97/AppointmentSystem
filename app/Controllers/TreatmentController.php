<?php

namespace App\Controllers;

use App\Models\TreatmentModel;

class TreatmentController extends BaseController
{
    public function index()
    {
        $model = new TreatmentModel();
        $data['treatments'] = $model->findAll();
        return view('treatments/index', $data);
    }

    public function create()
    {
        return view('treatments/create');
    }

    public function store()
    {
        $model = new TreatmentModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'description' => $this->request->getPost('description')
        ];
        $model->save($data);
        return redirect()->to('/treatments');
    }
}
