<!DOCTYPE html>
<html>
<head>
    <title>Treatment History</title>
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
        .treatment-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-container">
            <h2 class="text-center">Treatment History</h2>
            <?php if (!empty($treatments)): ?>
                <div class="list-group">
                    <?php foreach ($treatments as $treatment): ?>
                        <div class="list-group-item treatment-item">
                            <p><?= $treatment['description']; ?> <br><small>(<?= $treatment['created_at']; ?>)</small></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center">No treatment history found.</p>
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
