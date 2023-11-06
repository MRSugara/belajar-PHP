<?php
include 'conn.php';
include 'product_OOP.php';

// Membuat objek koneksi database
$database = new Database();
$connection = $database->getConnection();

$product = new Product($connection);

    if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
    }
    
$per_page = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $per_page;
if ($page == 1) {
    $start_from = 0;
} else if ($page == 2) {
    $start_from = 10;
}

// Search Produk
if (isset($_POST['search_button'])) {
    $search = $_POST['search'];
    $products = $product->searchProducts($search, $per_page, $start_from);
} else {
    $products = $product->getProducts($per_page, $start_from);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.108.0" />
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }


    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
            inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -0.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search" />
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="logout.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Landing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CRUDproduct.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                CRUDProducts
                            </a>
                        </li>
                        <!--   <li class="nav-item">
                <a class="nav-link" href="#">
                  <span
                    data-feather="bar-chart-2"
                    class="align-text-bottom"
                  ></span>
                  Reports
                </a>
              </li>-->

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Product</h1>
                </div>
                <div class="card mb-4 col-4">
                    <div class="card-body">
                        <form action="create.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="input" class="form-control" id="product_name" name="product_name" autofocus
                                    autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id">Category:</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="" selected>Select</option>
                                    <option value="1">Sports</option>
                                    <option value="2">Daily</option>
                                    <option value="3">Accessories</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_code" class="form-label">Kode Produk</label>
                                <input type="input" class="form-control" id="product_code" name="product_code" autofocus
                                    autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="form-label">Keaktifan</label>
                                <select class="form-select" id="is_active" name="is_active">
                                    <option value=1>Aktif</option>
                                    <option value=0>Tidak Aktif</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" name="image[]" id="image" multiple accept=".jpg, .jpeg, .png, .gif"
                                    multiple>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary m-2">Create data</button>
                        </form>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">

                        <table class="table table-striped table-sm">
                            <div class="col-12 d-flex justify-content-between">
                                <div>

                                </div>
                                <div class="col-3 d-flex">
                                    <form action="" method="post">
                                        <input type="text" name="search" class="form-control mx-2"
                                            placeholder="Cari...">
                                        <button type="submit" name="search_button"
                                            class="btn btn-primary mx-2">Cari</button>
                                    </form>
                                </div>

                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">kategori</th>
                                    <th scope="col">Keaktifan</th>
                                    <th scope="col">Code Product</th>
                                    <th scope="col">Gambar</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // Array category
                                $categories = array(
                                    1 => 'Sports',
                                    2 => 'Daily',
                                    3 => 'Accessories',
                                );
                                $is_actives = array(
                                1 => 'aktif',
                                0 => 'Non aktif',
                                
                                );
                                // Periksa koneksi
                                if ($connection->connect_error) {
                                    die("Koneksi gagal: " . $connection->connect_error);
                                }

                                $per_page = 10;
                                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                                $start_from = ($page - 1) * $per_page;
                                if ($page == 1) {
                                    $start_from = 0;
                                } else if ($page == 2) {
                                    $start_from = 10;
                                }
                                // Search
                                if (isset($_POST['search_button'])) {
                                    $search = $_POST['search'];

                                    // Query untuk mengambil data
                                    $sql = "SELECT id, product_name, category_id, product_code, is_active, created_at, updated_at, created_by, updated_by, description, price, unit, discount_amount, stock, image
                        FROM products
                        WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'
                        LIMIT $per_page OFFSET $start_from";
                                } else {
                                    $sql = "SELECT id, product_name, category_id, product_code, is_active, created_at, updated_at, created_by, updated_by, description, price, unit, discount_amount, stock, image
                        FROM products
                        LIMIT $per_page OFFSET $start_from";
                                }

                                $result = $connection->query($sql);

                                // Menampilkan data dalam HTML
                                $i = 1 + $start_from;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row["product_name"] . "</td>";
                                        echo "<td>" . $categories[$row["category_id"]] . "</td>";
                                        echo "<td>" . $row["product_code"] . "</td>";
                                        echo "<td>" . $is_actives[$row["is_active"]] . "</td>";
                                        echo "<td>";
                                        // Uraikan JSON gambar menjadi array
                                        $imagesArray = json_decode($row["image"], true);

                                        
                                        if (!empty($imagesArray)) {
                                            // Loop
                                            foreach ($imagesArray as $image) {
                                                echo '<div style="margin-bottom: 10px;">';
                                                echo '<img src="../assets/img/gambar/' . $image . '" alt="image" style="width: 50px; height: 50px;">';
                                                echo '</div>';
                                            }
                                        } else {
                                            
                                            echo 'Tidak ada gambar';
                                        }
                                        echo "</td>";
                                        echo '<td>
                                                <a href="update.php?id=' . $row["id"] . '" class="badge bg-warning"><span
                                                        data-feather="edit"></span></a>
                                                <a href="delete.php?id=' . $row["id"] . '" class="badge bg-danger"><span
                                                        data-feather="trash-2"></span></a>
                                            </td>';
                                        echo "</tr>";
                                        $i++;
                                    }
                                } else {
                                    echo "Data tidak ditemukan.";
                                }
                                ?>

                                </td>

                                </tr>
                            </tbody>
                        </table>
                        <?php
                        // Pagination
                        $sql = "SELECT COUNT(id) FROM products";
                        $result = $connection->query($sql);
                        $row = $result->fetch_row();
                        $total_records = $row[0];
                        $total_pages = ceil($total_records / $per_page);

                        echo "<ul class='pagination'>";
                        if ($page > 1) {
                            echo "<li class='page-item'><a class='page-link' href='CRUDproduct.php?page=" . ($page - 1) . "'>Previous</a></li>";
                        }

                        for ($i = max(1, $page - 2); $i <= min($page + 2, $total_pages); $i++) {
                            echo "<li class='page-item ";
                            if ($i == $page) {
                                echo "active";
                            }
                            echo "'><a class='page-link' href='CRUDproduct.php?page=" . $i . "'>" . $i . "</a></li>";
                        }

                        if ($page < $total_pages) {
                            echo "<li class='page-item'><a class='page-link' href='CRUDproduct.php?page=" . ($page + 1) . "'>Next</a></li>";
                        }
                        echo "</ul>";
                        ?>

                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
    feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/datatables-demo.js"></script>


</body>

</html>