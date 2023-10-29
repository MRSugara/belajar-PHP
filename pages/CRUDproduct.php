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

        <blade media|%20(min-width%3A%20768px)%20%7B%0D>.bd-placeholder-img-lg {
            font-size: 3.5rem;
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
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="input" class="form-control" id="product_name" name="product_name" autofocus
                                    autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <?php
                                    include 'koneksi.php';
                                    $query_create = mysqli_query($mysqli, "SELECT * FROM product_categories")or die(mysqli_error($mysqli));
                                    while($data = mysqli_fetch_array($query_create)){
                                        echo "<option value=$data[id]> $data[category_name] </option>";
                                    }
                                    ?>
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
                                <label for="gambar" class="form-label">Gambar</label>
                                <?php
                                        if (isset($data) && isset($data['image'])) {
                                        $gambarArray = json_decode($data['image']);
                                        foreach ($gambarArray as $gambar) {
                                            echo '<img src="../assets/img/gambar/' . $gambar . '" width="50" alt="gambar"><br>';
                                        }
                                        }
                                    ?>
                                <input type="file" name="gambar[]" id="gambar" multiple>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary m-2">Create data</button>
                        </form>
                        <?php

                            if (isset($_POST['submit'])) {
                                $namaProduct = $_POST["product_name"];
                                $kategoriProduct = $_POST["category_id"];
                                $kodeProduct = $_POST["product_code"];
                                $is_active = $_POST["is_active"];
                                $gambar = upload();
                              
                                mysqli_query($mysqli, "INSERT INTO products (product_name, category_id, product_code, is_active , image) VALUES ('$namaProduct', '$kategoriProduct', '$kodeProduct','$is_active', '$gambar')");

                            }
                            function upload(){
                                $gambarArray = array();
                                $files = $_FILES['gambar'];
                              
                                foreach($files['name'] as $key => $namaFile) {
                                  $ukuranFile = $files['size'][$key];
                                  $error = $files['error'][$key];
                                  $tmpName = $files['tmp_name'][$key];
                              
                                  if ($error === 4) {
                                    continue; 
                                  }
                              
                                  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
                                  $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
                                  $ekstensiGambar = strtolower($ekstensiGambar);
                              
                                  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                                    echo "<script>
                                            alert('Gambar $namaFile bukan file gambar (jpg, jpeg, png)'); 
                                          </script>";
                                    continue;
                                  }
                              
                                  if ($ukuranFile > 1000000) {
                                    echo "<script>
                                            alert('Gambar $namaFile terlalu besar!'); 
                                          </script>";
                                    continue;
                                  }
                              
                                  $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
                                  move_uploaded_file($tmpName, '../assets/img/gambar/' . $namaFileBaru);
                                  $gambarArray[] = $namaFileBaru;
                                }
                              
                                return json_encode($gambarArray);
                              }
                        ?>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">

                        <table class="table table-striped table-sm">
                            <div class="col-12 d-flex justify-content-between">
                                <div>

                                </div>
                                <div class="col-3 d-flex">
                                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                        <?php
                                            $kata_kunci="";
                                            if (isset($_POST['kata_kunci'])) {
                                                $kata_kunci=$_POST['kata_kunci'];
                                            }
                                        ?>
                                        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>"
                                            class="form-control mx-2" placeholder="Cari...">
                                        <button type="submit" name="cari" class="btn btn-primary mx-2">Cari</button>
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
                            <?php  
                            $limit = 3;
                            $page = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($page>1) ? ($page * $limit) - $limit : 0;	
                    
                            $previous = $page - 1;
                            $next = $page + 1;
                            
                            $data = mysqli_query($mysqli,"select * from products");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $limit);
                            $sortingColumn = "products.id";
                            $data_product = "SELECT products.*, product_categories.category_name AS category_name 
                            FROM products 
                            INNER JOIN product_categories ON products.category_id = product_categories.id 
                            ORDER BY $sortingColumn limit $halaman_awal, $limit";
                            $nomor = $halaman_awal+1;

                            if (isset($_POST['kata_kunci'])) {
                            $kata_kunci=trim($_POST['kata_kunci']);
                            $sql="SELECT * FROM products WHERE category_id LIKE '%".$kata_kunci."%' OR product_name LIKE '%".$kata_kunci."%' OR product_code LIKE '%".$kata_kunci."%'";
                            }else {
                            $sql=$data_product;
                            }
                        ?>
                            <tbody>
                                <?php
                                $result=mysqli_query($mysqli,$sql);
                                while ($data=mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?php echo $data['product_name']; ?></td>
                                    <td><?php echo $data['category_name']; ?></td>
                                    <td><?php if($data['is_active']){
                                        echo "Aktif";
                                    }else{
                                        echo "Tidak Aktif";
                                    } ?></td>
                                    <td><?php echo $data['product_code']; ?></td>
                                    <td>
                                        <?php
                                        $gambarArray = json_decode($data["image"]);
                                            if ($gambarArray !== null && is_array($gambarArray)) {
                                            foreach ($gambarArray as $gambar) {
                                                echo '<img src="../assets/img/gambar/' . $gambar . '" alt="gambar" width=80><br>';
                                            }
                                            }
                                        
                                            
                                        ?>

                                    </td>
                                    <td>
                                        <a href="update.php?id=<?php echo $data['id']; ?>"
                                            class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="badge bg-danger"><span
                                                data-feather="trash-2"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <ul class="pagination pt-3 justify-content-end">
                            <li class="page-item">
                                <a class="page-link"
                                    <?php if($page > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                            </li>
                            <?php 
                    for($x=1;$x<=$total_halaman;$x++){
                      ?>
                            <li class="page-item"><a class="page-link"
                                    href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                    }
                    ?>
                            <li class="page-item">
                                <a class="page-link"
                                    <?php if($page < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                            </li>
                        </ul>

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