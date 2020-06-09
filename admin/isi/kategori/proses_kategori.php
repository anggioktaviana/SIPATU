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
        mysqli_query($conn, "delete from kategori where id_kategori='$_GET[id]'");
        header("Location:../../media.php?p=kategori");
    } else if ($act == 'tambah') {
        mysqli_query($conn, "INSERT INTO kategori(nama_kategori) VALUES ('$_POST[nama]')");
        header("Location:../../media.php?p=kategori");
    } else if ($act == 'edit') {
        mysqli_query($conn, "UPDATE kategori SET nama_kategori='$_POST[nama]' WHERE id_kategori='$_POST[kode]'");
        header("Location:../../media.php?p=kategori");
    }
}
