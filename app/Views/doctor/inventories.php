<!DOCTYPE html>
<html>
<head>
    <title>Manage Inventory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage Inventory</h2>
        <?php if (!empty($inventories)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventories as $inventory): ?>
                        <tr>
                            <td><?= $inventory['id']; ?></td>
                            <td><?= $inventory['item_name']; ?></td>
                            <td><?= $inventory['quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No inventory items found.</p>
        <?php endif; ?>
        <a href="<?= base_url('/doctor'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
