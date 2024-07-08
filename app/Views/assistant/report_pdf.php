<!DOCTYPE html>
<html>
<head>
    <title>Report PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .report-details {
            margin-bottom: 20px;
        }
        .report-details label {
            font-weight: bold;
        }
        .report-content {
            border: 1px solid #ddd;
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2>Report Details</h2>
    <div class="report-details">
        <p><label>Report ID:</label> <?= $report['id']; ?></p>
        <p><label>Patient ID:</label> <?= $report['patient_id']; ?></p>
    </div>
    <div class="report-content">
        <?= nl2br($report['content']); ?>
    </div>
</body>
</html>
