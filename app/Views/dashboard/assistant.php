<!DOCTYPE html>
<html>
<head>
    <title>Assistant Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= session()->get('username'); ?></h2>
    <p>Role: <?= session()->get('user_role'); ?></p>
    <a href="<?= base_url('/appointments'); ?>">Manage Appointments</a>
    <a href="<?= base_url('/events'); ?>">Add Events</a>
    <a href="<?= base_url('/inventories'); ?>">Update Inventory</a>
    <a href="<?= base_url('/reports'); ?>">Generate Reports</a>
    <a href="<?= base_url('/auth/logout'); ?>">Logout</a>
</body>
</html>
