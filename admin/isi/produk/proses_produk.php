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
        mysqli_query($conn, "delete from barang where id_barang='$_GET[id]'");
        header("Location:../../media.php?p=produk");
    } else if ($act == 'tambah') {
        $foto1 = $_FILES['foto1']['name'];
        $foto2 = $_FILES['foto2']['name'];
        $foto3 = $_FILES['foto3']['name'];
        $foto4 = $_FILES['foto4']['name'];
        $foto5 = $_FILES['foto5']['name'];
        $foto6 = $_FILES['foto6']['name'];
        $foto_boleh = array('png', 'jpg', 'jpeg');
        $lokasi_foto1 = $_FILES['foto1']['tmp_name'];
        $lokasi_foto2 = $_FILES['foto2']['tmp_name'];
        $lokasi_foto3 = $_FILES['foto3']['tmp_name'];
        $lokasi_foto4 = $_FILES['foto4']['tmp_name'];
        $lokasi_foto5 = $_FILES['foto5']['tmp_name'];
        $lokasi_foto6 = $_FILES['foto6']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_baru1 = $angka_acak . '-' . $foto1;
        $nama_baru2 = $angka_acak . '-' . $foto2;
        $nama_baru3 = $angka_acak . '-' . $foto3;
        $nama_baru4 = $angka_acak . '-' . $foto4;
        $nama_baru5 = $angka_acak . '-' . $foto5;
        $nama_baru6 = $angka_acak . '-' . $foto6;
        $folder = "../../foto_produk/$nama_file";
        $tgl_upload = date("Ymd");
        move_uploaded_file($lokasi_foto1, "$folder" . $nama_baru1);
        move_uploaded_file($lokasi_foto2, "$folder" . $nama_baru2);
        move_uploaded_file($lokasi_foto3, "$folder" . $nama_baru3);
        move_uploaded_file($lokasi_foto4, "$folder" . $nama_baru4);
        move_uploaded_file($lokasi_foto5, "$folder" . $nama_baru5);
        move_uploaded_file($lokasi_foto6, "$folder" . $nama_baru6);
        mysqli_query($conn, "INSERT INTO barang(nama, id_kategori, untuk_orang, deskripsi, link, tanggal_masuk, harga_jual, foto1, foto2, foto3, foto4, foto5, foto6) VALUES ('$_POST[nama]','$_POST[kategori]','$_POST[jk]','$_POST[deskripsi]','$_POST[link]','$_POST[tanggal_masuk]','$_POST[harga]','$nama_baru1','$nama_baru2','$nama_baru3','$nama_baru4','$nama_baru5','$nama_baru6')");
        header("Location:../../media.php?p=produk");
    } else if ($act == 'edit') {
        $foto1 = $_FILES['foto1']['name'];
        $foto2 = $_FILES['foto2']['name'];
        $foto3 = $_FILES['foto3']['name'];
        $foto4 = $_FILES['foto4']['name'];
        $foto5 = $_FILES['foto5']['name'];
        $foto6 = $_FILES['foto6']['name'];
        $foto_boleh = array('png', 'jpg', 'jpeg');
        // $ph = explode('.', $foto1);
        // $ph .= explode('.', $foto2);
        // $ph .= explode('.', $foto3);
        // $ph .= explode('.', $foto4);
        // $ph .= explode('.', $foto5);
        // $ph .= explode('.', $foto6);
        // $ekstensi = strtolower(end($ph));
        $lokasi_foto1 = $_FILES['foto1']['tmp_name'];
        $lokasi_foto2 = $_FILES['foto2']['tmp_name'];
        $lokasi_foto3 = $_FILES['foto3']['tmp_name'];
        $lokasi_foto4 = $_FILES['foto4']['tmp_name'];
        $lokasi_foto5 = $_FILES['foto5']['tmp_name'];
        $lokasi_foto6 = $_FILES['foto6']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_baru1 = $angka_acak . '-' . $foto1;
        $nama_baru2 = $angka_acak . '-' . $foto2;
        $nama_baru3 = $angka_acak . '-' . $foto3;
        $nama_baru4 = $angka_acak . '-' . $foto4;
        $nama_baru5 = $angka_acak . '-' . $foto5;
        $nama_baru6 = $angka_acak . '-' . $foto6;
        $folder = "../../foto_produk/$nama_file";
        $tgl_upload = date("Ymd");
        if (!empty($lokasi_foto1) && !empty($lokasi_foto2) && !empty($lokasi_foto3) && !empty($lokasi_foto3) && !empty($lokasi_foto4) && !empty($lokasi_foto5) && !empty($lokasi_foto6)) {
            move_uploaded_file($lokasi_foto1, "$folder" . $nama_baru1);
            move_uploaded_file($lokasi_foto2, "$folder" . $nama_baru2);
            move_uploaded_file($lokasi_foto3, "$folder" . $nama_baru3);
            move_uploaded_file($lokasi_foto4, "$folder" . $nama_baru4);
            move_uploaded_file($lokasi_foto5, "$folder" . $nama_baru5);
            move_uploaded_file($lokasi_foto6, "$folder" . $nama_baru6);
            mysqli_query($conn, "UPDATE barang SET nama='$_POST[nama]',id_kategori='$_POST[kategori]',untuk_orang='$_POST[jk]',deskripsi='$_POST[deskripsi]',link='$_POST[link]',tanggal_masuk='$_POST[tanggal_masuk]',harga_jual='$_POST[harga]',foto1='$nama_baru1',foto2='$nama_baru2',foto3='$nama_baru3',foto4='$nama_baru4',foto5='$nama_baru5',foto6='$nama_baru6' WHERE id_barang='$_POST[kode]'");
            header("Location:../../media.php?p=produk");
        } else {
            mysqli_query($conn, "UPDATE barang SET nama='$_POST[nama]',id_kategori='$_POST[kategori]',untuk_orang='$_POST[jk]',deskripsi='$_POST[deskripsi]',link='$_POST[link]',tanggal_masuk='$_POST[tanggal_masuk]',harga_jual='$_POST[harga]' WHERE id_barang='$_POST[kode]'");
            header("Location:../../media.php?p=produk");
        }
    }
}
