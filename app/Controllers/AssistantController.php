<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\EventModel;
use App\Models\InventoryModel;
use App\Models\ReportModel;
use Dompdf\Dompdf;
use Dompdf\Options;


use Dompdf\Frame;
use Dompdf\FrameDecorator\BaseFrameDecorator;
use Dompdf\FrameDecorator\FrameDecorator;
use Dompdf\FrameDecorator\TextFrameDecorator;
use Dompdf\FrameDecorator\ImageFrameDecorator;

class AssistantController extends BaseController
{
    public function appointments()
    {
        $appointmentModel = new AppointmentModel();
        $data['appointments'] = $appointmentModel->findAll();
        return view('assistant/manage_appointments', $data);
    }

    public function editAppointment($id)
    {
        $appointmentModel = new AppointmentModel();
        $data['appointment'] = $appointmentModel->find($id);
        return view('assistant/edit_appointment', $data);
    }

    public function updateAppointment($id)
    {
        $appointmentModel = new AppointmentModel();
        $data = [
            'appointment_date' => $this->request->getPost('appointment_date'),
            'status' => $this->request->getPost('status')
        ];
        $appointmentModel->update($id, $data);

        return redirect()->to('/assistant/appointments')->with('message', 'Appointment updated successfully');
    }

    public function deleteAppointment($id)
    {
        $appointmentModel = new AppointmentModel();
        $appointmentModel->delete($id);

        return redirect()->to('/assistant/appointments')->with('message', 'Appointment deleted successfully');
    }

    public function events()
    {
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll();
        return view('assistant/manage_events', $data);
    }

    public function addEvent()
    {
        $eventModel = new EventModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];
        $eventModel->insert($data);

        return redirect()->to('/assistant/events')->with('message', 'Event added successfully');
    }

    public function inventories()
    {
        $inventoryModel = new InventoryModel();
        $data['inventories'] = $inventoryModel->findAll();
        return view('assistant/manage_inventories', $data);
    }

    public function addInventory()
    {
        $inventoryModel = new InventoryModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity')
        ];
        $inventoryModel->insert($data);

        return redirect()->to('/assistant/inventories')->with('message', 'Inventory added successfully');
    }

    public function editInventory($id)
    {
        $inventoryModel = new InventoryModel();
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity')
        ];
        $inventoryModel->update($id, $data);

        return redirect()->to('/assistant/inventories')->with('message', 'Inventory updated successfully');
    }

    public function deleteInventory($id)
    {
        $inventoryModel = new InventoryModel();
        $inventoryModel->delete($id);

        return redirect()->to('/assistant/inventories')->with('message', 'Inventory deleted successfully');
    }

    public function reports()
    {
        $reportModel = new ReportModel();
        $data['reports'] = $reportModel->findAll();
        return view('assistant/manage_reports', $data);
    }

    public function addReport()
    {
        $reportModel = new ReportModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'content' => $this->request->getPost('content')
        ];
        $reportModel->insert($data);

        return redirect()->to('/assistant/reports')->with('message', 'Report added successfully');
    }
    public function editReport($id)
    {
        $reportModel = new ReportModel();
        $data['report'] = $reportModel->find($id);
        return view('assistant/edit_report', $data);
    }

    public function updateReport($id)
    {
        $reportModel = new ReportModel();
        $data = [
            'content' => $this->request->getPost('content')
        ];
        $reportModel->update($id, $data);

        return redirect()->to('/assistant/reports')->with('message', 'Report updated successfully');
    }

    public function deleteReport($id)
    {
        $reportModel = new ReportModel();
        $reportModel->delete($id);

        return redirect()->to('/assistant/reports')->with('message', 'Report deleted successfully');
    }
    public function downloadReport($id)
    {
        $reportModel = new ReportModel();
        $report = $reportModel->find($id);

        if (!$report) {
            return redirect()->to('/assistant/reports')->with('message', 'Report not found');
        }

        // Load HTML content for the report
        $html = view('assistant/report_pdf', ['report' => $report]);

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('report_' . $report['id'] . '.pdf', array("Attachment" => 1));
    }

}
