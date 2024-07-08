<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .nav-link {
            color: #fff !important;
        }
        .nav-link:hover {
            background-color: #007bff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-header text-center">
            <h2>Welcome, <?= session()->get('username'); ?></h2>
            <p>Role: <?= session()->get('user_role'); ?></p>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/treatment_history'); ?>">View Treatment History</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/recommendations'); ?>">Check Recommendations and Prescriptions</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/payment_history'); ?>">Generate Payment Receipts and Track Payment History</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/make_payment'); ?>">Proceed with Payments</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/wound_dressing_alerts'); ?>">Get Alerts on Wound Dressing Changes</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/appointments/create'); ?>">Make an Appointment</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/appointments'); ?>">View and Cancel Appointments</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/enquiries'); ?>">Send Enquiries</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/wound_care_knowledge'); ?>">Update Knowledge on Wound Care</a>
            <a class="nav-link bg-primary text-white mb-2 p-3" href="<?= base_url('/patient/notifications'); ?>">View Notifications</a> <!-- New Link -->
            <a class="nav-link bg-danger text-white mb-2 p-3" href="<?= base_url('/auth/logout'); ?>">Logout</a>
        </nav>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
