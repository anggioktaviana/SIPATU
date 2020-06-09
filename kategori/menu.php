<div class="sidebar-box-2">
    <h2 class="heading">Categories</h2>
    <div class="fancy-collapse-panel">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Laki-Laki
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ul>
                            <?php $sql3 = mysqli_query($conn, "SELECT DISTINCT id_kategori, nama_kategori FROM kategori JOIN barang USING(id_kategori) WHERE untuk_orang = 'l' ORDER BY nama_kategori ASC");
                            while ($l = mysqli_fetch_array($sql3)) {
                                echo "<li><a href='media.php?s=kategori&k=ktgr&uo=l&id=$l[id_kategori]'>$l[nama_kategori]</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Perempuan
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul>
                            <?php $sql3 = mysqli_query($conn, "SELECT DISTINCT id_kategori, nama_kategori FROM kategori JOIN barang USING(id_kategori) WHERE untuk_orang = 'p' ORDER BY nama_kategori ASC");
                            while ($l = mysqli_fetch_array($sql3)) {
                                echo "<li><a href='media.php?s=kategori&k=ktgr&uo=p&id=$l[id_kategori]''>$l[nama_kategori]</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>