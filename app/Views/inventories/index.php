<!DOCTYPE html>
<html>
<head>
    <title>Inventories</title>
</head>
<body>
    <h1>Inventories</h1>
    <a href="/inventories/create">Add New Inventory Item</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($inventories as $inventory): ?>
        <tr>
            <td><?= $inventory['id'] ?></td>
            <td><?= $inventory['item_name'] ?></td>
            <td><?= $inventory['quantity'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
