<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\UserModel;  // Assuming UserModel is used for doctors and patients

class AppointmentsController extends BaseController
{
    public function create()
    {
        $userModel = new UserModel();

        // Fetch patients and doctors
        $patients = $userModel->where('role', 'patient')->findAll();
        $doctors = $userModel->where('role', 'doctor')->findAll();

        // Pass data to the view
        $data = [
            'patients' => $patients,
            'doctors' => $doctors
        ];

        return view('appointments/create', $data);
    }

    public function store()
    {
        $appointmentModel = new AppointmentModel();
        $patientId = session()->get('user_id');  // Retrieve the logged-in user's ID from the session

        // Debug: Check if the patientId is set
        if ($patientId === null) {
            return redirect()->back()->with('error', 'User ID is not set in session');
        }

        $data = [
            'patient_id' => $patientId,
            'doctor_id' => $this->request->getPost('doctor_id'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'status' => 'pending'
        ];

        if ($appointmentModel->insert($data)) {
            return redirect()->to('/patient/appointments')->with('message', 'Appointment created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create appointment');
        }
    }
}
