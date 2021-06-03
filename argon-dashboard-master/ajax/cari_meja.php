<?php 
require '../examples/functions.php';

$meja = carimeja($_GET['keyword']);
?>
	<table class="table align-items-center table-dark table-flush">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col" class="sort" data-sort="name">#</th>
	      <th scope="col" class="sort" data-sort="name">ID Meja</th>
	      <th scope="col" class="sort" data-sort="status">Status</th>
	      <th scope="col" class="sort" data-sort="budget">Aksi</th>
	    </tr>
	  </thead>
	  <tbody class="list">
	    <?php $i = 1; ?>
	    <?php foreach ($meja as $mj) { ?>
	      <tr>
	        <td><?php echo $i++;?></td>
	        <td><?php echo $mj['id_meja'];?></td>
	        <td><?php echo $mj['status'];?></td>
	        <td>
	        <a href="ubahmeja.php?id_meja=<?php echo $mj['id_meja']; ?>"><i class="far fa-edit text-white"></i></a> |
	        <a href="hapusmeja.php?id_meja=<?php echo $mj['id_meja']; ?>"><i class="far fa-trash-alt text-white"></i></a>
	        </td>
	      </tr>
	    <?php } ?>
	  </tbody>
	</table>
