<?php

$conn = new mysqli('localhost', 'root', '', 'linktree_clone');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


$sql = 'SELECT * FROM links';
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linktree Clone</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>My Links</h1>
    <form action="add_link.php" method="POST">
        <input type="text" name="title" placeholder="Enter link title" required>
        <input type="url" name="url" placeholder="Enter link URL" required>
        <button type="submit">Add Link</button>
    </form>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <a href="<?= htmlspecialchars($row['url']); ?>" target="_blank">
                    <?= htmlspecialchars($row['title']); ?>
                </a>
                <a href="delete_link.php?id=<?= $row['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
