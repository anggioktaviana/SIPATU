<head>
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
                <li class="nav-item"><a href="kategori.php" class="nav-link">Kategori</a></li>
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
                            <a class='dropdown-item' href='penjualan_sepatu.php'> Jual Sepatu</a>
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