<?php
session_start(); 

include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header('Location: dashboard.php'); 
        exit();
    }
}

$_SESSION['login_error'] = 'Email atau password salah'; 
header('Location: login.php'); 
exit();

$mysqli->close();
?>