<!DOCTYPE html>
<html>
<head>
    <title>Manage Inventories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Manage Inventories</h2>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-info"><?= session()->getFlashdata('message'); ?></div>
        <?php endif; ?>
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
                <tr>
                    <td><?= $inventory['id']; ?></td>
                    <td><?= $inventory['item_name']; ?></td>
                    <td><?= $inventory['quantity']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editInventoryModal-<?= $inventory['id']; ?>">Edit</button>
                        <a href="<?= base_url('/assistant/delete_inventory/' . $inventory['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#addInventoryModal">Add Inventory</button> -->
        <a href="<?= base_url('/dashboard'); ?>" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <!-- Add Inventory Modal -->
    <!-- <div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addInventoryModalLabel">Add Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/assistant/add_inventory'); ?>" method="post">
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
    </div> -->

    <!-- Edit Inventory Modals -->
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
                    <form action="<?= base_url('/assistant/edit_inventory/' . $inventory['id']); ?>" method="post">
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

    <script>
        $(document).ready(function(){
            // Fix modal issue with dynamic data
            $('#editInventoryModal').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var id = button.data('id');
                var item_name = button.data('item_name');
                var quantity = button.data('quantity');

                var modal = $(this);
                modal.find('.modal-body #item_name').val(item_name);
                modal.find('.modal-body #quantity').val(quantity);
            });
        });
    </script>
</body>
</html>
