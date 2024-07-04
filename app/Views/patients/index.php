<!DOCTYPE html>
<html>
<head>
    <title>Patients</title>
</head>
<body>
    <h1>Patients</h1>
    <a href="/patients/create">Add New Patient</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        <?php foreach ($patients as $patient): ?>
        <tr>
            <td><?= $patient['id'] ?></td>
            <td><?= $patient['name'] ?></td>
            <td><?= $patient['email'] ?></td>
            <td><?= $patient['phone'] ?></td>
            <td><?= $patient['address'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
