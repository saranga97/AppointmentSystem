<?php

namespace App\Controllers;

use App\Models\TreatmentModel;
use App\Models\RecommendationModel;
use App\Models\PaymentModel;
use App\Models\AppointmentModel;
use App\Models\EnquiryModel;
use App\Models\WoundCareModel;

class PatientController extends BaseController
{
    public function dashboard()
    {
        return view('patient/dashboard');
    }

    public function treatmentHistory()
    {
        $treatmentModel = new TreatmentModel();
        $data['treatments'] = $treatmentModel->where('patient_id', session()->get('user_id'))->findAll();
        return view('patient/treatment_history', $data);
    }

    public function recommendations()
    {
        $recommendationModel = new RecommendationModel();
        $data['recommendations'] = $recommendationModel->where('patient_id', session()->get('user_id'))->findAll();
        return view('patient/recommendations', $data);
    }

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
        $appointmentModel = new AppointmentModel();
        $data['appointments'] = $appointmentModel->where('patient_id', session()->get('user_id'))->findAll();
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
}
