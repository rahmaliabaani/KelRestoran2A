<?php 
require 'functions.php';

$id = $_GET['id_meja'];

if (hapusmeja($id) > 0) {
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'meja.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'beranda.php';
		</script>";
}
?>