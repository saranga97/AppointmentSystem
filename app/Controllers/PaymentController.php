<?php

namespace App\Controllers;

use App\Models\PaymentModel;

class PaymentController extends BaseController
{
    public function index()
    {
        $model = new PaymentModel();
        $data['payments'] = $model->findAll();
        return view('payments/index', $data);
    }

    public function create()
    {
        return view('payments/create');
    }

    public function store()
    {
        $model = new PaymentModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'amount' => $this->request->getPost('amount')
        ];
        $model->save($data);
        return redirect()->to('/payments');
    }
}
