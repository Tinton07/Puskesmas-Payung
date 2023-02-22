<?php
include('../connection.php');
session_start();

// periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: /puskesmas/admin/login.php');
  exit;
}

$user = mysqli_query($conn, "SELECT * FROM admin WHERE username='$_SESSION[username]'");
$data_user = mysqli_fetch_assoc($user);

$berita = mysqli_query($conn, 'SELECT * FROM berita ORDER BY id_berita DESC');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>News</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        * {
            font-family: 'Poppins';
        }
    </style>
    
    <style>

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
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
    <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Puskesmas Payung</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">Search</span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="/puskesmas/admin/logout.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/puskesmas/admin">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">
                                <span data-feather="book" class="align-text-bottom"></span>
                                News
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Team
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Slider Foto
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <h1 class="mt-5">News</h1>
                <a href="add-news.php" class="btn rounded-pill btn-primary">+ Buat Berita</a>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tanggal Posting</th>
                            <th scope="col">Dilihat</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $no = 1;
                        while ($b = mysqli_fetch_array($berita)) { 
                        ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $no++ ?></th>
                            <td><?= $b['judul'] ?></td>
                            <td><?= $b['kategori'] ?></td>
                            <td><?= date('d M Y', strtotime($b['tgl_posting'])) ?></td>
                            <td><?= $b['dilihat'] ?></td>
                            <td class="text-center">
                                <a href="update-news.php?id=<?= $b['id_berita'] ?>" class="btn rounded-pill btn-sm btn-warning">Edit</a>
                                <?php if($data_user['level'] == 'kepala') { ?>
                                    <a href="functions/fn_news.php?act=delete&id=<?= $b['id_berita'] ?>" class="btn rounded-pill btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </main>
        </div>
    </div>


    <script src="./assets/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="./assets/js/dashboard.js"></script>
</body>

</html>