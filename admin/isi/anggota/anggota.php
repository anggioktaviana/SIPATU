<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    $isi = "isi/anggota/proses_anggota.php";
    switch ($_GET['isi']) {
        default:
?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h3>Table anggota</h3>
                        <div class="col-sm-10">
                            <a href=<?= "?p=anggota&isi=tambah"; ?>><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div><br>
                        <section id="unseen">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id</th>
                                        <th scope="col" class=" col-lg-7">Nama anggota</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 2;
                                    $sql = mysqli_query($conn, "Select * from admin order by id_admin asc");
                                    $na = mysqli_fetch_array($sql);
                                    echo "<tr>
                                       <th scope='row'>1</th>
                                       <td>$na[id_admin]</td>;
                                       <td>$na[nama]</td>
                                   </tr>";
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr>
                                       <th scope='row'>$no</th>
                                       <td>$r[id_admin]</td>;
                                       <td>$r[nama]</td>
                                       <td>
                                       <a href='$isi?act=hapus&id=$r[id_admin]'><button type='button' class='btn btn-danger'>Hapus</button></a>
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
            <h3><i class="fa fa-angle-right"></i>Tambah admin</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form admin</h4>
                        <form class="form-horizontal style-form" method="POST" action="<?php echo "isi/anggota/proses_anggota.php?act=tambah"; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Usename</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pass">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                <div class="col-sm-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-theme02 btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                <input type="file" name="foto" class="default" />
                                            </span>
                                        </div>
                                    </div>
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
    }
}
?>