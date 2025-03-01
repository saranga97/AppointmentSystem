<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\PatientModel;
use App\Models\InventoryModel;
use App\Models\TreatmentModel;
use App\Models\UserModel;
use App\Models\NotificationModel;

class DoctorController extends BaseController
{
    public function patients()
    {
        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->findAll();
        return view('doctor/patients', $data);
    }

    public function patientRecords($patient_id)
    {
        $treatmentModel = new TreatmentModel();
        $userModel = new UserModel();

        // Fetch patient details
        $patientModel = new PatientModel();
        $data['patient'] = $patientModel->find($patient_id);

        // Fetch treatments and corresponding doctor names
        $treatments = $treatmentModel->where('patient_id', $patient_id)->findAll();
        foreach ($treatments as &$treatment) {
            $doctor = $userModel->find($treatment['doctor_id']);
            $treatment['doctor_name'] = $doctor['username'];
        }
        $data['treatments'] = $treatments;

        return view('doctor/patient_records', $data);
    }

    public function appointments()
    {
        $appointmentModel = new AppointmentModel();
        $data['appointments'] = $appointmentModel->where('doctor_id', session()->get('user_id'))->findAll();
        return view('doctor/appointments', $data);
    }

    public function updateAppointmentStatus($id)
    {
        $appointmentModel = new AppointmentModel();
        $notificationModel = new NotificationModel();
        $userModel = new UserModel();

        $status = $this->request->getPost('status');
        $appointmentModel->update($id, ['status' => $status]);

        // Get patient and doctor details
        $appointment = $appointmentModel->find($id);
        $doctor = $userModel->find(session()->get('user_id'));
        $patientId = $appointment['patient_id'];

        // Create a notification for the patient
        $message = "Your appointment has been $status by Dr. " . $doctor['username'];
        $notificationModel->insert([
            'user_id' => $patientId,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Add a notification for one day before the appointment if approved
        if ($status == 'Approved') {
            $appointmentDate = new \DateTime($appointment['appointment_date']);
            $notificationDate = clone $appointmentDate;
            $notificationDate->modify('-1 day');

            $message = "Tomorrow appointment with Dr. " . $doctor['username'] . " at " . $appointmentDate->format('H:i');
            $notificationModel->insert([
                'user_id' => $patientId,
                'message' => $message,
                'created_at' => $notificationDate->format('Y-m-d H:i:s')
            ]);
        }

        return redirect()->to('/doctor/appointments')->with('message', 'Appointment status updated successfully');
    }

    public function inventories()
    {
        $inventoryModel = new InventoryModel();
        $data['inventories'] = $inventoryModel->findAll();
        return view('doctor/inventories', $data);
    }

    public function addTreatment($appointment_id)
    {
        $appointmentModel = new AppointmentModel();
        $appointment = $appointmentModel->find($appointment_id);
        $data = [
            'appointment_id' => $appointment_id,
            'patient_id' => $appointment['patient_id'],
            'doctor_id' => session()->get('user_id')  // Use the logged-in doctor's ID
        ];
        return view('doctor/add_treatment', $data);
    }

    public function storeTreatment()
    {
        $treatmentModel = new TreatmentModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => session()->get('user_id'),  // Ensure this is from the session
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')  // Include the price
        ];

        $treatmentModel->save($data);
        return redirect()->to('/doctor/appointments')->with('message', 'Treatment added successfully');
    }
    public function monthlyIncome()
    {
        $treatmentModel = new TreatmentModel();
        $doctor_id = session()->get('user_id'); // Assuming doctor ID is stored in session

        // Query to get monthly income
        $query = $treatmentModel->select('SUM(price) as total_income, MONTH(created_at) as month')
            ->where('doctor_id', $doctor_id)
            ->groupBy('month')
            ->get();

        $results = $query->getResultArray();

        $income_data = [];
        foreach ($results as $result) {
            $income_data[$result['month']] = $result['total_income'];
        }

        $data = [
            'income_data' => $income_data
        ];

        return view('doctor/monthly_income', $data);
    }
}
