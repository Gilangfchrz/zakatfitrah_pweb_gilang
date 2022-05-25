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
    <title>Distribusi Warga</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
    <img src="asset/logo.png" alt="">
        <h1>Zakat Fitrah</h1>
        <a href="home.php"><i class="fas fa-user-circle"></i>Dashboard</a>
        <a href="muzakki.php"><i class="fas fa-user-circle"></i>Muzakki</a>
        <a href="mustahik.php"><i class="fas fa-user-circle"></i>Mustahik</a>
        <a href="bayarzakat.php"><i class="fas fa-user-circle"></i>BayarZakat</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Data Distribusi Lainnya</h2>
    <a href="mustahik.php">Kembali</a>
    <div>
        <p>Edit informasi Distribusi Lainnya :</p>
        <table border="1">
            <?php
            $id = $_GET['id'];
            $data = mysqli_query($con,"select * from mustahik_lainnya where id='$id'");
            while($d = mysqli_fetch_array($data)){
                ?>
                <form method="post" action="update_distribusilainnya.php">
                    <table>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id_mustahiklainnya" value="<?php echo $d['id_mustahiklainnya']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><input type="text" name="keterangan" value="<?php echo $d['keterangan']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Hak</td>
                            <td><input type="text" name="hak" value="<?php echo $d['hak']; ?>"></td>
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
