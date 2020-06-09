<?php
include("../../confign/koneksi.php");
require_once("../laporan/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($conn, "SELECT * FROM akun");
$html = '<center><h3>Daftar Pelanggan</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
    <tr>
        <td>No</td>
        <td>Username</td>
        <td>Nama Lengkap</td>
        <td>Email</td>
        <td>Telepon</td>
    </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
        <td>" . $no . "</td>
        <td>" . $row["username"] . "</td>
        <td>" . $row["nama_lengkap"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["telepon"] . "</td>
</tr>";
    $no++;
}
$jumlah = mysqli_num_rows($query);
$html .= "</table>";
$html .= "Jumlah Sepatu = " . $jumlah;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream('katalogpelanggan.pdf');
