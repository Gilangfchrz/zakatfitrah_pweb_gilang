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
$id_mustahikwarga = $_POST['id_mustahikwarga'];
$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hak = $_POST['hak'];

// update data ke database
mysqli_query($con,"update mustahik_warga set id_mustahikwarga='$id_mustahikwarga', nama='$nama', kategori='$kategori', hak='$hak' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:distribusiwarga.php");
?>