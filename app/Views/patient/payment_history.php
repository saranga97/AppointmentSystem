<!DOCTYPE html>
<html>
<head>
    <title>Payment History</title>
</head>
<body>
    <h2>Payment History</h2>
    <?php if (!empty($payments)): ?>
        <ul>
            <?php foreach ($payments as $payment): ?>
                <li>Amount: <?= $payment['amount']; ?> - Date: <?= $payment['created_at']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No payment history found.</p>
    <?php endif; ?>
    <a href="<?= base_url('/patient/dashboard'); ?>">Back to Dashboard</a>
</body>
</html>
