<?php
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

// menangkap data yang di kirim dari form
$id_mustahiklainnya = $_POST['id_mustahiklainnya'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hak = $_POST['hak'];

// menginput data ke database
mysqli_query($con,"insert into mustahik_lainnya values('','$id_mustahiklainnya','$nama','$kategori','$hak')");

// mengalihkan halaman kembali ke index.php
header("location:distribusilainnya.php");

?>