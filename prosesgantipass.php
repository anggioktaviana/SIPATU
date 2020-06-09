<?php

include "confign/koneksi.php";
session_start();

// function anti_injection($data)
// {

//   return $filter;
// }


function cek_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$password = md5(cek_input($_POST['pass']));
$id_akun = $_SESSION["idakunpe"];

if (!empty($password) && !empty($username)) {

    $sql = mysqli_query($conn, "UPDATE akun SET password='$password' WHERE id_akun = '$id_akun'");
    echo "<script>alert('Ganti Password Berhasil');
    window.location='logout.php'
    </script>";
} else {
    echo "<script>alert('Akses salah');
  window.location='index.php';
</script>";
}
