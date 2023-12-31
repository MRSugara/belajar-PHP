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
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link" aria-current="page" href="../index.php">
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
            <!--  <li class="nav-item">
                <a class="nav-link" href="#">
                  <span
                    data-feather="bar-chart-2"
                    class="align-text-bottom"
                  ></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers" class="align-text-bottom"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6
              class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"
            >
              <span>Saved reports</span>
              <a class="link-secondary" href="#" aria-label="Add a new report">
                <span
                  data-feather="plus-circle"
                  class="align-text-bottom"
                ></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span
                    data-feather="file-text"
                    class="align-text-bottom"
                  ></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span
                    data-feather="file-text"
                    class="align-text-bottom"
                  ></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span
                    data-feather="file-text"
                    class="align-text-bottom"
                  ></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span
                    data-feather="file-text"
                    class="align-text-bottom"
                  ></span>
                  Year-end sale
                </a>
              </li>
            </ul> -->
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Products</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">
                Share
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary">
                Export
              </button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar" class="align-text-bottom"></span>
              This week
            </button>
          </div>
        </div>
        <div class="row justify-content-center" id="card">
          <?php
          $products = [
            ["img" => "../assets/img/aoc.png", "title" => "aoc", "price" => "Rp.2.000.000"],
            ["img" => "../assets/img/koorui.jpeg", "title" => "koorui", "price" => "Rp.1.600.000"],
            ["img" => "../assets/img/asus249qgr.jpeg", "title" => "asus", "price" => "Rp.2.200.000"],
            ["img" => "../assets/img/download.jpeg", "title" => "samsung", "price" => "Rp.2.000.000"],
            ["img" => "../assets/img/samsungcr24f390.jpeg", "title" => "Samsung CR24f390", "price" => "Rp.2.100.000"],
            ["img" => "../assets/img/samsungsr35.jpeg", "title" => "Samsung SR35", "price" => "Rp.3.800.000"],
            ["img" => "../assets/img/samsung.jpg", "title" => "Samsung", "price" => "Rp.1.200.000"],
            ["img" => "../assets/img/msig241vc.jpeg", "title" => "MSI G241VC", "price" => "Rp.1.950.000"],
            ["img" => "../assets/img/aoc24eg2e5.jpeg", "title" => "AOC 24EG2E5", "price" => "Rp.1.650.000"]
          ];
          foreach ($products as $key => $value) {
            echo "<div class='card m-2' style='width: 18rem;'> <img src='{$value["img"]}' class='card-img-top mt-2' alt='...''> <div class='card-body col-12 text-align-center'> <h5 class='card-title text-center'> {$value["title"]}</h5> <p class='card-text text-center'>{$value["price"]}</p> </div> </div> ";
          }
          ?>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
  </script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>