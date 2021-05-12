<?php 
require 'functions.php';

$id = $_GET['id_menu'];

if (hapuskeranjang($id) > 0) {
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'keranjang2.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'beranda.php';
		</script>";
}
?>