<?php
$host = 'localhost'; // Ganti dengan host database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$database = 'pos_shop';

// Buat koneksi ke database
$mysqli = new mysqli($host, $username, $password, $database);

// Periksa apakah koneksi berhasil
if ($mysqli->connect_error) {
    die("Koneksi database gagal: " . $mysqli->connect_error);
}

// Sekarang Anda dapat menggunakan $mysqli untuk menjalankan query ke database.
?>