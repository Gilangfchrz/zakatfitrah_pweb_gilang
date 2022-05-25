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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BayarZakat</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
    <img src="asset/logo.png" alt="">
        <h1>Zakat Fitrah</h1>
        <a href="muzakki.php"><i class="fas fa-user-circle"></i>Muzakki</a>
        <a href="mustahik.php"><i class="fas fa-user-circle"></i>Mustahik</a>
        <a href="bayarzakat.php"><i class="fas fa-user-circle"></i>BayarZakat</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Data BayarZakat</h2>
    <a href="bayarzakat.php">Kembali</a>
    <div>
        <p>Edit informasi BayarZakat :</p>
        <table border="1">
            <?php
            $id = $_GET['id'];
            $data = mysqli_query($con,"select * from bayarzakat where id='$id'");
            while($d = mysqli_fetch_array($data)){
                ?>
                <form method="post" action="update_bayarzakat.php">
                    <table>
                    <tr>
                    <tr>
                            <td>ID</td>
                            <td><input type="text" name="id_zakat" value="<?php echo $d['id_zakat']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <input type="text" name="nama_kk" value="<?php echo $d['nama_kk']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Tanggungan</td>
                            <td><input type="text" name="jumlah_tanggungan" value="<?php echo $d['jumlah_tanggungan']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Jenis Bayar</td>
                            <td><label><input type="radio" name="jenis_bayar" id="beras" value="beras" />Beras</label>
                            <label><input type="radio" name="jenis_bayar" id="uang" value="uang" />Uang</label></td>
                        </tr>
                        <tr>
                            <td>Tanggungan yang Dibayar:</td>
                            <td><input type="text" name="jumlah_tanggunganyangdibayar"></td>
                        </tr>
                        <tr>
                            <td>Jumlah Beras:</td>
                            <td><input type="text" name="bayar_beras"></td>
                        </tr>
                        <tr>
                            <td>Jumlah Uang:</td>
                            <td><input class="form-control readonly" type="text" name="bayar_uang"></td> <readonly>
                        </tr>
            <tr>
                            <td></td>
                            <td><input type="submit" value="Simpan"></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
