<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .dashboard-container h2 {
            margin-bottom: 20px;
        }
        .dashboard-container .btn {
            margin: 10px 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-container">
            <h2>Welcome, <?= session()->get('username'); ?></h2>
            <p>Role: <?= session()->get('user_role'); ?></p>
            <a href="<?= base_url('/admin/manage_users'); ?>" class="btn btn-primary">Manage Users</a>
            <a href="<?= base_url('/admin/manage_appointments'); ?>" class="btn btn-primary">Manage Appointments</a>
            <a href="<?= base_url('/admin/manage_inventories'); ?>" class="btn btn-primary">Manage Inventory</a>
            <a href="<?= base_url('/admin/wound_care'); ?>" class="btn btn-primary">Upload Wound Care Sessions</a>
            <a href="<?= base_url('/admin/toggle_system_status'); ?>" class="btn btn-warning">Toggle System Status</a>
            <a href="<?= base_url('/auth/logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
