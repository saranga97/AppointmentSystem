<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h2>Manage Users</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUserModal-<?= $user['id']; ?>">Edit</button>
                        <a href="<?= base_url('/admin/delete_user/' . $user['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addDoctorModal">Add Doctor</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addAssistantModal">Add Assistant</button>
        <canvas id="userRoleChart"></canvas>
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-secondary btn-block mt-3">Back to Dashboard</a>
    </div>

    <!-- Add Doctor Modal -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDoctorModalLabel">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('/admin/add_doctor'); ?>">
                        <div class="form-group">
                            <label for="doctorName">Name</label>
                            <input type="text" class="form-control" id="doctorName" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="doctorPassword">Password</label>
                            <input type="password" class="form-control" id="doctorPassword" name="password" required>
                        </div>
                        <input type="hidden" name="role" value="doctor">
                        <button type="submit" class="btn btn-primary">Add Doctor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Assistant Modal -->
    <div class="modal fade" id="addAssistantModal" tabindex="-1" role="dialog" aria-labelledby="addAssistantModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAssistantModalLabel">Add Assistant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('/admin/add_assistant'); ?>">
                        <div class="form-group">
                            <label for="assistantName">Name</label>
                            <input type="text" class="form-control" id="assistantName" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="assistantPassword">Password</label>
                            <input type="password" class="form-control" id="assistantPassword" name="password" required>
                        </div>
                        <input type="hidden" name="role" value="assistant">
                        <button type="submit" class="btn btn-primary">Add Assistant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <?php foreach ($users as $user): ?>
    <div class="modal fade" id="editUserModal-<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel-<?= $user['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel-<?= $user['id']; ?>">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('/admin/edit_user/' . $user['id']); ?>">
                        <div class="form-group">
                            <label for="editUsername-<?= $user['id']; ?>">Username</label>
                            <input type="text" class="form-control" id="editUsername-<?= $user['id']; ?>" name="username" value="<?= $user['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="editRole-<?= $user['id']; ?>">Role</label>
                            <select class="form-control" id="editRole-<?= $user['id']; ?>" name="role">
                                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                <option value="doctor" <?= $user['role'] == 'doctor' ? 'selected' : ''; ?>>Doctor</option>
                                <option value="assistant" <?= $user['role'] == 'assistant' ? 'selected' : ''; ?>>Assistant</option>
                                <option value="patient" <?= $user['role'] == 'patient' ? 'selected' : ''; ?>>Patient</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('userRoleChart').getContext('2d');
            var users = <?= json_encode($users); ?>;
            var roleCounts = users.reduce(function(counts, user) {
                counts[user.role] = (counts[user.role] || 0) + 1;
                return counts;
            }, {});

            var labels = Object.keys(roleCounts);
            var data = Object.values(roleCounts);

            var userRoleChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Count of Users by Role',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
