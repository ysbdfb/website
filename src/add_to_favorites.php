<?php
session_start();
require_once "config.php";
require_once "auth.php";

header('Content-Type: text/plain');

if (!is_logged_in()) {
    echo "not_logged_in";
    exit();
}

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    echo "db_error";
    exit();
}

$recipe_id = intval($_POST['recipe_id'] ?? 0);
$user_id   = $_SESSION['user_id'];

if ($recipe_id <= 0) {
    echo "invalid_id";
    exit();
}

$check = $conn->prepare("SELECT 1 FROM favorites WHERE user_id = ? AND recipe_id = ?");
$check->bind_param("ii", $user_id, $recipe_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "already";
} else {
    $stmt = $conn->prepare("INSERT INTO favorites (user_id, recipe_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $recipe_id);
    $stmt->execute();
    echo "added";
    $stmt->close();
}

$check->close();
$conn->close();
?>