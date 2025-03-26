<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT jina, mining_balance FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

echo "<h2>Karibu, " . $user['jina'] . "!</h2>";
echo "<p>Mining Balance: " . $user['mining_balance'] . " TZS</p>";
echo "<a href='mining.php'>Anza Mining</a><br>";
echo "<a href='withdraw.php'>Toa Pesa</a><br>";
echo "<a href='pay.php'>Lipa 23,000 TZS ili kuendelea</a><br>";
echo "<a href='logout.php'>Toka</a>";
?>
