<?php
session_start();
include 'conn.php';
include 'user.php';

$database = new Database();
$connection = $database->getConnection();

$user = new User($connection);

$username = $_POST['username'];
$password = $_POST['password'];

$storedUser = $user->login($username);

if ($storedUser) {
    $stored_password = $storedUser['password'];

    if ($password === $stored_password || password_verify($password, $stored_password)) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } 
} 

// Tutup koneksi database
$database->closeConnection();
?>