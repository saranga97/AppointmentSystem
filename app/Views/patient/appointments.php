<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .appointments-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="appointments-container">
            <h2 class="text-center">Appointments</h2>
            <?php if (!empty($appointments)): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= $appointment['doctor_name']; ?></td>
                                <td><?= $appointment['appointment_date']; ?></td>
                                <td><?= $appointment['status']; ?></td>
                                <td>
                                    <?php if ($appointment['status'] == 'pending'): ?>
                                        <form action="<?= base_url('/patient/cancel_appointment/' . $appointment['id']); ?>" method="post" class="mb-0">
                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No appointments found.</p>
            <?php endif; ?>
            <a href="<?= base_url('/patient/dashboard'); ?>" class="btn btn-secondary btn-block mt-3">Back to Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
