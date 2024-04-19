<?php

include $_SERVER['DOCUMENT_ROOT'] . '/libs/load.php';
Session::ensureLogin();

// get the cart count using user id
$userId = Session::getUser()->getId();
$conn = Database::getConnection();
$sql = "SELECT COUNT(*) as count FROM cart WHERE user_id = $userId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['count'];
?>