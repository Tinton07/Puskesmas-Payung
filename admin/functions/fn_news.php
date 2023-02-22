<?php 
include('../../connection.php');
session_start();

// periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: /puskesmas/admin/login.php');
  exit;
}

$act = $_GET['act'];

if($act == 'create') {
  $username = $_SESSION['username'];
  $result = mysqli_query($conn, "SELECT id_admin FROM admin WHERE username='$username'");
  $data_admin = mysqli_fetch_assoc($result);

  // Proses upload gambar
  if(isset($_FILES["gambar"]) && $_FILES["gambar"]["name"] !== ""){
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif','svg');
    $nama_gambar = 'img-'.time();
    $x = explode('.', $_FILES['gambar']['name']);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];	

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 5000000){			
        move_uploaded_file($file_tmp, '../../uploads/'.$nama_gambar.'.'.$ekstensi);
      }else{
        echo 'UKURAN FILE TERLALU BESAR';
      }
    }else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
    $hasil_nama_gambar = $nama_gambar.'.'.$ekstensi;
  }else{
    $hasil_nama_gambar = null;
  }

  $judul = $_POST['judul'];
  $kategori = $_POST['kategori'];
  $gambar = $hasil_nama_gambar;
  $text_berita = $_POST['text_berita'];
  $tgl_posting = $_POST['tgl_posting'];
  $id_admin = $data_admin["id_admin"];
  $dilihat = 0;
  mysqli_query($conn, "INSERT INTO berita (id_berita, judul, kategori, gambar, text_berita, tgl_posting, id_admin, dilihat) VALUES ('', '$judul', '$kategori', '$gambar', '$text_berita', '$tgl_posting', $id_admin, $dilihat)");
  header('Location: /puskesmas/admin/news.php');
}

if($act == 'update') {
  $username = $_SESSION['username'];
  $result = mysqli_query($conn, "SELECT id_admin FROM admin WHERE username='$username'");
  $data_admin = mysqli_fetch_assoc($result);

  // Proses upload gambar
  if(isset($_FILES["gambar"]) && $_FILES["gambar"]["name"] !== ""){
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif','svg');
    $nama_gambar = 'img-'.time();
    $x = explode('.', $_FILES['gambar']['name']);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];	

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 5000000){			
        move_uploaded_file($file_tmp, '../../uploads/'.$nama_gambar.'.'.$ekstensi);
      }else{
        echo 'UKURAN FILE TERLALU BESAR';
      }
    }else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
    $hasil_nama_gambar = $nama_gambar.'.'.$ekstensi;
  }else{
    $hasil_nama_gambar = null;
  }

  $id_berita = $_POST['id_berita'];
  $judul = $_POST['judul'];
  $kategori = $_POST['kategori'];
  $gambar = $hasil_nama_gambar;
  $text_berita = $_POST['text_berita'];
  $tgl_posting = $_POST['tgl_posting'];
  $id_admin = $data_admin["id_admin"];
  
  // edit gambar ketika gambar dimasukkan saja
  if($gambar == null) {
    mysqli_query($conn, "UPDATE berita SET judul = '$judul', kategori = '$kategori', text_berita = '$text_berita', tgl_posting = '$tgl_posting', id_admin = $id_admin WHERE id_berita = $id_berita");
  }else{
    mysqli_query($conn, "UPDATE berita SET judul = '$judul', kategori = '$kategori', gambar = '$gambar', text_berita = '$text_berita', tgl_posting = '$tgl_posting', id_admin = $id_admin WHERE id_berita = $id_berita");
  }
  header('Location: /puskesmas/admin/news.php');
}

if($act == 'delete') {
  $user = mysqli_query($conn, "SELECT * FROM admin WHERE username='$_SESSION[username]'");
  $data_user = mysqli_fetch_assoc($user);
  if($data_user['level'] == 'kepala'){
    $id = $_GET['id'];
    $nama_gambar =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar FROM berita WHERE id_berita='$id'"))['gambar'];
    if (file_exists('../../uploads/'.$nama_gambar)) {
      unlink('../../uploads/'.$nama_gambar);
    }
    $hps = mysqli_query($conn, "DELETE FROM berita WHERE id_berita = $id");
    header('Location: /puskesmas/admin/news.php');
  }else{
    header('Location: /puskesmas/admin/news.php');
  }
}