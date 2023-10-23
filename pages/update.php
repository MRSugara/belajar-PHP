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
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
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
        <!-- <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="#">Sign out</a>
        </div>
      </div> -->
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
                            <a class="nav-link" href="pages/login.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/product.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/dashboard.php">
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

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Product</h1>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Kembali</button>
                <?php
                    // include database connection file
                    include "koneksi.php";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Get the form data
                        $product_id = $_POST["id"];
                        $product_name = $_POST["product_name"];
                        $category_id = $_POST["category_id"];
                        $code = $_POST["product_code"];

                        // Update the data in the database
                        $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', product_code='$code'WHERE id='$product_id'";
                        if (mysqli_query($mysqli, $sql)) {
                          echo "<script> window.location.href='CRUDproduct.php'</script>";

                        //   header('location:CRUDproduct.php');
                          
                        } 
                      }

                    $id = $_GET['id'];

                    // Fetech user data based on id
                    $result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

                    while ($user_data = mysqli_fetch_array($result)) {
                        $name = $user_data['product_name'];
                        $code = $user_data['product_code'];
                        $category = $user_data['category_id'];
                        $active = $user_data['is_active'];

                    }
                    ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="input" class="form-control" id="product_name" name="product_name" value=<?php echo $name; ?> autofocus
                                    autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id">
                                <?php
                                    include 'koneksi.php';
                                    $query_create = mysqli_query($mysqli, "SELECT * FROM product_categories") or die(mysqli_error($mysqli));
                                    while ($data = mysqli_fetch_array($query_create)) {
                                        echo "<option value=$data[id]> $data[category_name] </option>";
                                    }
                                ?>  
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_code" class="form-label">Kode Produk</label>
                                <input type="input" class="form-control" id="product_code" name="product_code"
                                    autocomplete="off" required value=<?php echo $code; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="form-label">Keaktifan</label>
                                <select class="form-select" id="is_active" name="is_active">
                                    <option value=1>Aktif</option>
                                    <option value=0>Tidak Aktif</option>

                                </select>
                            </div>
                            <input type="hidden" name="id" 
                            value=<?php 
                            include "koneksi.php";
                            $coba = mysqli_query($mysqli, "SELECT * FROM products");
                                while($data = mysqli_fetch_array($coba)){
                                    echo $data['id'];
                                }
                             ?>>
                            <button type="submit" name="update" class="btn btn-primary m-2">Update data</button>
                        </form>


                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
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