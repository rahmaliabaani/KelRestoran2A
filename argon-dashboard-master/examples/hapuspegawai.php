<?php 
require 'functions.php';

$id = $_GET['id_pegawai'];

if (hapuspegawai($id) > 0) {
	echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'pegawai.php';
		</script>";
} else {
	echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'pegawai.php';
		</script>";
}
?>