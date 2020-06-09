<?php

include "../confign/koneksi.php";

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

$username = mysqli_real_escape_string($conn, cek_input($_POST['username']));
$password = md5(cek_input($_POST['password']));

if (!empty($password) && !empty($username)) {

  $sql = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
  $cek = mysqli_num_rows($sql);
  $cek3 = mysqli_fetch_array($sql);


  if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $cek3['username'];
    $_SESSION['password'] = $cek3['password'];
    $_SESSION['id'] = $cek3['id_admin'];
    $_SESSION['nama'] = $cek3['nama'];
    $_SESSION['foto'] = $cek3['foto'];
    $_SESSION['masuk_admin'] = 'masuk_halaman_admin';

    $id_lama = session_id();
    session_regenerate_id();
    $id_baru = session_id();

    echo "<script>alert('Selamat Datang $_SESSION[nama]');
    window.location='media.php';
  </script>";
    header("Location:media.php?p=home");
  } else {
    echo "<script>alert('Username dan Password Salah');
    window.location='index.php';
  </script>";
  }
} else {
  echo "<script>alert('Akses salah');
  window.location='index.php';
</script>";
}
