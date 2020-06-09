<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="lib/chart-master/Chart.js"></script>
</head>

<body>
    <?php

    if ($_GET['p'] == 'home') {
        include 'home.php';
    } else if ($_GET['p'] == 'produk') {
        include 'isi/produk/produk.php';
    } else if ($_GET['p'] == 'kategori') {
        include 'isi/kategori/kategori.php';
    } else if ($_GET['p'] == 'anggota') {
        include 'isi/anggota/anggota.php';
    } else if ($_GET['p'] == 'password') {
        include 'isi/password/ganti_password.php';
    } else if ($_GET['p'] == 'komentar') {
        include 'isi/komentar/komentar.php';
    } else if ($_GET['p'] == 'c_produk') {
        header("Location:cetak/produk.php");
    } else if ($_GET['p'] == 'pengunjung') {
        include 'isi/pengunjung/pengunjung.php';
    } else {
        include "404.php";
    }

    ?>
</body>

</html>