<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'functions.php';

$trans = query("SELECT transaksi.id_transaksi, transaksi.id_pegawai, transaksi.tanggal, detail.nama_menu, menu.harga_jual, menu.harga_modal, (menu.harga_jual-menu.harga_modal) AS keuntungan FROM transaksi, detail, menu WHERE transaksi.id_transaksi=detail.id_transaksi AND detail.id_menu=menu.id_menu");

$tot_untung = query("SELECT SUM(menu.harga_jual-menu.harga_modal) AS totuntung FROM transaksi, detail, menu WHERE transaksi.id_transaksi=detail.id_transaksi AND detail.id_menu=menu.id_menu");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Keuntungan</title>
</head>
<body>
  <h1>Daftar Keuntungan Restaurant</h1>
  <p>Daftar Keuntungan yang tersedia</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>ID transaksi</th>
      <th>ID pegawai</th>
      <th>Tanggal</th>
      <th>Nama menu</th>
      <th>Harga jual</th>
      <th>Harga modal</th>
      <th>Keuntungan</th>
    </tr>';
    $i = 1;
    foreach ($trans as $tr) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td>'. $tr["id_transaksi"] .'</td>
      <td>'. $tr["id_pegawai"] .'</td>
      <td>'. $tr["tanggal"] .'</td>
      <td>'. $tr["nama_menu"] .'</td>
      <td>Rp. '. number_format($tr["harga_jual"]) .'</td>
      <td>Rp. '. number_format($tr["harga_modal"]) .'</td>
      <td>Rp. '. number_format($tr["keuntungan"]) .'</td>
    </tr>';
    }

    foreach ($tot_untung as $t) {
      $html .= '<tr>
        <th colspan="4">Total Keuntungan :</th>
        <td colspan="4">Rp. '. number_format($t["totuntung"]) .'</td>
      </tr>';
    }
  
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
