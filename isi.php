<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <?php
        $sql3 = mysqli_query($conn, "SELECT * FROM barang order by id_barang desc LIMIT 3");
        while ($t = mysqli_fetch_array($sql3)) {
        ?>
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" src="admin/foto_produk/<?= $t['foto1']; ?>" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Terbaru</span>
                                <div class="horizontal">
                                    <h1 class="mb-4 mt-3"><?= $t['nama']; ?></h1>
                                    <p class="mb-1 col-10"><?= $t['deskripsi']; ?></p>

                                    <p><a href="media.php?s=detail&idbr=<?= $t["id_barang"] ?>" class="btn-custom">Detail</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-9">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-bag"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Banyak Koleksi Sepatu</h3>
                        <p>Berbagai jenis Koleksi sepatu terkini yang bisa anda jadikan referensi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-5 services p-4 py-md-9">
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-9">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-payment-security"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Selalu Update</h3>
                        <p>Sepatu terupdate selalu menjadikan anda terlihat kekinian</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">UPDATE TERBARU</h2>
                <p>Produk Yang terbaru, Kunjungi Situsnya</p>
            </div>
        </div>
    </div>
    <div class='container'>
        <div class='row'>
            <?php
            $sql5 = mysqli_query($conn, "SELECT * FROM barang order by id_barang desc LIMIT 8");
            while ($p = mysqli_fetch_array($sql5)) {

                echo "<div class='col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex'>
                <div class='product d-flex flex-column'>
                    <a href='#' class='img-prod'><img class='img-fluid' src='admin/foto_produk/$p[foto1]' alt='Colorlib Template'>
                        <div class='overlay'></div>
                    </a>
                    <div class='text py-3 pb-4 px-3'>
                        <div class='d-flex'>
                            <div class='cat'>";
                $sql7 = mysqli_query($conn, "select * from kategori");
                while ($r2 = mysqli_fetch_array($sql7)) {
                    if ($p['id_kategori'] == $r2['id_kategori']) {
                        echo "<span>$r2[nama_kategori]</span>";
                    }
                };
                echo "</div>
                    </div>
                        <h3><a href='#'>$p[nama]</a></h3>
                        <div class='pricing'>
                            <p class='price'><span>Rp. $p[harga_jual]</span></p>
                        </div>
                        <p class='bottom-area d-flex px-3'>
                            <a href='media.php?s=detail&idbr=$p[id_barang]' class='add-to-cart text-center py-2 mr-1'><span>Detail<i></i></span></a>
                            <a href='$p[link]' class='buy-now text-center py-2'>Kunjungi Situs<span><i></i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        ";
            }
            ?>
        </div>
    </div>
</section>
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-7">
                <div class="heading-section ftco-animate mb-5">
                    <h2 class="mb-4">Apa Tanggapan Pelanggan Dari Review Produk</h2>
                </div>
                <div class="carousel-testimony owl-carousel">
                    <?php
                    $komentar = mysqli_query($conn, "SELECT * FROM komentar LIMIT 5");
                    while ($ikomentar = mysqli_fetch_array($komentar)) {

                    ?>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="text">
                                    <p class="mb-4 pl-4 line"><?= $ikomentar["komentar"] ?></p>
                                    <?php

                                    $sql9 = mysqli_query($conn, "select * from akun LIMIT 5");
                                    while ($ak = mysqli_fetch_array($sql9)) {
                                        if ($ikomentar['id_akun'] == $ak['id_akun']) {
                                            echo "<span>$ak[nama_lengkap]</span>";
                                        }
                                    };

                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>