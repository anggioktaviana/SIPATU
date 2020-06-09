<body class="goto-here">

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row"><?php
								if ($_GET['k']) {
									switch ($_GET['k']) {
										default:
								?>
							<div class="col-md-8 col-lg-10 order-md-last">

								<div class="row">
									<?php
											$ku = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama ASC");
											while ($isi = mysqli_fetch_array($ku)) {
									?>
										<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
											<div class="product d-flex flex-column">
												<a href="#" class="img-prod"><img class="img-fluid" src="admin/foto_produk/<?= $isi["foto1"] ?>" alt="Colorlib Template">
													<div class="overlay"></div>
												</a>
												<div class="text py-3 pb-4 px-3">
													<div class="d-flex">
														<div class="cat">
															<?php

															$sql7 = mysqli_query($conn, "select * from kategori");
															while ($k = mysqli_fetch_array($sql7)) {
																if ($isi['id_kategori'] == $k['id_kategori']) {
																	echo "<span>$k[nama_kategori]</span>";
																}
															};

															?>

														</div>
													</div>
													<h3><a href="#"><?= $isi["nama"] ?></a></h3>
													<div class="pricing">
														<p class="price"><span>Rp. <?= $isi["harga_jual"] ?></span></p>
													</div>
													<p class="bottom-area d-flex px-3">
														<a href="media.php?s=detail&idbr=<?= $isi["id_barang"] ?>" class="add-to-cart text-center py-2 mr-1"><span>Detail <i></i></span></a>
														<a href="<?= $isi["link"] ?>" class="buy-now text-center py-2">Kunjungi Situs<span><i class=""></i></span></a>
													</p>
												</div>
											</div>
										</div>
									<?php
											}
									?>
								</div>
							</div>
						<?php
											break;
										case 'ktgr':
						?>
							<div class="col-md-8 col-lg-10 order-md-last">
								<?php
											if ($_GET["uo"] == "l") {
												$un = "Laki-laki";
											} else {
												$un = "Perempuan";
											}

											$ka = mysqli_query($conn, "select * from kategori");
											$kagr = mysqli_fetch_array($ka);
											$id = $_GET["id"];
											if ($id == $kagr["id_kategori"]) {
												$nkag = $kagr['nama_kategori'];
											};
								?>
								<h3>Sepatu <?= $un; ?></h3>
								<h5><?php $nkag; ?></h5>
								<br>
								<div class="row">
									<div class="row">
										<?php
											$u = $_GET["uo"];
											$k = $_GET["id"];
											$ku = mysqli_query($conn, "SELECT * FROM barang where untuk_orang = '$u' AND id_kategori = '$k'");
											while ($isi = mysqli_fetch_array($ku)) {
										?>
											<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
												<div class="product d-flex flex-column">
													<a href="#" class="img-prod"><img class="img-fluid" src="admin/foto_produk/<?= $isi["foto1"] ?>" alt="Colorlib Template">
														<div class="overlay"></div>
													</a>
													<div class="text py-3 pb-4 px-3">
														<div class="d-flex">
															<div class="cat">
																<?php

																$sql7 = mysqli_query($conn, "select * from kategori");
																while ($k = mysqli_fetch_array($sql7)) {
																	if ($isi['id_kategori'] == $k['id_kategori']) {
																		echo "<span>$k[nama_kategori]</span>";
																	}
																};

																?>

															</div>
														</div>
														<h3><a href="#"><?= $isi["nama"] ?></a></h3>
														<div class="pricing">
															<p class="price"><span>Rp. <?= $isi["harga_jual"] ?></span></p>
														</div>
														<p class="bottom-area d-flex px-3">
															<a href="media.php?s=detail&idbr=<?= $isi["id_barang"] ?>" class="add-to-cart text-center py-2 mr-1"><span>Detail</span></a>
															<a href="<?= $isi["link"] ?>" class="buy-now text-center py-2">Kunjungi Situs<span><i class="fa fa-link"></i></span></a>
														</p>
													</div>
												</div>
											</div>
										<?php
											}
										?>
									</div>
								</div>
							</div>
				<?php
											break;
									}
								}
				?>
				<div class="col-md-4 col-lg-2">
					<div class="sidebar">
						<?php
						include "kategori/menu.php";
						?>
					</div>
				</div>
			</div>
		</div>
	</section>