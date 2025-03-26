<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Lazima uingie kwanza.");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT mining_balance, last_mined_time FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$now = time();
$last_mined = strtotime($user['last_mined_time']);

if ($now - $last_mined >= 60) {
    $mining_amount = 500;
    $new_balance = $user['mining_balance'] + $mining_amount;
    
    $sql = "UPDATE users SET mining_balance='$new_balance', last_mined_time=NOW() WHERE id='$user_id'";
    $conn->query($sql);
    
    echo "Umeongeza " . $mining_amount . " TZS kwenye balance yako.";
} else {
    echo "Subiri dakika 1 kabla ya kupata pesa tena.";
}
?>
