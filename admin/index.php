<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style2.css">
  <!-- <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet"> -->

</head>

<body>
  <div class="container2">
    <div class="img">
      <img class="orang" src="" alt="">
    </div>
    <div class="login-container">
      <form class="form-login" action="proses_login.php" method="POST">
        <h2 class="form-login-heading">Silahkan Login</h2>
        <div class="input-div one">
          <div class="i">
            <i class="fa fa-user"></i>
          </div>
          <input type="text" class="form-control" name="username" placeholder="User ID" autofocus>
        </div>
        <br>
        <div class="input-div two">
          <div class="i">
            <i class="fa fa-lock"></i>
          </div>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <br>
        <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
        <hr>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-footer">
                <button class="btn btn-theme btn-block" type="submit">Submit</button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script> -->
  <script>
    // $.backstretch(["img/login-bg.jpg"], {
    //   speed: 1000,
    // })
  </script>
</body>

</html>
<?php

session_start();
if ($_SESSION) {
  if ($_SESSION['masuk_admin'] == 'masuk_halaman_admin') {
    echo "<script>alert('sudah login');window.location='media.php?p=home&id=$_SESSION[id]';</script>";
  }
}
