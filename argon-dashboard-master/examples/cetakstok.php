<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'functions.php';

$stok = query("SELECT * FROM stok");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Stok</title>
</head>
<body>
  <h1>Daftar Stok Restaurant</h1>
  <p>Daftar Stok yang tersedia</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>ID stok</th>
      <th>ID supplier</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Satuan</th>
    </tr>';
    $i = 1;
    foreach ($stok as $s) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td>'. $s["id_stok"] .'</td>
      <td>'. $s["id_supplier"] .'</td>
      <td>'. $s["nama_bahan"] .'</td>
      <td>'. $s["jumlah"] .'</td>
      <td>'. $s["satuan"] .'</td>
    </tr>';
    }
  
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
