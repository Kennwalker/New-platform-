<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jina = $_POST['jina'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE jina='$jina'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
    } else {
        echo "Jina au nywila si sahihi!";
    }
}
?>
