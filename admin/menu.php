<!DOCTYPE html>
<html lang="en">

<?php

include "../confign/koneksi.php";

$sqlk = mysqli_query($conn, "SELECT * FROM komentar");
$sqlb = mysqli_query($conn, "SELECT * FROM barang");
$sqla = mysqli_query($conn, "SELECT * FROM akun");

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="lib/chart-master/Chart.js"></script>

</head>

<body>
    <li>
        <a href="?p=password">
            <i class="fa fa-cogs"></i>
            <span>Ganti Password</span>
        </a>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class=" fa fa-th"></i>
            <span>Master Barang</span>
        </a>
        <ul class="sub">
            <li><a href="?p=produk">Produk</a></li>
            <li><a href="?p=kategori">Kategori</a></li>
           
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class=" fa fa-book"></i>
            <span>Modul Admin</span>
        </a>
        <ul class="sub">
            <li><a href="?p=pengunjung">Akun Pengunjung</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-envelope"></i>
            <span>Pesan</span>
        </a>
        <ul class="sub">
            <li><a href="?p=komentar">
                    <span>Komentar</span>
                    <span class="label label-theme pull-right mail-info"><?= mysqli_num_rows($sqlk); ?></span>
                </a>
            </li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-book"></i>
            <span>Cetak</span>
        </a>
        <ul class="sub">
            <li><a href="cetak/produk.php">
                    <span>Katalog Produk</span>
                    <span class="label label-theme pull-right mail-info"><?= mysqli_num_rows($sqlb); ?></span>
                </a>
            </li>
            <li><a href="cetak/pelanggan.php">
                    <span>Pelanggan</span>
                    <span class="label label-theme pull-right mail-info"><?= mysqli_num_rows($sqla); ?></span>
                </a>
            </li>
        </ul>
    </li>
</body>

</html>