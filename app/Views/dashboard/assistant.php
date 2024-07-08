<!DOCTYPE html>
<html>
<head>
    <title>Assistant Dashboard</title>
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
            <a href="<?= base_url('/assistant/appointments'); ?>" class="btn btn-primary">Manage Appointments</a>
            <a href="<?= base_url('/assistant/events'); ?>" class="btn btn-primary">Add Events</a>
            <a href="<?= base_url('/assistant/inventories'); ?>" class="btn btn-primary">Update Inventory</a>
            <a href="<?= base_url('/assistant/reports'); ?>" class="btn btn-primary">Generate Reports</a>
            <a href="<?= base_url('/auth/logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>
