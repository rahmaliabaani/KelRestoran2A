<?php 
require '../examples/functions.php';

$pengeluaran = caripengeluaran($_GET['keyword']);
?>
<table class="table align-items-center table-dark table-flush">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="sort" data-sort="name">#</th>
      <th scope="col" class="sort" data-sort="budget">Jenis</th>
      <th scope="col" class="sort" data-sort="status">Keterangan</th>
      <th scope="col" class="sort" data-sort="status">Tanggal</th>
      <th scope="col" class="sort" data-sort="completion">Jumlah</th>
      <th scope="col" class="sort" data-sort="completion">Aksi</th>
    </tr>
  </thead>
  <tbody class="list">
    <?php $i = 1; ?>
    <?php foreach ($pengeluaran as $luar) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $luar['jenis']; ?></td>
        <td><?php echo $luar['keterangan']; ?></td>
        <td><?php echo $luar['tanggal']; ?></td>
        <td>Rp. <?php echo number_format($luar['jumlah']); ?></td>
        <td>
          <a href="ubahpengeluaran.php?id_pengeluaran=<?php echo $luar['id_pengeluaran']; ?>"><i class="far fa-edit text-white"></i></a> |
          <a href="hapuspengeluaran.php?id_pengeluaran=<?php echo $luar['id_pengeluaran']; ?>"><i class="far fa-trash-alt text-white"></i></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>