<!DOCTYPE html>
<html>
<head>
    <title>Add Treatment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Treatment</h2>
        <form action="<?= base_url('/doctor/store_treatment'); ?>" method="post">
            <input type="hidden" name="patient_id" value="<?= $patient_id; ?>">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price (LKR):</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Treatment</button>
        </form>
        <a href="<?= base_url('/doctor/appointments'); ?>" class="btn btn-secondary">Back to Appointments</a>
    </div>
</body>
</html>
