<!DOCTYPE html>
<html>
<head>
    <title>Manage Reports</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Manage Reports</h2>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-info"><?= session()->getFlashdata('message'); ?></div>
        <?php endif; ?>
        <?php if (!empty($reports)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient ID</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report): ?>
                        <tr>
                            <td><?= $report['id']; ?></td>
                            <td><?= $report['patient_id']; ?></td>
                            <td><?= $report['content']; ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editReportModal-<?= $report['id']; ?>">Edit</button>
                                <a href="<?= base_url('/assistant/delete_report/' . $report['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                <a href="<?= base_url('/assistant/download_report/' . $report['id']); ?>" class="btn btn-info btn-sm">Download PDF</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reports found.</p>
        <?php endif; ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addReportModal">Add Report</button>
        <a href="<?= base_url('/dashboard'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <!-- Add Report Modal -->
    <div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="addReportModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">Add Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/assistant/add_report'); ?>" method="post">
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Report Modals -->
    <?php foreach ($reports as $report): ?>
    <div class="modal fade" id="editReportModal-<?= $report['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editReportModalLabel-<?= $report['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReportModalLabel-<?= $report['id']; ?>">Edit Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/assistant/edit_report/' . $report['id']); ?>" method="post">
                        <div class="form-group">
                            <label for="id">Report ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?= $report['id']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" value="<?= $report['patient_id']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" required><?= $report['content']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</body>
</html>
