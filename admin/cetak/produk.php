<?php
include("../../confign/koneksi.php");
require_once("../laporan/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($conn, "SELECT * FROM barang");
$html = '<center><h3>Katalog Barang</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
    <tr>
        <td>No</td>
        <td>Id</td>
        <td>Nama</td>
        <td>Id Kategori</td>
        <td>Untuk Kalangan</td>
        <td>Deskripsi</td>
        <td>Harga Jual</td>
        <td>Foto Produk</td>
    </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    if ($row['untuk_orang'] == 'l') {
        $untuk = "Laki-laki";
    } else {
        $untuk = "Perempuan";
    };
    $html .= "<tr>
        <td>" . $no . "</td>
        <td>" . $row['id_barang'] . "</td>
        <td>" . $row['nama'] . "</td>
        <td>" . $row['id_kategori'] . "</td>
        <td>" . $untuk . "</td>
        <td>" . $row['deskripsi'] . "</td>
        <td>" . $row['harga_jual'] . "</td>
        <td><img src=../foto_produk/" . $row['foto1'] . " style='width: 110px;'></td>
</tr>";
    $no++;
}
$jumlah = mysqli_num_rows($query);
$html .= "</table>";
$html .= "Jumlah Sepatu = " . $jumlah;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('katalogroduk.pdf');
