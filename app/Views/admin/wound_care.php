<!DOCTYPE html>
<html>
<head>
    <title>Manage Wound Care Sessions</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .form-control, .btn {
            margin-top: 10px;
        }
        .message {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Wound Care Sessions</h2>
        
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-info message"><?= session()->getFlashdata('message'); ?></div>
        <?php endif; ?>

        <?php if (empty($wound_care_sessions)): ?>
            <p class="text-center">There are no wound care sessions.</p>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wound_care_sessions as $session): ?>
                        <tr>
                            <td><?= $session['id']; ?></td>
                            <td><?= $session['title']; ?></td>
                            <td><?= $session['description']; ?></td>
                            <td>
                                <a href="<?= base_url('/admin/edit_wound_care/' . $session['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('/admin/delete_wound_care/' . $session['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <h3 class="text-center">Add Wound Care Session</h3>
        <form action="<?= base_url('/admin/add_wound_care'); ?>" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>

        <a href="<?= base_url('/admin'); ?>" class="btn btn-secondary btn-block mt-3">Back to Admin Dashboard</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
