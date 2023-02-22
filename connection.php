<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'puskesmas';

// koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// periksa apakah koneksi berhasil
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>