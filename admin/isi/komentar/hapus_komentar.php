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
        mysqli_query($conn, "delete from komentar where kode_k ='$_GET[id]'");
        header("Location:../../media.php?p=komentar");
    }
}
