<?php
include('../../connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

// query untuk memeriksa apakah username dan password valid
$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

$result = $conn->query($query);

if ($result->num_rows == 1) {
  // jika username dan password valid, buat session
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;
    header('Location: /puskesmas/admin');
} else {
    // jika username dan password tidak valid, kembalikan ke halaman login
    header('Location: /puskesmas/admin/login.php');
}

?>
