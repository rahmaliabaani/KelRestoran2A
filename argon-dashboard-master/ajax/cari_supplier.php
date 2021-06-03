<?php 
require '../examples/functions.php';

$supplier = carisupplier($_GET['keyword']);
?>
<table class="table align-items-center table-dark table-flush">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="sort" data-sort="name">#</th>
      <th scope="col" class="sort" data-sort="budget">ID Supplier</th>
      <th scope="col" class="sort" data-sort="status">Nama Supplier</th>
      <th scope="col" class="sort" data-sort="status">Jenis Supplier</th>
      <th scope="col" class="sort" data-sort="status">Aksi</th>
    </tr>
  </thead>
  <tbody class="list">
    <?php $i = 1; ?>
    <?php foreach ($supplier as $sup) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $sup['id_supplier']; ?></td>
        <td><?php echo $sup['nama']; ?></td>
        <td><?php echo $sup['jenis']; ?></td>
        <td>
          <a href="ubahsupplier.php?id_supplier=<?php echo $sup['id_supplier']; ?>"><i class="far fa-edit text-white"></i></a> |
          <a href="hapussupplier.php?id_supplier=<?php echo $sup['id_supplier']; ?>"><i class="far fa-trash-alt text-white"></i></a> |
          <a href="detailsupplier.php?id_supplier=<?php echo $sup['id_supplier']; ?>" class="text-white">Detail</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>