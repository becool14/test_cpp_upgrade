<?php
include 'dbconfig.php';

$userId = $_POST['userId'];
$score = $_POST['score'];

$updateQuery = "UPDATE users SET points = points + $score WHERE user_id = $userId";
$conn->query($updateQuery);

$conn->close();
?>
