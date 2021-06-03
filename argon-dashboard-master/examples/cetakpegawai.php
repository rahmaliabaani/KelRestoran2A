<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'functions.php';

$pegawai = query("SELECT * FROM pegawai");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Pegawai</title>
</head>
<body>
  <h1>Daftar Pegawai Restaurant</h1>
  <p>Daftar Pegawai yang terdaftar</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>Foto</th>
      <th>ID pegawai</th>
      <th>Nama</th>
      <th>Posisi</th>
      <th>Alamat</th>
      <th>Tanggal lahir</th>
      <th>No telepon</th>
    </tr>';
    $i = 1;
    foreach ($pegawai as $p) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td><img src="../assets/img/pegawai/'. $p["gambar"] .'" width="50"></td>
      <td>'. $p["id_pegawai"] .'</td>
      <td>'. $p["nama"] .'</td>
      <td>'. $p["posisi"] .'</td>
      <td>Rp. '. $p["alamat"] .'</td>
      <td>'. $p["tanggal_lahir"] .'</td>
      <td>'. $p["no_telepon"] .'</td>
    </tr>';
    }
  
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
