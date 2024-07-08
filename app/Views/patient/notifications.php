<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .notifications-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .notification-item {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="notifications-container">
            <h2 class="text-center">Notifications</h2>
            <?php if (!empty($notifications)): ?>
                <ul class="list-unstyled">
                    <?php foreach ($notifications as $notification): ?>
                        <li class="notification-item">
                            <?= $notification['message']; ?> <br>
                            <small class="text-muted"><?= date('Y-m-d H:i:s', strtotime($notification['created_at'])); ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-center">No notifications found.</p>
            <?php endif; ?>
            <a href="<?= base_url('/patient/dashboard'); ?>" class="btn btn-secondary btn-block mt-3">Back to Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
