<?php
    include 'conn.php';
    include 'product_OOP.php';

$database = new Database();
$connection = $database->getConnection();

$product = new Product($connection);

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    if ($product->deleteProduct($product_id)) {
        header("Location: CRUDproduct.php");
        exit;
    } else {
        echo "Error: Gagal menghapus produk.";
    }
} else {
    echo "ID Produk tidak ditemukan.";
}

// Tutup koneksi database
$database->closeConnection();
?>