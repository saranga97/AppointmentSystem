<!DOCTYPE html>
<html>
<head>
    <title>Recommendations and Prescriptions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Recommendations and Prescriptions</h2>
        <?php if (!empty($treatments)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Doctor</th>
                        <th>Prescribed Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($treatments as $treatment): ?>
                        <tr>
                            <td><?= $treatment['description']; ?></td>
                            <td><?= $treatment['doctor_name']; ?></td>
                            <td><?= $treatment['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No recommendations or prescriptions found.</p>
        <?php endif; ?>
        <a href="<?= base_url('/patient/dashboard'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
