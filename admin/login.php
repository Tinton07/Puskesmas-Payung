<?php
session_start();

// periksa apakah pengguna sudah login
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header('Location: /puskesmas/admin');
    exit; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../assets/img/logo.png" rel="icon">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    * {
        font-family: 'Poppins';
    }
</style>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <img src="../assets/img/logo.png" alt="logo" width="50%" height="50%">
                                <br>
                                <br>
                                <h4 class="h4 text-gray-900 mb-4">
                                    <b>Selamat Datang di </b>
                                    <br>
                                    <b>Puskesmas Payung</b>
                                </h4>
                                <p>Silahkan login terlebih dahulu</p>
                            </div>
                            <form class="form-login" method="POST" action="functions/fn_login.php">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username"
                                        placeholder="User ID" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="Password">
                                </div>
                                <button class="btn btn-primary btn-block" name="proses" type="submit">
                                    <i class="fa fa-lock"></i>
                                    SIGN IN</button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="">Create an Account!</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./vendor/js/sb-admin-2.min.js"></script>
</body>

</html>