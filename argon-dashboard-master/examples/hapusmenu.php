<?php 
require 'functions.php';

$id = $_GET['id_menu'];

if (hapusmenu($id) > 0) {
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'menu.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'menu.php';
		</script>";
}
?>