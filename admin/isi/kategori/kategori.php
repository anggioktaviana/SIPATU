<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    $isi = "isi/kategori/proses_kategori.php";
    switch ($_GET['isi']) {
        default:
?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h3>Table kategori</h3>
                        <div class="col-sm-10">
                            <a href=<?= "?p=kategori&isi=tambah"; ?>><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div><br>
                        <section id="unseen">
                            <br>
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id</th>
                                        <th scope="col" class=" col-lg-7">Nama kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "Select * from kategori order by nama_kategori asc");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr>
                                       <th scope='row'>$no</th>
                                       <td>$r[id_kategori]</td>;
                                       <td>$r[nama_kategori]</td>
                                       <td>
                                       <a href='?p=kategori&isi=edit&id=$r[id_kategori]'><button type='button' class='btn btn-primary'>Edit</button></a>
                                       <a href='$isi?act=hapus&id=$r[id_kategori]'><button type='button' class='btn btn-danger'>Hapus</button></a>
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
        case 'tambah':
        ?>
            <h3><i class="fa fa-angle-right"></i> kategori</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form kategori</h4>
                        <form class="form-horizontal style-form" method="POST" action="<?php echo "isi/kategori/proses_kategori.php?act=tambah"; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama">
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
        <?php
            break;
        case 'edit':
            $sql = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori ='$_GET[id]'");
            $edit = mysqli_fetch_array($sql);
        ?>
            <h3><i class="fa fa-angle-right"></i> Edit kategori</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form kategori</h4>
                        <form class="form-horizontal style-form" method="POST" action="<?php echo "isi/kategori/proses_kategori.php?act=edit"; ?>">
                            <input type="hidden" class="form-control" name="kode" value="<?= $edit['id_kategori'] ?>">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?= $edit['nama_kategori'] ?>">
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
            break;
    }
}
?>