<!DOCTYPE html>
<html>
<head>
    <title>Edit Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Report</h2>
        <form method="post" action="<?= base_url('/assistant/update_report/' . $report['id']); ?>">
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
        <a href="<?= base_url('/assistant/reports'); ?>" class="btn btn-secondary">Back to Reports</a>
    </div>
</body>
</html>
