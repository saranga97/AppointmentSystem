<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
</head>
<body>
    <h1>Appointments</h1>
    <a href="/appointments/create">Add New Appointment</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php foreach ($appointments as $appointment): ?>
        <tr>
            <td><?= $appointment['id'] ?></td>
            <td><?= $appointment['patient_id'] ?></td>
            <td><?= $appointment['doctor_id'] ?></td>
            <td><?= $appointment['appointment_date'] ?></td>
            <td><?= $appointment['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
