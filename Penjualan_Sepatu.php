<?php
include "confign/koneksi.php";
session_start();
$error_nama = "";
$error_kate = "";
$error_uo = "";
$error_desk = "";
$error_link = "";
$error_tgl = "";
$error_harga = "";

$nama = "";
$kategori = "";
$uo = "";
$desk = "";
$link = "";
$tglm = "";
$harga = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["nama"])) {
		$error_nama = "nama tidak boleh kosong";
	} else {
		$nama = cek_input($_POST["nama"]);
	}
	if (empty($_POST["kategori"])) {
		$error_kate = "kategori tidak boleh kosong";
	} else {
		$kategori = cek_input($_POST["kategori"]);
	}
	if (empty($_POST["jk"])) {
		$error_uo = "Jenis kelamin harus di klik salah satu";
	} else {
		$uo = cek_input($_POST["jk"]);
	}
	if (empty($_POST["deskripsi"])) {
		$error_desk = "Jenis kelamin harus di klik salah satu";
	} else {
		$desk = cek_input($_POST["deskripsi"]);
	}
	if (empty($_POST["link"])) {
		$link = cek_input($_POST["link"]);
	} else {
		$website = cek_input($_POST["link"]);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
			$error_link = "Invalid URL";
		} else {
			$link = cek_input($_POST["link"]);
		}
	}
	if (empty($_POST["tanggal_masuk"])) {
		$error_tgl = "Jenis kelamin harus di klik salah satu";
	} else {
		$tglm = cek_input($_POST["tanggal_masuk"]);
	}
	if (empty($_POST["harga"])) {
		$error_harga = "Harga harus diisi";
	} else {
		$harga = cek_input($_POST["harga"]);
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

	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
	<link rel="stylesheet" type="text/css" href="admin/lib/gritter/css/jquery.gritter.css" />
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet">
	<script src="admin/lib/chart-master/Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="admin/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="admin/lib/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="admin/lib/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="admin/lib/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="admin/lib/bootstrap-datetimepicker/datertimepicker.css" />

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
					<h3><i class="fa fa-angle-right"></i> Produk</h3>
					<div class="row mt">
						<div class="col-lg-12">
							<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Jual Produk Anda</h4>
								<form class="form-horizontal style-form" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
										<div class="col-sm-10">
											<input type="text" class="form-control <?= ($error_nama != "" ? "is-invalid" : "") ?>" name="nama" value="<?= $nama; ?>">
											<span class="text-danger"><?= $error_nama; ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Kategori</label>
										<div class="col-sm-10">
											<select name="kategori" class="form-control" required>
												<?php
												$sql = mysqli_query($conn, "select * from kategori order by nama_kategori");
												while ($r = mysqli_fetch_array($sql)) {
													echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Untuk Kalangan</label>
										<div class="col-sm-10">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" name="jk" id="laki-laki" value="l" <?php if (isset($uo) && $uo == "l") echo "checked"; ?> class="custom-control-input">
												<label class="custom-control-label" for="laki-laki">
													Laki-laki
												</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" name="jk" id="perempuan" value="p" <?php if (isset($uo) && $uo == "p") echo "checked"; ?> class="custom-control-input">
												<label class="custom-control-label" for="perempuan">
													Perempuan
												</label>
											</div>
											<br>
											<span class="text-danger"><?= $error_uo ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
										<div class="col-sm-10">
											<textarea name="deskripsi" id="" class="form-control"><?= $desk ?></textarea>
											<span class="text-danger"><?= $error_desk ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Link</label>
										<div class="col-sm-10">
											<input type="text" name="link" class="form-control <?= ($error_link != "" ? "is-invalid" : "") ?>" placeholder="opsional" value="<?= $link; ?>">
											<span class="text-danger"><?= $error_link; ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
										<div class="col-sm-5 col-xs-9">
											<input type="date" name="tanggal_masuk" value="2020-06-01" size="16" class="form-control">
											<span class="input-group-btn add-on">
												<button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Harga Jual</label>
										<div class="col-sm-10">
											<input type="text" name="harga" class="form-control" placeholder="10.000.000" value="<?= $harga ?>">
											<span class="text-danger"><?= $error_harga ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Foto</label>
										<div class="col-sm-10">
											<div class="col-sm-3">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="" alt="" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-theme02 btn-file">
															<span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
															<span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
															<input type="file" name="foto1" class="default" / required>
														</span>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="" alt="" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-theme02 btn-file">
															<span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
															<span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
															<input type="file" name="foto2" class="default" />
														</span>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="" alt="" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-theme02 btn-file">
															<span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
															<span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
															<input type="file" name="foto3" class="default" />
														</span>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="" alt="" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-theme02 btn-file">
															<span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
															<span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
															<input type="file" name="foto4" class="default" />
														</span>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="" alt="" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-theme02 btn-file">
															<span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
															<span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
															<input type="file" name="foto5" class="default" />
														</span>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
														<img src="" alt="" />
													</div>
													<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
													<div>
														<span class="btn btn-theme02 btn-file">
															<span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
															<span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
															<input type="file" name="foto6" class="default" />
														</span>
														<a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus Semua</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-10">
											<input type="submit" class="btn btn-primary" value="SIMPAN">
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- col-lg-12-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<p>
					Dibuat Oleh Diyon dan Anggi Desain dari Colorlib
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

	<script class="include" type="text/javascript" src="admin/lib/jquery.dcjqaccordion.2.7.js"></script>
	<script src="admin/lib/jquery.scrollTo.min.js"></script>
	<script src="admin/lib/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="admin/lib/jquery.sparkline.js"></script>
	<script src="admin/lib/common-scripts.js"></script>
	<script type="text/javascript" src="admin/lib/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="admin/lib/gritter-conf.js"></script>
	<script src="admin/lib/sparkline-chart.js"></script>
	<script src="admin/lib/zabuto_calendar.js"></script>
	</script>
	<script src="admin/lib/jquery-ui-1.9.2.custom.min.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="admin/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="admin/lib/advanced-form-components.js"></script>
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

if (!empty($nama) && !empty($kategori) && !empty($uo) && !empty($desk) && !empty($tglm) && !empty($harga)) {
	include "confign/koneksi.php";
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
	$sql = "INSERT INTO barang(nama, id_kategori, untuk_orang, deskripsi, link, tanggal_masuk, harga_jual, foto1, foto2, foto3, foto4, foto5, foto6) VALUES ('$nama','$kategori','$uo','$desk','$link','$tglm','$harga','$nama_baru1','$nama_baru2','$nama_baru3','$nama_baru4','$nama_baru5','$nama_baru6')";
	$masuk = mysqli_query($conn, $sql);
	if ($masuk) {
?>
		<script>
			window.alert(
				"Barang Sukses dimasukkan"
			)
		</script>
		<meta http-equiv="refresh" content="0; url=index.php">
	<?php
	} else {
		echo "'$nama','$kategori','$uo','$desk','$link','$tglm','$harga','$nama_baru1','$nama_baru2','$nama_baru3','$nama_baru4','$nama_baru5','$nama_baru6'";
	}

	?>
	<script>
		window.alert(
			"Form sukses diinput \n\nTanggal : <?= $waktut; ?> \nJam : <?= $jam; ?>"
		)
	</script>
	<!-- <meta http-equiv="refresh" content="0; url=login.php"> -->

<?php
}
?>