<?php

$conn = new mysqli('localhost', 'root', '', 'linktree_clone');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $url = $conn->real_escape_string($_POST['url']);
    $sql = "INSERT INTO links (title, url) VALUES ('$title', '$url')";
    $conn->query($sql);
}

header('Location: index.php');
