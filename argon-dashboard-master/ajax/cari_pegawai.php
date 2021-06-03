<?php 
require '../examples/functions.php';

$pegawai = caripegawai($_GET['keyword']);
?>

<table class="table align-items-center table-dark table-flush">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="sort" data-sort="name">#</th>
      <th scope="col" class="sort" data-sort="budget">ID Pegawai</th>
      <th scope="col" class="sort" data-sort="status">Nama</th>
      <th scope="col" class="sort" data-sort="status">Posisi</th>
      <th scope="col" class="sort" data-sort="status">Gambar</th>
      <th scope="col" class="sort" data-sort="status">Aksi</th>
    </tr>
  </thead>
  <tbody class="list">
  <?php $i = 1; ?>
  <?php foreach ($pegawai as $p) { ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $p['id_pegawai']; ?></td>
      <td><?php echo $p['nama']; ?></td>
      <td><?php echo $p['posisi']; ?></td>
      <td><img src="../assets/img/pegawai/<?php echo $p['gambar']; ?>" alt=""></td>
      <td>
      <a href="ubahpegawai.php?id_pegawai=<?php echo $p['id_pegawai']; ?>"><i class="far fa-edit text-white"></i></a> |
      <a href="hapuspegawai.php?id_pegawai=<?php echo $p['id_pegawai']; ?>"><i class="far fa-trash-alt text-white"></i></a> |
      <a href="detailpegawai.php?id_pegawai=<?php echo $p['id_pegawai']; ?>" class="text-white">Detail</a> 
        </td>
    </tr>
  <?php } ?>
  </tbody>
</table>