<!DOCTYPE html>
<html>
<head>
    <title>Manage Inventory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <tr class="<?= $inventory['quantity'] < 100 ? 'low-inventory' : ''; ?>">
                            <td><?= $inventory['id']; ?></td>
                            <td><?= $inventory['item_name']; ?></td>
                            <td><?= $inventory['quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <canvas id="inventoryChart"></canvas>
        <?php else: ?>
            <p>No inventory items found.</p>
        <?php endif; ?>
        <a href="<?= base_url('/doctor'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>

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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
