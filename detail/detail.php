<?php

$idbr = $_GET["idbr"];
$sql = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$idbr'");
$produk = mysqli_fetch_array($sql);

?>
<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<div class="container">
					<div class="row">
						<div class="col-lg-10">
							<div class="carousel-testimony owl-carousel">
								<div class="item">
									<div class="testimony-wrap">
										<div class="text">
											<a href="admin/foto_produk/<?= $produk["foto1"] ?>" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto1"] ?>" class="img-fluid"></a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-wrap">
										<div class="text">
											<a href="admin/foto_produk/<?= $produk["foto2"] ?>" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto2"] ?>" class="img-fluid"></a>
										</div>
									</div>
								</div>
								<?php
								if (!empty($produk["foto3"])) {

								?>
									<div class="item">
										<div class="testimony-wrap">
											<div class="text">
												<a href="admin/foto_produk/<?= $produk["foto3"] ?>" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto3"] ?>" class="img-fluid"></a>
											</div>
										</div>
									</div>
									<?php
									if (!empty($produk["foto4"])) {

									?>
										<div class="item">
											<div class="testimony-wrap">
												<div class="text">
													<a href="admin/foto_produk/<?= $produk["foto4"] ?>" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto4"] ?>" class="img-fluid"></a>
												</div>
											</div>
										</div>
										<?php
										if (!empty($produk["foto5"])) {

										?>
											<div class="item">
												<div class="testimony-wrap">
													<div class="text">
														<a href="admin/foto_produk/<?= $produk["foto5"] ?>" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto5"] ?>" class="img-fluid"></a>
													</div>
												</div>
											</div>
											<?php
											if (!empty($produk["foto6"])) {

											?>
												<div class="item">
													<div class="testimony-wrap">
														<div class="text">
															<a href="admin/foto_produk/<?= $produk["foto6"] ?>" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto6"] ?>" class="img-fluid"></a>
														</div>
													</div>
												</div>
								<?php
											}
										}
									}
								}
								?>
							</div>
						</div>
					</div>
				</div </section> <!-- <a href="images/product-1.png" class="image-popup prod-img-bg"><img src="admin/foto_produk/<?= $produk["foto1"] ?>" class="img-fluid"></a> -->
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?= $produk["nama"]; ?></h3>
				<p class="price"><span>Rp. <?= $produk["harga_jual"]; ?></span></p>
				<p><?= $produk["deskripsi"]; ?></p>
				<div class="col-md-10">
					<?php
					if ($produk["link"] == "") {
						$isil = "#";
					} else {
						$isil = $produk["link"];
					}
					?>
					<p><a href="<?= $isil ?>" class="btn btn-primary py-3 px-5">Kunjungi Situs</a></p>
				</div>

			</div>
		</div>




		<div class="row mt-5">
			<div class="col-md-12 nav-link-wrap">
				<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Tanggapan</a>
				</div>
			</div>
			<div class="col-md-12 tab-wrap">

				<div class="tab-content bg-light" id="v-pills-tabContent">
					<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
						<div class="row p-4">
							<div class="col-md-5">
								<?php
								$idkp = $_GET["idbr"];

								$kp7 = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = $idkp");
								$kpj = mysqli_fetch_array($kp7);
								$kp3 = mysqli_query($conn, "SELECT * FROM komentar WHERE id_barang = $kpj[id_barang]");
								$kp5 = mysqli_query($conn, "SELECT * FROM akun");
								while ($isikp = mysqli_fetch_array($kp3)) {

								?>
									<div class="review">
										<div class="desc">
											<h4>
												<?php
												while ($nakp = mysqli_fetch_array($kp5)) {
													if ($isikp['id_akun'] == $nakp['id_akun']) {
														echo "<span class='text-left'>$nakp[nama_lengkap]</span>";
													}
												};

												?>
											</h4>
											<p><?= $isikp["komentar"] ?></p>
										</div>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-5">
								<?php
								if (!empty($_SESSION["usernamepe"])) {
								?>
									<form method="post" action="<?= htmlspecialchars("media.php?s=detail&idbr=$idkp"); ?>">
										<div class="form-group row">
											<label for="komentar" class="col-sm-2 col-form-label">Komentar</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="komentar" name="komentar" value="">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary">Komentar</button>
											</div>
										</div>
									</form>
								<?php
								} else {
									echo "<h3>Login Untuk Komentar</h3>";
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());

			$('#quantity').val(quantity + 1);
		});

		$('.quantity-left-minus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>
<?php

if (!empty($_POST["komentar"])) {

	$input = "INSERT INTO komentar(komentar, id_akun, id_barang) VALUES ('$_POST[komentar]','$_SESSION[idakunpe]','$idkp')";
	$sql = mysqli_query($conn, $input);
	if ($sql) {
?>
		<meta http-equiv="refresh" content="0;">

<?php
	} else {
		echo "gagal diinput";
	}
}
?>