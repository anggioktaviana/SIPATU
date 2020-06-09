<?php
include "confign/koneksi.php";
session_start();
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$waktut = date('d-m-Y');
$jam = date('H:i:s');

$error_user = "";
$error_pass = "";
$error_namal = "";
$error_email = "";
$error_telepon = "";

$user = "";
$pass = "";
$namal = "";
$email = "";
$telepon = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["user"])) {
		$error_user = "username tidak boleh kosong";
	} else {
		if (!preg_match("/^[a-zA-Z ]*$/", $_POST["user"])) {
			$error_user = "Inputan hanya boleh huruf dan spasi";
		} else {
			$user = cek_input($_POST["user"]);
		}
	}
	if (empty($_POST['pass'])) {
		$error_pass = "pass tidak oleh kosong";
	} else {
		if (!preg_match("/^[a-zA-Z 0-9]*$/", $_POST["pass"])) {
			$error_pass = "pass hanya diperbolehkan angka";
		} else {
			$pass = cek_input($_POST["pass"]);
		}
	}
	if (empty($_POST["namal"])) {
		$error_namal = "nama lengkap tidak boleh kosong";
	} else {
		if (!preg_match("/^[a-zA-Z ]*$/", $_POST["namal"])) {
			$error_namal = "Inputan hanya boleh huruf dan spasi";
		} else {
			$namal = cek_input($_POST["namal"]);
		}
	}
	if (empty($_POST['email'])) {
		$error_email = "email tidak oleh kosong";
	} else {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$error_email = "Email Harus Valid";
		} else {
			$email = cek_input($_POST["email"]);
		}
	}
	if (empty($_POST['telepon'])) {
		$error_telepon = "telepon tidak oleh kosong";
	} else {
		if (!is_numeric($_POST["telepon"])) {
			$error_telepon = "telepon hanya diperbolehkan angka";
		} else {
			$telepon = cek_input($_POST["telepon"]);
		}
	}
}
function cek_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<head>
	<title>Toko Sepatu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="media.php?s=home">SIPATU</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="media.php?s=home" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="media.php?s=kategori&k=ku" class="nav-link">Kategori</a></li>
				<li class="nav-item"><a href="media.php?s=tentang" class="nav-link">Tentang Kami</a></li>

				<?php
				if (!empty($_SESSION["usernamepe"])) {

					if ($_SESSION['dengan_akun'] == 'dengan_akun') {
						$namal = $_SESSION['namalpe'];
						echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='dropdown04' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>$namal</a>
                        <div class='dropdown-menu' aria-labelledby='dropdown04'>
                            <a class='dropdown-item' href='logout.php'>Logout</a>
                            <a class='dropdown-item' href='ganti_password.php'> Ganti Password</a>
                        </div>
                        ";
					}
				} else {
				?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="login.php">Login</a>
							<a class="dropdown-item" href="register.php">Register</a>
						</div>
					</li>
				<?php
				}
				?>
				<!-- <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li> -->

			</ul>
		</div>
	</div>
</nav>

<body class="goto-here">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 ftco-animate">
					<div class="text-center">
						Data Pribadi
					</div>
					<div class="card-body">
						<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<div class="form-group row">
								<label for="user" class="col-sm-2 col-form-label">Username</label>
								<div class="col-sm-10">
									<input type="text" class="form-control <?= ($error_user != "" ? "is-invalid" : "") ?>" id="user" name="user" value="<?= $user; ?>">
									<span class="text-danger"><?= $error_user ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="pass" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="text" class="form-control <?= ($error_pass != "" ? "is-invalid" : "") ?>" id="pass" name="pass" value="<?= $pass; ?>">
									<span class="text-danger"><?= $error_pass ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="namal" class="col-sm-2 col-form-label">Nama Lengkap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control <?= ($error_namal != "" ? "is-invalid" : "") ?>" id="namal" name="namal" value="<?= $namal; ?>">
									<span class="text-danger"><?= $error_namal ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control <?= ($error_email != "" ? "is-invalid" : "") ?>" id="email" name="email" value="<?= $email; ?>">
									<span class="text-danger"><?= $error_email ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
								<div class="col-sm-10">
									<input type="text" class="form-control <?= ($error_telepon != "" ? "is-invalid" : "") ?>" id="telepon" name="telepon" value="<?= $telepon; ?>">
									<span class="text-danger"><?= $error_telepon; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary">Sign up</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<p>
					Dibuat Oleh Diyon dan Anggi dari Colorlib
				</p>
			</div>
		</div>
	</div>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>

<?php

if (!empty($user) && !empty($pass) && !empty($namal) && !empty($email) && !empty($telepon)) {
	$password = md5($pass);
	$input = "INSERT INTO akun(username, password, nama_lengkap, email, telepon) VALUES ('$user','$password','$namal','$email','$telepon')";
	$sql = mysqli_query($conn, $input);
	if ($sql) {
?>
		<script>
			window.alert(
				"Form sukses diinput \n\nTanggal : <?= $waktut; ?> \nJam : <?= $jam; ?>"
			)
		</script>
		<meta http-equiv="refresh" content="0; url=login.php">

<?php
	} else {
		echo "gagal diinput";
	}
}
?>