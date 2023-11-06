<?php
class Product {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getProducts($page, $per_page, $search = '') {
        $start_from = ($page - 1) * $per_page;
        
        $sql = "SELECT id, product_name, category_id, product_code, is_active, image 
                FROM products 
                WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'
                LIMIT $per_page OFFSET $start_from";
        
        $result = $this->connection->query($sql);
        return $result;
    }

    public function searchProducts($search, $per_page, $start_from) {
        $sql = "SELECT id, product_name, category_id, product_code, is_active, image
                FROM products 
                WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' 
                LIMIT $per_page OFFSET $start_from";
    
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getTotalRecords() {
        $sql = "SELECT COUNT(id) FROM products";
        $result = $this->connection->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    // Tambah Product
    public function tambahProduct($product_name, $category_id, $product_code, $is_active, $images) {
        $imagesJson = json_encode($images);
    
        $sql = "INSERT INTO products (product_name, category_id, product_code, is_active , image) 
                VALUES ('$product_name', '$category_id', '$product_code', $is_active, '$imagesJson')";
    
        return $this->connection->query($sql);
    }

    public function editProduct($product_id, $product_name, $category_id, $product_code, $is_active, $new_images) {
        $new_images_array = [];
        if (!empty($new_images['name'][0])) {
            $total_images = count($new_images['name']);
            for ($i = 0; $i < $total_images; $i++) {
                $new_image_name = $new_images['name'][$i];
                $file_tmp = $new_images['tmp_name'][$i];
                $target_path = "../assets/img/gambar/" . $new_image_name;
    
                if (move_uploaded_file($file_tmp, $target_path)) {
                    $new_images_array[] = $new_image_name;
                }
            }
        }
    
        if (!empty($new_images_array)) {

            $new_images_json = json_encode($new_images_array);
    
            $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', product_code='$product_code', is_active=$is_active, image='$new_images_json' WHERE id='$product_id'";
        } else {
            $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id',
            product_code='$product_code',is_active=$is_active WHERE id='$product_id'";
        }
    
        return $this->connection->query($sql);
    }


        public function deleteProduct($product_id) {

            $sql = "DELETE FROM products WHERE id = $product_id";
        
            if ($this->connection->query($sql) === true) {
                return true;
            } else {
                return false;
            }
        }
}

?>