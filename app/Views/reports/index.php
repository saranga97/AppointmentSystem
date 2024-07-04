<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
</head>
<body>
    <h1>Reports</h1>
    <a href="/reports/create">Add New Report</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Content</th>
        </tr>
        <?php foreach ($reports as $report): ?>
        <tr>
            <td><?= $report['id'] ?></td>
            <td><?= $report['report_type'] ?></td>
            <td><?= $report['content'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
