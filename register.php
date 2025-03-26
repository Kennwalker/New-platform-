<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jina = $_POST['jina'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (jina, password) VALUES ('$jina', '$password')";
    
    if ($conn->query($sql)) {
        echo "Umefanikiwa kujisajili! <a href='login.html'>Ingia</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
