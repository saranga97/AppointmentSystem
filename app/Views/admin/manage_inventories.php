<!DOCTYPE html>
<html>
<head>
    <title>Manage Inventories</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .low-inventory {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Inventories</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventories as $inventory): ?>
                <tr class="<?= $inventory['quantity'] < 100 ? 'low-inventory' : ''; ?>">
                    <td><?= $inventory['id']; ?></td>
                    <td><?= $inventory['item_name']; ?></td>
                    <td><?= $inventory['quantity']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editInventoryModal-<?= $inventory['id']; ?>">Edit</button>
                        <a href="<?= base_url('/admin/delete_inventory/' . $inventory['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addInventoryModal">Add Inventory</button>
        <canvas id="inventoryChart"></canvas>
    </div>

    <!-- Add Inventory Modal -->
    <div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addInventoryModalLabel">Add Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/add_inventory'); ?>" method="post">
                        <div class="form-group">
                            <label for="id">Inventory ID</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Item Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Inventory Modal -->
    <?php foreach ($inventories as $inventory): ?>
    <div class="modal fade" id="editInventoryModal-<?= $inventory['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editInventoryModalLabel-<?= $inventory['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInventoryModalLabel-<?= $inventory['id']; ?>">Edit Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/edit_inventory/' . $inventory['id']); ?>" method="post">
                        <div class="form-group">
                            <label for="id">Inventory ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?= $inventory['id']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Item Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $inventory['item_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $inventory['quantity']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('inventoryChart').getContext('2d');
            var inventories = <?= json_encode($inventories); ?>;
            var labels = inventories.map(function(inventory) {
                return inventory.item_name;
            });
            var data = inventories.map(function(inventory) {
                return inventory.quantity;
            });
            var backgroundColors = inventories.map(function(inventory) {
                return inventory.quantity < 100 ? 'rgba(255, 99, 132, 0.2)' : 'rgba(75, 192, 192, 0.2)';
            });
            var borderColors = inventories.map(function(inventory) {
                return inventory.quantity < 100 ? 'rgba(255, 99, 132, 1)' : 'rgba(75, 192, 192, 1)';
            });

            var inventoryChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Quantity',
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
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
