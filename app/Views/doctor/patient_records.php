<!DOCTYPE html>
<html>
<head>
    <title>Patient Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Patient Records for <?= $patient['name']; ?></h2>
        <?php if (!empty($treatments)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Doctor</th>
                        <th>Treatment Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($treatments as $treatment): ?>
                        <tr>
                            <td><?= $treatment['created_at']; ?></td>
                            <td><?= $treatment['doctor_name']; ?></td>
                            <td><?= $treatment['description']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No treatment records found for this patient.</p>
        <?php endif; ?>
        <a href="<?= base_url('/doctor/patients'); ?>" class="btn btn-secondary">Back to Patients</a>
    </div>
</body>
</html>
