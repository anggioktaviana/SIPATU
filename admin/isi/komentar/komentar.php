<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    $isi = "isi/komentar/hapus_komentar.php";
    switch ($_GET['isi']) {
        default:
?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h3>Table Komentar</h3>
                        <section id="unseen">
                            <br>
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>

                                        <th scope="col">id akun</th>
                                        <th scope="col">Nama Pemilik Komentar</th>
                                        <th scope="col">Komentar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "Select * from komentar order by kode_k asc");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr>
                                       <th scope='row'>$no</th>
                                       
                                       <td>$r[id_akun]</td>";
                                        $sql2 = mysqli_query($conn, "Select * from akun where id_akun=$r[id_akun]");
                                        $r2 = mysqli_fetch_array($sql2);
                                        echo "<td>$r2[nama_lengkap]</td>
                                       <td>$r[komentar]</td>
                                       <td>
                                       <a href='$isi?act=hapus&id=$r[kode_k]'><button type='button' class='btn btn-danger'>Hapus</button></a>
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