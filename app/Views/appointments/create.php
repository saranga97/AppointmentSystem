<!DOCTYPE html>
<html>
<head>
    <title>Create Appointment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Create Appointment</h2>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('/appointments/store'); ?>" method="post">
                <div class="form-group">
                    <label for="doctor_id">Doctor:</label>
                    <select class="form-control" id="doctor_id" name="doctor_id" required>
                        <?php foreach ($doctors as $doctor): ?>
                            <option value="<?= $doctor['id']; ?>"><?= $doctor['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Date:</label>
                    <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Create Appointment</button>
            </form>
            <a href="<?= base_url('/patient/dashboard'); ?>" class="btn btn-secondary btn-block mt-3">Back to Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
