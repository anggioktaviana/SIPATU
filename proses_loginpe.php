<?php

include "confign/koneksi.php";

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

$username = mysqli_real_escape_string($conn, cek_input($_POST['user']));
$password = md5(cek_input($_POST['pass']));

if (!empty($password) && !empty($username)) {

  $sql = mysqli_query($conn, "select * from akun where username='$username' and password='$password'");
  $cek = mysqli_num_rows($sql);
  $cek3 = mysqli_fetch_array($sql);


  if ($cek > 0) {
    session_start();
    $_SESSION['usernamepe'] = $cek3['username'];
    $_SESSION['passwordpe'] = $cek3['password'];
    $_SESSION['idakunpe'] = $cek3['id_akun'];
    $_SESSION['namalpe'] = $cek3['nama_lengkap'];
    $_SESSION['dengan_akun'] = 'dengan_akun';

    $id_lama = session_id();
    session_regenerate_id();
    $id_baru = session_id();

    echo "<script>alert('Selamat Datang $_SESSION[nama]');
    window.location='media.php';
  </script>";
    header("Location:media.php?s=home");
  } else {
    echo "<script>alert('Username dan Password Salah');
    window.location='login.php';
  </script>";
  }
} else {
  echo "<script>alert('Akses salah');
  window.location='index.php';
</script>";
}
