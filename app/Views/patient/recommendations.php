<!DOCTYPE html>
<html>
<head>
    <title>Recommendations</title>
</head>
<body>
    <h2>Recommendations</h2>
    <?php if (!empty($recommendations)): ?>
        <ul>
            <?php foreach ($recommendations as $recommendation): ?>
                <li><?= $recommendation['description']; ?> (<?= $recommendation['created_at']; ?>)</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No recommendations found.</p>
    <?php endif; ?>
    <a href="<?= base_url('/patient/dashboard'); ?>">Back to Dashboard</a>
</body>
</html>
