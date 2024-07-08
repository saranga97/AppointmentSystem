<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Appointment</h2>
        <form method="post" action="<?= base_url('/assistant/update_appointment/' . $appointment['id']); ?>">
            <div class="form-group">
                <label for="editPatientId">Patient ID</label>
                <input type="text" class="form-control" id="editPatientId" name="patient_id" value="<?= $appointment['patient_id']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="editDoctorId">Doctor ID</label>
                <input type="text" class="form-control" id="editDoctorId" name="doctor_id" value="<?= $appointment['doctor_id']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="editAppointmentDate">Appointment Date</label>
                <input type="datetime-local" class="form-control" id="editAppointmentDate" name="appointment_date" value="<?= date('Y-m-d\TH:i', strtotime($appointment['appointment_date'])); ?>" required>
            </div>
            <div class="form-group">
                <label for="editStatus">Status</label>
                <select class="form-control" id="editStatus" name="status" required>
                    <option value="Pending" <?= $appointment['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Completed" <?= $appointment['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="Cancelled" <?= $appointment['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Appointment</button>
        </form>
        <a href="<?= base_url('/assistant/appointments'); ?>" class="btn btn-secondary">Back to Appointments</a>
    </div>
</body>
</html>
