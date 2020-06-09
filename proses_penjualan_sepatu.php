<?php
session_start();
error_reporting(0);
function cek_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (empty($_SESSION['usernamepe']) and empty($_SESSION['passwordpe'])) {
    header("Location:../../index.php");
} else {
    include "confign/koneksi.php";
    $act = $_GET['act'];

    if ($act == 'tambah') {
        $nama = cek_input($_POST["nama"]);
        $kategori = cek_input($_POST["kategori"]);
        $uo = cek_input($_POST["jk"]);
        $deskripsi = cek_input($_POST["deskripsi"]);
        $link = cek_input($_POST["link"]);
        $tglm = cek_input($_POST["tanggal_masuk"]);
        $harga = cek_input($_POST["harga"]);
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
        $folder = "admin/foto_produk/";
        $tgl_upload = date("Ymd");
        move_uploaded_file($lokasi_foto1, "$folder" . $nama_baru1);
        move_uploaded_file($lokasi_foto2, "$folder" . $nama_baru2);
        move_uploaded_file($lokasi_foto3, "$folder" . $nama_baru3);
        move_uploaded_file($lokasi_foto4, "$folder" . $nama_baru4);
        move_uploaded_file($lokasi_foto5, "$folder" . $nama_baru5);
        move_uploaded_file($lokasi_foto6, "$folder" . $nama_baru6);
        mysqli_query($conn, "INSERT INTO barang(nama, id_kategori, untuk_orang, deskripsi, link, tanggal_masuk, harga_jual, foto1, foto2, foto3, foto4, foto5, foto6) VALUES ('$nama','$kategori','$uo','$deskripsi','$link','$tglm','$harga','$nama_baru1','$nama_baru2','$nama_baru3','$nama_baru4','$nama_baru5','$nama_baru6')");
        header("Location:media.php?s=home");
    }
}
