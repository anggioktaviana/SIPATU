<body>
    <?php

    if ($_GET['s'] == 'home') {
        include 'isi.php';
    } else if ($_GET['s'] == 'kategori') {
        include 'kategori/kategori.php';
    } else if ($_GET['s'] == 'tentang') {
        include 'tentang.php';
    } else if ($_GET['s'] == 'detail') {
        include 'detail/detail.php';
    } else if ($_GET['s'] == 'register') {
        include 'register.php';
    } else if ($_GET['s'] == 'komentar') {
        include 'isi/komentar/komentar.php';
    } else if ($_GET['s'] == 'c_produk') {
        header("Location:cetak/produk.php");
    } else {
    }

    ?>
</body>