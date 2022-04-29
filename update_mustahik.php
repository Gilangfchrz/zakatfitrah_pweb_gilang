<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'Cihonje@fchrz';
$DATABASE_NAME = 'zakatfitrah';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$id_kategori = $_POST['id_kategori'];
$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];
$jumlah_hak = $_POST['jumlah_hak'];

// update data ke database
mysqli_query($con,"update kategori_mustahik set id_kategori='$id_kategori', nama_kategori='$nama_kategori', jumlah_hak='$jumlah_hak' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:mustahik.php");
?>