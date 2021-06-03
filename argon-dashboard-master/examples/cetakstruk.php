<?php
// php require
require 'functions.php';
$id = $_GET['id_transaksi'];
$trans = query("SELECT transaksi.id_transaksi, transaksi.id_pegawai, transaksi.id_meja, transaksi.nama_pelanggan, transaksi.tanggal, detail.nama_menu, detail.harga_jual, detail.jumlah, detail.subtotal, transaksi.pajak, transaksi.total_bayar, transaksi.tunai, transaksi.kembali FROM detail, transaksi WHERE detail.id_transaksi=transaksi.id_transaksi AND transaksi.id_transaksi = '$id'");

// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [90, 150]]);
ob_start();
?>
<!-- // Write some HTML code: -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body { padding: -40px;}
  p { font-size: 10px;
    line-height: -8px; 
    text-align: center;
  }
  h6 { line-height: -3;
    text-align: center; 
  }
  td { font-size: 10px;
    padding: 0 5px;}
  .tgl { padding-left: 30px; }
</style>
<body>
  <h6>Argon Restaurant</h6>
  <p>Jl. Margaasih Indah II RT.11 RW.11</p>
  <p>Margaasih Kab.Bandung Jawa Barat</p>

  <hr>
  <table>
    <?php foreach ($trans as $m) { ?>
    
      <tr>
      <td>ID transaksi</td>
      <td>: <?php echo $m["id_transaksi"]; ?></td>
      <td colspan="4" class="tgl"><?php echo $m["tanggal"]; ?></td>
      </tr>
      <tr>
      <td>ID pegawai</td>
      <td>: <?php echo $m["id_pegawai"]; ?></td>
      </tr>
      <tr>
      <td>ID meja</td>
      <td>: <?php echo $m["id_meja"]; ?></td>
      </tr>
      <tr>
      <td>Pelanggan</td>
      <td>: <?php echo $m["nama_pelanggan"]; ?></td>
      </tr>

      <tr>
        <td><hr></td>
      </tr>

      <tr>
      <td><?php echo $m["nama_menu"]; ?></td>

      <td><?php echo $m["jumlah"]; ?></td>

      <td><?php echo $m["harga_jual"]; ?></td>

      <td><?php echo $m["subtotal"]; ?></td>
      </tr>

      <tr>
        <td><hr></td>
      </tr>

      <tr>
      <td>Pajak : <?php echo $m["pajak"]; ?></td>
      </tr>
      <tr>
      <td>Total : <?php echo $m["total_bayar"]; ?></td>
      </tr>
      <tr>
      <td>Tunai : <?php echo $m["tunai"]; ?></td>
      </tr>
      <tr>
      <td colspan="2">Kembali : <?php echo $m["kembali"]; ?></td>
      </tr>
      <hr>
    <?php } ?>
  
 </table>
  <p>Harga sudah termasuk PPN</p>
  <p>***Terimakasih atas kunjungan anda***</p>
  <p>Untuk barang kena pajak</p>
</body>
</html>

<?php
 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();
?>