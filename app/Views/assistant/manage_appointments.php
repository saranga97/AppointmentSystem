<!DOCTYPE html>
<html>
<head>
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage Appointments</h2>
        <?php if (session()->getFlashdata('message')): ?>
            <p><?= session()->getFlashdata('message'); ?></p>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient ID</th>
                    <th>Doctor ID</th>
                    <th>Appointment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= $appointment['id']; ?></td>
                    <td><?= $appointment['patient_id']; ?></td>
                    <td><?= $appointment['doctor_id']; ?></td>
                    <td><?= $appointment['appointment_date']; ?></td>
                    <td><?= $appointment['status']; ?></td>
                    <td>
                        <a href="<?= base_url('/assistant/edit_appointment/' . $appointment['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('/assistant/delete_appointment/' . $appointment['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('/dashboard'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <!-- Edit Appointment Modal -->
    <?php foreach ($appointments as $appointment): ?>
    <div class="modal fade" id="editAppointmentModal-<?= $appointment['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAppointmentModalLabel-<?= $appointment['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAppointmentModalLabel-<?= $appointment['id']; ?>">Edit Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('/assistant/edit_appointment/' . $appointment['id']); ?>">
                        <div class="form-group">
                            <label for="editPatientId-<?= $appointment['id']; ?>">Patient ID</label>
                            <input type="text" class="form-control" id="editPatientId-<?= $appointment['id']; ?>" name="patient_id" value="<?= $appointment['patient_id']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editDoctorId-<?= $appointment['id']; ?>">Doctor ID</label>
                            <input type="text" class="form-control" id="editDoctorId-<?= $appointment['id']; ?>" name="doctor_id" value="<?= $appointment['doctor_id']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editAppointmentDate-<?= $appointment['id']; ?>">Appointment Date</label>
                            <input type="datetime-local" class="form-control" id="editAppointmentDate-<?= $appointment['id']; ?>" name="appointment_date" value="<?= date('Y-m-d\TH:i', strtotime($appointment['appointment_date'])); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editStatus-<?= $appointment['id']; ?>">Status</label>
                            <input type="text" class="form-control" id="editStatus-<?= $appointment['id']; ?>" name="status" value="<?= $appointment['status']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</body>
</html>
