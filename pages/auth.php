<?php

$valid_username = "user";
$valid_password = "password";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
