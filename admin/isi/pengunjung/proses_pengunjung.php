<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    include "../../../confign/koneksi.php";
    $p = $_GET['p'];
    $act = $_GET['act'];

    if ($act == 'hapus') {
        mysqli_query($conn, "DELETE FROM akun WHERE id_akun = '$_GET[id]'");
        header("Location:../../media.php?p=pengunjung");
    }
}
