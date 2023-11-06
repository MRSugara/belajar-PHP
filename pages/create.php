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
    
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_code = $_POST['product_code'];
    $is_active=$_POST['is_active'];
    $image = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    
    // Simpan gambar pertama ke direktori
    move_uploaded_file($file_tmp[0], "../assets/img/gambar/" . $image[0]);
    
    // Buat array untuk menyimpan nama gambar yang akan disimpan dalam file JSON
    $imageArray = array($image[0]);
    
    // Loop untuk menyimpan gambar tambahan ke direktori dan array
    for ($i = 1; $i < count($image); $i++) {
        move_uploaded_file($file_tmp[$i], "../assets/img/gambar/" . $image[$i]);
        $imageArray[] = $image[$i];
    }
    
    // Panggil metode tambahProduct
    if ($product->tambahProduct($product_name, $category_id, $product_code,$is_active, $imageArray) === true) {
        header("Location: CRUDproduct.php");
        exit;
    } else {
        echo "Error: Data produk tidak dapat disimpan.";
    }
    
    // Tutup koneksi database
    $database->closeConnection();
?>