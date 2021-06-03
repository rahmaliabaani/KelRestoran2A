<?php 
require '../examples/functions.php';

$pemasukan = caripemasukan($_GET['keyword']);
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
    <?php foreach ($pemasukan as $p) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $p['jenis']; ?></td>
        <td><?php echo $p['keterangan']; ?></td>
        <td><?php echo $p['tanggal']; ?></td>
        <td>Rp. <?php echo number_format($p['jumlah']); ?></td>
        <td>
          <a href="ubahpemasukan.php?id_pemasukan=<?php echo $p['id_pemasukan']; ?>"><i class="far fa-edit text-white"></i></a> |
          <a href="hapuspemasukan.php?id_pemasukan=<?php echo $p['id_pemasukan']; ?>"><i class="far fa-trash-alt text-white"></i></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>  
</table>