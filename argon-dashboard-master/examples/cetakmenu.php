<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'functions.php';

$menu = query("SELECT * FROM menu");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Menu</title>
</head>
<body>
  <h1>Daftar Menu Restaurant</h1>
  <p>Daftar Menu yang tersedia</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>Foto</th>
      <th>ID menu</th>
      <th>Nama</th>
      <th>Porsi</th>
      <th>Harga jual</th>
      <th>Harga modal</th>
      <th>Status menu</th>
      <th>Estimasi waktu buat</th>
    </tr>';
    $i = 1;
    foreach ($menu as $m) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td><img src="../assets/img/'. $m["gambar"] .'" width="50"></td>
      <td>'. $m["id_menu"] .'</td>
      <td>'. $m["nama_menu"] .'</td>
      <td>'. $m["porsi"] .'</td>
      <td>Rp. '. $m["harga_jual"] .'</td>
      <td>Rp. '. $m["harga_modal"] .'</td>
      <td>'. $m["status_menu"] .'</td>
      <td>'. $m["estimasi_waktu_buat"] .'</td>
    </tr>';
    }
  
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
