<!DOCTYPE html>
<html>
<head>
    <title>Treatments</title>
</head>
<body>
    <h1>Treatments</h1>
    <a href="/treatments/create">Add New Treatment</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Description</th>
        </tr>
        <?php foreach ($treatments as $treatment): ?>
        <tr>
            <td><?= $treatment['id'] ?></td>
            <td><?= $treatment['patient_id'] ?></td>
            <td><?= $treatment['description'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
