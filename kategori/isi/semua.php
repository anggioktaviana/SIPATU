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