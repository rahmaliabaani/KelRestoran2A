<?php 
require 'functions.php';

$id = $_GET['id_stok'];

if (hapusstok($id) > 0) {
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'stok.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'beranda.php';
		</script>";
}
?>