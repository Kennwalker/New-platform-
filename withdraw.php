<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Lazima uingie kwanza.");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT mining_balance FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$min_withdraw = 85000;
$withdraw_fee = 23000;

if ($user['mining_balance'] >= $min_withdraw) {
    $new_balance = $user['mining_balance'] - $withdraw_fee;
    
    $sql = "UPDATE users SET mining_balance='$new_balance' WHERE id='$user_id'";
    $conn->query($sql);
    
    echo "Umetoa " . $min_withdraw . " TZS. Tafadhali weka " . $withdraw_fee . " TZS ili uendelee.";
} else {
    echo "Huna balance ya kutosha kutoa pesa.";
}
?>
