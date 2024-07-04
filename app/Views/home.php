<!DOCTYPE html>
<html>
<head>
    <title>Appointment System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .welcome-container h1 {
            margin-bottom: 30px;
        }
        .welcome-container a {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-container">
            <h1>Welcome to the Appointment System</h1>
            <a href="<?= base_url('/make-appointment'); ?>" class="btn btn-primary btn-block">Make an Appointment</a>
            <a href="<?= base_url('/login'); ?>" class="btn btn-secondary btn-block">Login</a>
            <a href="<?= base_url('/register'); ?>" class="btn btn-success btn-block">Sign Up</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
