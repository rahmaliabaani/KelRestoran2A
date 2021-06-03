<?php 
require 'functions.php';

$id = $_GET['id_pengeluaran'];

if (hapuspengeluaran($id) > 0) {
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'pengeluaran.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'beranda.php';
		</script>";
}
?>