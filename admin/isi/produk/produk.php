<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header("Location:../../index.php");
} else {
    $isi = "isi/produk/proses_produk.php";
    switch ($_GET['isi']) {
        default:
?>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h3>Table Produk</h3>
                        <div class="col-sm-10">
                            <a href=<?= "?p=produk&isi=tambah"; ?>><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div><br>
                        <section id="unseen">
                            <br>
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Untuk</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "Select * from barang order by nama asc");
                                    while ($r = mysqli_fetch_array($sql)) {
                                        echo "<tr>
                                       <th scope='row'>$no</th>
                                       <td>$r[nama]</td>";
                                        $sql2 = mysqli_query($conn, "Select * from kategori where id_kategori=$r[id_kategori]");
                                        $r2 = mysqli_fetch_array($sql2);
                                        echo "<td>$r2[nama_kategori]</td>
                                        <td>$r[untuk_orang]</td>
                                       <td>$r[harga_jual]</td>
                                       <td>$r[tanggal_masuk]</td>
                                       <td>
                                       <a href='?p=produk&isi=edit&id=$r[id_barang]'><button type='button' class='btn btn-primary'>Edit</button></a>
                                       <a href='$isi?act=hapus&id=$r[id_barang]'><button type='button' class='btn btn-danger'>Hapus</button></a>
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
            <h3><i class="fa fa-angle-right"></i> Produk</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form Produk</h4>
                        <form class="form-horizontal style-form" method="POST" action="<?php echo "isi/produk/proses_produk.php?act=tambah"; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="kategori" class="form-control">
                                        <?php
                                        $sql = mysqli_query($conn, "select * from kategori order by nama_kategori");
                                        while ($r = mysqli_fetch_array($sql)) {
                                            echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Untuk Kalangan</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jk" id="laki-laki" value="l" <?php if ($r['untuk_orang'] == "l") echo "checked"; ?> class="custom-control-input">
                                        <label class="custom-control-label" for="laki-laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jk" id="perempuan" value="p" <?php if ($r['untuk_orang'] == "l") echo "checked"; ?> class="custom-control-input">
                                        <label class="custom-control-label" for="perempuan">
                                            Perempuan
                                        </label>
                                    </div><br>
                                    <span class="text-danger"><?= $error_jk ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" id="" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="link" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                                <div class="col-sm-5 col-xs-9">
                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="01-01-2014" class="input-append date dpYears">
                                        <input type="text" name="tanggal_masuk" value="2020-06-01" size="16" class="form-control">
                                        <span class="input-group-btn add-on">
                                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Harga Jual</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto1" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto2" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto3" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto4" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto5" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto6" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
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
        case 'edit':

            $sql = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang ='$_GET[id]'");
            $edit = mysqli_fetch_array($sql);
        ?>
            <h3><i class="fa fa-angle-right"></i> Edit Produk</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form Produk</h4>
                        <form class="form-horizontal style-form" method="POST" action="<?php echo "isi/produk/proses_produk.php?act=edit"; ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="kode" value="<?= $edit['id_barang'] ?>">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?= $edit['nama'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <option selected></option>
                                    <select name="kategori" class="form-control">
                                        <?php
                                        $sql3 = mysqli_query($conn, "select * from kategori order by nama_kategori asc");
                                        if ($edit['id_kategori'] == 0) {
                                            echo "<option selected>Pilih Kategori</option>";
                                        }
                                        while ($r2 = mysqli_fetch_array($sql3)) {
                                            if ($edit['id_kategori'] == $r2['id_kategori']) {
                                                echo "<option value=$r2[id_kategori] selected>$r2[nama_kategori]</option>";
                                            } else {
                                                echo "<option value=$r2[id_kategori]>$r2[nama_kategori]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Untuk Kalangan</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jk" id="laki-laki" value="l" <?php if ($edit['untuk_orang'] == "l") echo "checked"; ?> class="custom-control-input">
                                        <label class="custom-control-label" for="laki-laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jk" id="perempuan" value="p" <?php if ($edit['untuk_orang'] == "p") echo "checked"; ?> class="custom-control-input">
                                        <label class="custom-control-label" for="perempuan">
                                            Perempuan
                                        </label>
                                    </div><br>
                                    <span class="text-danger"><?= $error_jk ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" class="form-control"><?= $edit['deskripsi'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $edit['link'] ?>" name="link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                                <div class="col-sm-5 col-xs-9">
                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="01-01-2014" class="input-append date dpYears">
                                        <input type="text" name="tanggal_masuk" value="<?= $edit['tanggal_masuk'] ?>" size="16" class="form-control">
                                        <span class="input-group-btn add-on">
                                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Harga Jual</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control" value="<?= $edit['harga_jual'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                <h5>Apabila ganti foto ganti semua</h5>
                                <div class="col-sm-10">
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="foto_produk/<?= $edit['foto1'] ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto1" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="foto_produk/<?= $edit['foto2'] ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto2" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="foto_produk/<?= $edit['foto3'] ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto3" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="foto_produk/<?= $edit['foto4'] ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto4" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="foto_produk/<?= $edit['foto5'] ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto5" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="foto_produk/<?= $edit['foto6'] ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                                    <input type="file" name="foto6" class="default" />
                                                </span>
                                                <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
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