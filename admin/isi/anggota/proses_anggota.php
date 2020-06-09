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
        mysqli_query($conn, "delete from admin where id_admin='$_GET[id]'");
        header("Location:../../media.php?p=anggota");
    } else if ($act == 'tambah') {
        $foto = $_FILES['foto']['name'];
        $foto_boleh = array('png', 'jpg', 'jpeg');
        $ph = explode('.', $foto);
        $ekstensi = strtolower(end($ph));
        $lokasi_foto = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_baru = $angka_acak . '-' . $foto;
        $folder = "../../foto_produk/$nama_file";
        $tgl_upload = date("Ymd");
        $password = md5($_POST['pass']);
        if (!empty($lokasi_foto)) {
            move_uploaded_file($lokasi_foto, "$folder" . $nama_baru);
            mysqli_query($conn, "INSERT INTO admin(username, password, nama, foto, email) VALUES ('$_POST[user]','$password','$_POST[nama]','$nama_baru','$_POST[email]')");
            header("Location:../../media.php?p=anggota");
        } else {
            mysqli_query($conn, "INSERT INTO admin(username, password, nama, email) VALUES ('$_POST[user]','$password','$_POST[nama]','$_POST[email]')");
            header("Location:../../media.php?p=anggota");
        }
    }
}
