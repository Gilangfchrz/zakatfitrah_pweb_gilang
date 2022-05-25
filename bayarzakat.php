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
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT id_zakat, nama_kk, jumlah_tanggungan, jenis_bayar, jumlah_tanggunganyangdibayar, bayar_beras, bayar_uang FROM bayarzakat WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($id_zakat, $nama_kk, $jumlah_tanggungan, $jenis_bayar, $jumlah_tanggunganyangdibayar, $bayar_beras, $bayar_uang);
$stmt->fetch();
$stmt->close();
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
        <a href="home.php"><i class="fas fa-user-circle"></i>Dashboard</a>
        <a href="muzakki.php"><i class="fas fa-user-circle"></i>Muzakki</a>
        <a href="mustahik.php"><i class="fas fa-user-circle"></i>Mustahik</a>
        <a href="bayarzakat.php"><i class="fas fa-user-circle"></i>BayarZakat</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Data BayarZakat</h2>
    <a href="input_bayarzakat.php"><i class="circle">Input Data BayarZakat</a>
    <div>
        <h1>Detail informasi BayarZakat </h1>
        <table cellspacing='0' align="center">
            <thead>
            <tr>
            <th>ID</th>
            <th>Nomor Zakat</th>
            <th>Nama</th>
            <th>Jumlah Tanggungan</th>
            <th>Jenis Bayar</th>
            <th>Jumlah Tanggungan yang Dibayar</th>
            <th>Bayar Beras</th>
            <th>Bayar Uang</th>
            <th>Konfigurasi</th>
            </tr>
            </thead>
            <?php
            $no = 1;
            $data = mysqli_query($con,"select * from bayarzakat");
            while($d = mysqli_fetch_array($data)){
                ?>
                    <tbody>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_zakat']; ?></td>
                    <td><?php echo $d['nama_kk']; ?></td>
                    <td><?php echo $d['jumlah_tanggungan']; ?></td>
                    <td><?php echo $d['jenis_bayar']; ?></td>
                    <td><?php echo $d['jumlah_tanggunganyangdibayar']; ?></td>
                    <td><?php echo $d['bayar_beras']; ?></td>
                    <td><?php echo $d['bayar_uang']; ?></td>
                    <td>
                        <a href="edit_bayarzakat.php?id=<?php echo $d['id']; ?>">Edit</a>
                        <a href="hapus_bayarzakat.php?id=<?php echo $d['id']; ?>">Hapus</a>
                    </td>
                </tr>
                    </tbody>
                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
