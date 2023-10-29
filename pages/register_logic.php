<?php
include 'koneksi.php';

$nama = $_POST['name'];
$email = $_POST['email'];
$no_hp = $_POST['phone_number'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password untuk keamanan

$username = $no_hp;

$sql = "INSERT INTO users (username, name, email, phone_number, password, group_id) 
VALUES ('$username', '$nama', '$email', '$no_hp', '$password', 3)";

if ($mysqli->query($sql) === TRUE) {
    echo "Register Sukses";
    header('location: login.php');
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>