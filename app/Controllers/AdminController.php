<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AppointmentModel;
use App\Models\InventoryModel;
use App\Models\WoundCareModel;
use App\Models\SystemStatusModel;
use App\Models\PatientModel;
use App\Models\TreatmentModel;

class AdminController extends BaseController
{
    public function index()
    {
        $systemStatusModel = new SystemStatusModel();
        $system_status = $systemStatusModel->getStatus();
        
        return view('dashboard/admin', ['system_status' => $system_status]);
    }

    public function toggleSystemStatus()
    {
        $systemStatusModel = new SystemStatusModel();
        $currentStatus = $systemStatusModel->getStatus();

        $newStatus = ($currentStatus == 'live') ? 'down' : 'live';
        $systemStatusModel->updateStatus($newStatus);

        return $this->response->setJSON(['status' => $newStatus]);
    }

    public function manageUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('admin/manage_users', $data);
    }

    // public function getSystemStatus()
    // {
    //     $systemStatusModel = new SystemStatusModel();
    //     return $systemStatusModel->getStatus();
    // }
    
    public function patients()
    {
        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->findAll();
        return view('admin/patients', $data);
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

        return view('admin/patient_records', $data);
    }


    public function addDoctor()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'doctor'
        ];

        if ($userModel->insert($data)) {
            return $this->response->setJSON(['message' => 'Doctor added successfully!']);
        } else {
            return $this->response->setJSON(['message' => 'Failed to add doctor.'], 500);
        }
    }

    public function addAssistant()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'assistant'
        ];

        if ($userModel->insert($data)) {
            return $this->response->setJSON(['message' => 'Assistant added successfully!']);
        } else {
            return $this->response->setJSON(['message' => 'Failed to add assistant.'], 500);
        }
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        if ($userModel->delete($id)) {
            return redirect()->to('/admin/manage_users')->with('message', 'User deleted successfully');
        } else {
            return redirect()->to('/admin/manage_users')->with('message', 'Failed to delete user');
        }
    }

    public function editUser($id)
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];

        if ($userModel->update($id, $data)) {
            return redirect()->to('/admin/manage_users')->with('message', 'User updated successfully');
        } else {
            return redirect()->to('/admin/manage_users')->with('message', 'Failed to update user');
        }
    }

    public function manageAppointments()
    {
        $appointmentModel = new AppointmentModel();
        $data['appointments'] = $appointmentModel->findAll();
        return view('admin/manage_appointments', $data);
    }
    
    public function editAppointment($id)
    {
        $appointmentModel = new AppointmentModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'appointment_date' => $this->request->getPost('appointment_date'),
            'status' => $this->request->getPost('status')
        ];

        if ($appointmentModel->update($id, $data)) {
            return redirect()->to('/admin/manage_appointments')->with('message', 'Appointment updated successfully');
        } else {
            return redirect()->to('/admin/manage_appointments')->with('message', 'Failed to update appointment');
        }
    }

    public function deleteAppointment($id)
    {
        $appointmentModel = new AppointmentModel();
        if ($appointmentModel->delete($id)) {
            return redirect()->to('/admin/manage_appointments')->with('message', 'Appointment deleted successfully');
        } else {
            return redirect()->to('/admin/manage_appointments')->with('message', 'Failed to delete appointment');
        }
    }

    public function manageInventories()
    {
        $inventoryModel = new InventoryModel();
        $data['inventories'] = $inventoryModel->findAll();
        return view('admin/manage_inventories', $data);
    }

    public function addInventory()
    {
        $inventoryModel = new InventoryModel();
        $data = [
            'id' => $this->request->getPost('id'),
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity')
        ];

        if ($inventoryModel->insert($data)) {
            return redirect()->to('/admin/manage_inventories')->with('message', 'Inventory added successfully');
        } else {
            return redirect()->to('/admin/manage_inventories')->with('message', 'Failed to add inventory');
        }
    }

    public function deleteInventory($id)
    {
        $inventoryModel = new InventoryModel();
        if ($inventoryModel->delete($id)) {
            return redirect()->to('/admin/manage_inventories')->with('message', 'Inventory deleted successfully');
        } else {
            return redirect()->to('/admin/manage_inventories')->with('message', 'Failed to delete inventory');
        }
    }

    public function editInventory($id)
    {
        $inventoryModel = new InventoryModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity')
        ];

        if ($inventoryModel->update($id, $data)) {
            return redirect()->to('/admin/manage_inventories')->with('message', 'Inventory updated successfully');
        } else {
            return redirect()->to('/admin/manage_inventories')->with('message', 'Failed to update inventory');
        }
    }

    public function woundCare()
    {
        $woundCareModel = new WoundCareModel();
        $data['wound_care_sessions'] = $woundCareModel->findAll();
        return view('admin/wound_care', $data);
    }

    public function addWoundCare()
    {
        $woundCareModel = new WoundCareModel();
        $data = [
            'id' => $this->request->getPost('id'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];

        if ($woundCareModel->insert($data)) {
            return redirect()->to('/admin/wound_care')->with('message', 'Wound care session added successfully');
        } else {
            return redirect()->to('/admin/wound_care')->with('message', 'Failed to add wound care session');
        }
    }

    public function deleteWoundCare($id)
    {
        $woundCareModel = new WoundCareModel();
        if ($woundCareModel->delete($id)) {
            return redirect()->to('/admin/wound_care')->with('message', 'Wound care session deleted successfully');
        } else {
            return redirect()->to('/admin/wound_care')->with('message', 'Failed to delete wound care session');
        }
    }

    public function editWoundCare($id)
    {
        $woundCareModel = new WoundCareModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];

        if ($woundCareModel->update($id, $data)) {
            return redirect()->to('/admin/wound_care')->with('message', 'Wound care session updated successfully');
        } else {
            return redirect()->to('/admin/wound_care')->with('message', 'Failed to update wound care session');
        }
    }
}
