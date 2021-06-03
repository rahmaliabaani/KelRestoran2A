<?php 
require '../examples/functions.php';

$menu = carimenu($_GET['keyword']);
?>
	<table class="table align-items-center table-dark table-flush">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col" class="sort" data-sort="name">#</th>
	      <th scope="col" class="sort" data-sort="name">ID Menu</th>
	      <th scope="col" class="sort" data-sort="status">Nama</th>
	      <th scope="col" class="sort" data-sort="budget">Porsi</th>
	      <th scope="col" class="sort" data-sort="status">Harga </th>
	      <th scope="col" class="sort" data-sort="status">Stok </th>
	      <th scope="col" class="sort" data-sort="budget">Foto</th>
	      <th scope="col" class="sort" data-sort="budget">Aksi</th>
	    </tr>
	  </thead>
	  <tbody class="list">
	    <?php $i = 1; ?>
	    <?php foreach ($menu as $m) { ?>
	      <tr>
	        <td><?php echo $i++;?></td>
	        <td><?php echo $m['id_menu'];?></td>
	        <td><?php echo $m['nama_menu'];?></td>
	        <td><?php echo $m['porsi'];?></td>
	        <td>Rp. <?php echo number_format($m['harga_jual']);?></td>
	        <td><?php echo $m['status_menu'];?></td>
	        <td><img src="../assets/img/<?php echo $m['gambar']; ?>" alt=""></td>
	        <td>
	          <a href="ubahmenu.php?id_menu=<?php echo $m['id_menu']; ?>"><i class="far fa-edit text-white"></i></a> |
	          <a href="hapusmenu.php?id_menu=<?php echo $m['id_menu']; ?>"><i class="far fa-trash-alt text-white"></i></a> |
	          <a href="detailmenu.php?id_menu=<?php echo $m['id_menu']; ?>" class="text-white">Detail</a>
	        </td>
	      </tr>
	    <?php } ?>
	  </tbody>
	</table>
