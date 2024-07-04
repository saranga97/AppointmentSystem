<!DOCTYPE html>
<html>
<head>
    <title>Fill Patient Details</title>
</head>
<body>
    <h2>Fill Patient Details</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
    <form action="<?= base_url('/appointments/store_patient_details'); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
    <a href="<?= base_url('/patient/dashboard'); ?>">Back to Dashboard</a>
</body>
</html>
