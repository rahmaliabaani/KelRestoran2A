<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'functions.php';

$supplier = query("SELECT * FROM supplier");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
  <title>Data Supplier</title>
</head>
<body>
  <h1>Daftar Supplier Restaurant</h1>
  <p>Daftar Supplier yang terdaftar</p>

  <hr>

  <table class="striped" border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th># </th>
      <th>ID supplier</th>
      <th>Nama</th>
      <th>Jenis</th>
      <th>Alamat</th>
      <th>No telepon</th>
      <th>Email</th>
    </tr>';
    $i = 1;
    foreach ($supplier as $sp) {
    $html .= '<tr>
      <td>'. $i++ .'</td>
      <td>'. $sp["id_supplier"] .'</td>
      <td>'. $sp["nama"] .'</td>
      <td>'. $sp["jenis"] .'</td>
      <td>'. $sp["alamat"] .'</td>
      <td>'. $sp["no_telepon"] .'</td>
      <td>'. $sp["email"] .'</td>
    </tr>';
    }
  
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
