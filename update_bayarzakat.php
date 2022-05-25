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
$id_zakat = $_POST['id_zakat'];
$id = $_POST['id'];
$nama_kk = $_POST['nama_kk'];
$jumlah_tanggungan = $_POST['jumlah_tanggungan'];
$jenis_bayar = $_POST['jenis_bayar'];
$jumlah_tanggunganyangdibayar = $_POST['jumlah_tanggunganyangdibayar'];
$bayar_beras = $_POST['bayar_beras'];
$bayar_uang = $_POST['bayar_uang'];

// update data ke database
mysqli_query($con,"update bayarzakat set id_zakat='$id_zakat', nama_kk='$nama_kk', jumlah_tanggungan='$jumlah_tanggungan', jenis_bayar='$jenis_bayar', jumlah_tanggunganyangdibayar='$jumlah_tanggunganyangdibayar', bayar_beras='$bayar_beras', bayar_uang='$bayar_uang' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:bayarzakat.php");
?>