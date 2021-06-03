<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'functions.php';

$pengeluaran = query("SELECT * FROM pengeluaran");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Pengeluaran</title>
</head>
<body>
  <h1>Daftar Pengeluaran Restaurant</h1>
  <p>Daftar Pengeluaran yang terdaftar</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>ID pengeluaran</th>
      <th>Jenis</th>
      <th>Keterangan</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
    </tr>';
    $i = 1;
    foreach ($pengeluaran as $p) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td>'. $p["id_pengeluaran"] .'</td>
      <td>'. $p["jenis"] .'</td>
      <td>'. $p["keterangan"] .'</td>
      <td>'. $p["tanggal"] .'</td>
      <td>Rp. '. $p["jumlah"] .'</td>
    </tr>';
    }
  
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
