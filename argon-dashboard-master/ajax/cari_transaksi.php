<?php 
require '../examples/functions.php';

$transaksi = caritransaksi($_GET['keyword']);
?>
<table class="table align-items-center table-dark table-flush">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="sort" data-sort="name">#</th>
      <th scope="col" class="sort" data-sort="budget">ID Transaksi</th>
      <th scope="col" class="sort" data-sort="status">ID Pegawai</th>
      <th scope="col" class="sort" data-sort="status">Tanggal</th>
      <th scope="col" class="sort" data-sort="status">Nama Pelanggan</th>
      <th scope="col" class="sort" data-sort="status">Total Bayar</th>
      <th scope="col" class="sort" data-sort="status">Aksi</th>
    </tr>
  </thead>
  <tbody class="list">
    <?php $i = 1; ?>
    <?php foreach ($transaksi as $trans) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $trans['id_transaksi']; ?></td>
        <td><?php echo $trans['id_pegawai']; ?></td>
        <td><?php echo $trans['tanggal']; ?></td>
        <td><?php echo $trans['nama_pelanggan']; ?></td>
        <td>Rp. <?php echo number_format($trans['total_bayar']); ?></td>
        <td><a href="cetakstruk.php?id_transaksi=<?php echo $trans['id_transaksi']; ?>" class="btn btn-primary">Struk</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>