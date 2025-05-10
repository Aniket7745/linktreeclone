<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'linktree_clone');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Delete link
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM links WHERE id = $id";
    $conn->query($sql);
}

header('Location: index.php');
