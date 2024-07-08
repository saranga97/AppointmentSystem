<!DOCTYPE html>
<html>
<head>
    <title>Track Patients</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Track Patients</h2>
        <?php if (!empty($patients)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td><?= $patient['id']; ?></td>
                            <td><?= $patient['name']; ?></td>
                            <td><?= $patient['email']; ?></td>
                            <td><?= $patient['phone']; ?></td>
                            <td><?= $patient['address']; ?></td>
                            <td>
                                <a href="<?= base_url('/admin/patient_records/' . $patient['id']); ?>" class="btn btn-info btn-sm">Watch Records</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No patients found.</p>
        <?php endif; ?>
        <a href="<?= base_url('/admin'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
