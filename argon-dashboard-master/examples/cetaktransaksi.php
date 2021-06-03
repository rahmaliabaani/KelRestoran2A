<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A3-P']);

// php require
require 'functions.php';

$trans = query("SELECT * FROM transaksi");

$pendapatan = query("SELECT SUM(total_bayar) AS pendapatan FROM transaksi");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Transaksi</title>
</head>
<body>
  <h1>Daftar Transaksi Restaurant</h1>
  <p>Daftar Transaksi yang terdaftar</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>ID transaksi</th>
      <th>ID pegawai</th>
      <th>ID meja</th>
      <th>Nama pelanggan</th>
      <th>Tanggal</th>
      <th>Total</th>
      <th>Pajak</th>
      <th>Tunai</th>
      <th>Kembali</th>
    </tr>';

    $i = 1;
    foreach ($trans as $t) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td>'. $t["id_transaksi"] .'</td>
      <td>'. $t["id_pegawai"] .'</td>
      <td>'. $t["id_meja"] .'</td>
      <td>'. $t["nama_pelanggan"] .'</td>
      <td>'. $t["tanggal"] .'</td>
      <td>Rp. '. number_format($t["total_bayar"]) .'</td>
      <td>Rp. '. number_format($t["pajak"]) .'</td>
      <td>Rp. '. number_format($t["tunai"]) .'</td>
      <td>Rp. '. number_format($t["kembali"]) .'</td>
    </tr> ';
	}
  
  	foreach ($pendapatan as $p) {
  		$html .= '<tr>
      	<th colspan="6">Pendapatan :</th>
      	<td colspan="4">Rp. '. number_format($p["pendapatan"]) .'</td>
    	</tr>';
	}

 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
