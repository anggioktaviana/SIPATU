<?php
session_start();
include "../../../confign/koneksi.php";
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    $error_pass = "";
    $pass = "";
    $id_pass = $_POST['pass_id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["pass"])) {
            $error_pass = "Password tidak boleh kosong";
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
    <h3><i class="fa fa-angle-right"></i>Ganti Password</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Ganti Password</h4>
                <form class="form-horizontal style-form" method="POST" action="?p=password">
                    <input type="hidden" class="form-control" name="pass_id" value="<?= $_SESSION['id'] ?>">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
                        <div class="col-sm-10">
                            <input type="pass" class="form-control" name="pass" value="<?= $pass; ?>">
                            <span class="text-danger"><?= $error_pass; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-primary" value="UPDATE">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

    if (!empty($_POST["pass"])) {
        // if (!preg_match("/^[a-zA-Z ]*$/", $_POST["pass"])) {
        //     $error_pass = "Inputan hanya boleh huruf dan spasi";
        // } else {
        $pass = cek_input(md5($_POST["pass"]));
        // }
        if (!empty($pass)) {
            $input = "UPDATE admin SET password='$pass' WHERE id_admin='$id_pass'";
            $sql = mysqli_query($conn, $input);
            if ($sql) {
    ?>
                <script>
                    window.alert(
                        "Ganti Password Sukses"
                    )
                </script>
                <meta http-equiv="refresh" content="0; url=logout.php">

<?php
            } else {
                echo "<script>
            window.alert(
                'Ganti Password gagal'
            )
        </script>";
            }
        }
    }
}
