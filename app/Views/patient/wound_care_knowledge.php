<!DOCTYPE html>
<html>
<head>
    <title>Wound Care Knowledge</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .session-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .session-item h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-container">
            <h2 class="text-center">Wound Care Knowledge</h2>
            <?php if (!empty($wound_care_sessions)): ?>
                <div class="list-group">
                    <?php foreach ($wound_care_sessions as $session): ?>
                        <div class="list-group-item session-item">
                            <h3><?= $session['title']; ?></h3>
                            <p><?= $session['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center">No wound care sessions found.</p>
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
