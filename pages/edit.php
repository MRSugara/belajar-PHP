<?php
include 'conn.php';
include 'product_OOP.php';

$database = new Database();
$connection = $database->getConnection();

$product = new Product($connection);

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_code = $_POST['product_code'];
    $is_active = $_POST['is_active'];
    $new_images = $_FILES['image'];

    // Panggil metode editProduct
    if ($product->editProduct($product_id, $product_name, $category_id, $product_code, $is_active, $new_images)) {
        header("Location: CRUDproduct.php");
        exit;
    } else {
        echo "Error: Data produk tidak dapat diubah.";
    }
}

// Tutup koneksi database
$database->closeConnection();
?>