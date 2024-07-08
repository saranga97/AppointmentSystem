<?php

namespace App\Controllers;

use App\Models\TreatmentModel;
use App\Models\RecommendationModel;
use App\Models\PaymentModel;
use App\Models\AppointmentModel;
use App\Models\EnquiryModel;
use App\Models\WoundCareModel;
use App\Models\NotificationModel;

class PatientController extends BaseController
{
    public function dashboard()
    {
        return view('patient/dashboard');
    }
    public function notifications()
    {
        $notificationModel = new NotificationModel();
        $data['notifications'] = $notificationModel->where('user_id', session()->get('user_id'))->orderBy('created_at', 'DESC')->findAll();
        return view('patient/notifications', $data);
    }

    public function treatmentHistory()
    {
        $treatmentModel = new TreatmentModel();
        $data['treatments'] = $treatmentModel->where('patient_id', session()->get('user_id'))->findAll();
        return view('patient/treatment_history', $data);
    }

    // public function recommendations()
    // {
    //     $recommendationModel = new RecommendationModel();
    //     $data['recommendations'] = $recommendationModel->where('patient_id', session()->get('user_id'))->findAll();
    //     return view('patient/recommendations', $data);
    // }

    public function paymentHistory()
    {
        $paymentModel = new PaymentModel();
        $data['payments'] = $paymentModel->where('patient_id', session()->get('user_id'))->findAll();
        return view('patient/payment_history', $data);
    }

    public function makePayment()
    {
        return view('patient/make_payment');
    }

    public function woundDressingAlerts()
    {
        return view('patient/wound_dressing_alerts');
    }

    public function appointments()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('appointments');
        $builder->select('appointments.*, users.username as doctor_name')
            ->join('users', 'users.id = appointments.doctor_id')
            ->where('appointments.patient_id', session()->get('user_id'));
        $query = $builder->get();
        $data['appointments'] = $query->getResultArray();

        return view('patient/appointments', $data);
    }


    public function cancelAppointment($id)
    {
        $appointmentModel = new AppointmentModel();
        $appointmentModel->update($id, ['status' => 'cancelled']);
        return redirect()->to('/patient/appointments')->with('message', 'Appointment cancelled successfully');
    }

    public function enquiries()
    {
        $enquiryModel = new EnquiryModel();
        $data['enquiries'] = $enquiryModel->where('patient_id', session()->get('user_id'))->findAll();
        return view('patient/enquiries', $data);
    }

    public function sendEnquiry()
    {
        $enquiryModel = new EnquiryModel();

        $data = [
            'patient_id' => session()->get('user_id'),
            'message' => $this->request->getPost('message')
        ];

        if ($enquiryModel->insert($data)) {
            return redirect()->to('/patient/enquiries')->with('message', 'Enquiry sent successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to send enquiry');
        }
    }

    public function woundCareKnowledge()
    {
        $woundCareModel = new WoundCareModel();
        $data['wound_care_sessions'] = $woundCareModel->findAll();
        return view('patient/wound_care_knowledge', $data);
    }

    public function recommendations()
    {
        $treatmentModel = new TreatmentModel();
        $patient_id = session()->get('user_id');
        $data['treatments'] = $this->getTreatmentsWithDoctor($patient_id);
        return view('patient/recommendations', $data);
    }


    private function getTreatmentsWithDoctor($patient_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('treatments');
        $builder->select('treatments.*, users.username as doctor_name')
            ->join('users', 'users.id = treatments.doctor_id')
            ->where('treatments.patient_id', $patient_id);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
