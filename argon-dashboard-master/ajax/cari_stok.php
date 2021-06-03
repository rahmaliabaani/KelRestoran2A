<?php 
require '../examples/functions.php';

$stok = caristok($_GET['keyword']);
?>
<table class="table align-items-center table-dark table-flush">
	<thead class="thead-dark">
	  <tr>
	    <th scope="col" class="sort" data-sort="name">#</th>
	    <th scope="col" class="sort" data-sort="name">ID Stok</th>
	    <th scope="col" class="sort" data-sort="name">ID Supplier</th>
	    <th scope="col" class="sort" data-sort="status">Nama</th>
	    <th scope="col" class="sort" data-sort="status">Jumlah</th>
	    <th scope="col" class="sort" data-sort="status">Satuan</th>
	    <th scope="col" class="sort" data-sort="status">Aksi</th>
	  </tr>
	</thead>
	<tbody class="list">
	  <?php $i = 1; ?>
	  <?php foreach ($stok as $s) { ?>
	    <tr>
	      <td><?php echo $i++; ?></td>
	      <td><?php echo $s['id_stok']; ?></td>
	      <td><?php echo $s['id_supplier']; ?></td>
	      <td><?php echo $s['nama_bahan']; ?></td>
	      <td><?php echo $s['jumlah']; ?></td>
	      <td><?php echo $s['satuan']; ?></td>
	      <td>
	      <a href="ubahstok.php?id_stok=<?php echo $s['id_stok']; ?>"><i class="far fa-edit text-white"></i></a> |
	      <a href="hapusstok.php?id_stok=<?php echo $s['id_stok']; ?>"><i class="far fa-trash-alt text-white"></i></a>
	      </td>
	    </tr>
	  <?php } ?>
	</tbody>
</table>