<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tugas PWeb</title>
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
    <h2>Halaman Beranda</h2>
    <p>Selamat Datang, <?=$_SESSION['name']?>!</p>
</div>
<div class="content">
            <h2>Apa itu zakat fitrah?</h2>
            <p>Zakat fitrah adalah zakat yang diwajibkan atas setiap jiwa baik lelaki dan perempuan muslim yang dilakukan pada bulan Ramadhan hingga menjelang shalat Idul Fitri.</p>
        </div>
        <div class="content">
            <h2>Apa itu muzakki?</h2>
            <p>Muzakki adalah orang yang mempunyai kewajiban membayar zakat fitrah sesuai dengan nisab nya.</p>
        </div>

        <div class="content">
            <h2>Apa itu mustahik?</h2>
            <p>Mustahik adalah orang yang berkah menerima zakat fitrah. Kategori Mustahik menyesuaikan dengan kriteria mustahik yang ada dalam hukum islam.</p>
        </div>
</body>
</html>

