<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    $isi = "isi/pengunjung/prosespengunjung.php";
    switch ($_GET['isi']) {
        default:
?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h3>Table anggota</h3>
                        <section id="unseen">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "SELECT * FROM akun");
                                    while ($akun = mysqli_fetch_array($sql)) {
                                        echo "<tr>
                                       <th scope='row'>$no</th>
                                       <td>$akun[id_akun]</td>
                                       <td>$akun[username]</td>
                                       <td>$akun[nama_lengkap]</td>
                                       <td>$akun[email]</td>
                                       <td>$akun[telepon]</td>
                                       <td>
                                       <a href='$isi?act=hapus&id=$akun[id_akun]'><button type='button' class='btn btn-danger'>Hapus</button></a>
                                       </td>
                                   </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
<?php
            break;
    }
}
?>