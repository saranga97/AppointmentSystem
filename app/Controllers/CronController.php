<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\NotificationModel;
use CodeIgniter\Controller;

class CronController extends Controller
{
    public function notifyPatients()
    {
        $appointmentModel = new AppointmentModel();
        $notificationModel = new NotificationModel();

        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $appointments = $appointmentModel->where('status', 'Approved')->where('appointment_date', $tomorrow)->findAll();

        foreach ($appointments as $appointment) {
            $message = "Reminder: You have an appointment Pending for tomorrow.";
            $notificationModel->insert([
                'user_id' => $appointment['patient_id'],
                'message' => $message
            ]);
        }
    }
}
