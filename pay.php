<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Lazima uingie kwanza.");
}

$user_id = $_SESSION['user_id'];
$amount = 23000;

$sql = "UPDATE users SET mining_balance=mining_balance + $amount WHERE id='$user_id'";
$conn->query($sql);

echo "Umefanikiwa kulipa " . $amount . " TZS. Sasa unaweza kuendelea na mining!";
?>
