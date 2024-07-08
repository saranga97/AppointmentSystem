<!DOCTYPE html>
<html>
<head>
    <title>Manage Appointments</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage Appointments</h2>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-info"><?= session()->getFlashdata('message'); ?></div>
        <?php endif; ?>

        <?php if (!empty($appointments)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= $appointment['id']; ?></td>
                            <td><?= $appointment['patient_id']; ?></td>
                            <td><?= $appointment['appointment_date']; ?></td>
                            <td>
                                <form action="<?= base_url('/doctor/update_appointment_status/' . $appointment['id']); ?>" method="post">
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Pending" <?= $appointment['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Approved" <?= $appointment['status'] == 'approved' ? 'selected' : ''; ?>>Approved</option>
                                        <option value="Completed" <?= $appointment['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                        <option value="Cancelled" <?= $appointment['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <?php if ($appointment['status'] == 'completed'): ?>
                                    <a href="<?= base_url('/doctor/add_treatment/' . $appointment['id']); ?>" class="btn btn-primary btn-sm">Add Treatment</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No appointments found.</p>
        <?php endif; ?>
        <a href="<?= base_url('/doctor'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
