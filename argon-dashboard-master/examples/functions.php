<?php
//fungsi untuk melakukan koneksi ke database 
function koneksi() {
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "pw_restaurant");

	return $conn;
}

//function untuk melakukan query dan memasukannya kedalam array 
function query($sql) {
	$conn = koneksi();
	$result = mysqli_query($conn, "$sql");
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function carimenu($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM menu WHERE nama_menu LIKE '%$keyword%' OR status_menu LIKE '%keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function carimeja($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM meja WHERE status LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function caristok($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM stok WHERE nama_bahan LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function carisupplier($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM supplier WHERE nama LIKE '%$keyword%' OR jenis LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function caripegawai($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM pegawai WHERE nama LIKE '%$keyword%' OR posisi LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function caritransaksi($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM transaksi WHERE nama_pelanggan LIKE '%$keyword%' OR id_transaksi LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function caripemasukan($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM pemasukan WHERE keterangan LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function caripengeluaran($keyword) {
	$conn = koneksi();

	$query = "SELECT * FROM pengeluaran WHERE keterangan LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function registrasi($data) {
	$conn = koneksi();
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$id_pegawai = mysqli_real_escape_string($conn, $data["id_pegawai"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('username sudah digunakan');
		</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambah user baru
	$query_tambah = "INSERT INTO user VALUES('$id_pegawai', '$username', '$password')";
	mysqli_query($conn, $query_tambah);
	return mysqli_affected_rows($conn);
}

//function untuk menambahkan data didalam database
function tambahkeranjang($data) {
	$conn = koneksi();

	$id_transaksi = htmlspecialchars($data['id_transaksi']);
	$id_menu = htmlspecialchars($data['id_menu']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$nama = htmlspecialchars($data['nama_menu']);
	$porsi = htmlspecialchars($data['porsi']);
	$harga_jual = htmlspecialchars($data['harga_jual']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$subtotal = htmlspecialchars($data['subtotal']);

	$query = "INSERT INTO keranjang VALUES ('$id_transaksi','$id_menu','$tanggal','$nama','$porsi','$harga_jual','$jumlah','$subtotal')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus keranjang
function hapuskeranjang($id) {
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM keranjang WHERE id_menu = '$id'");
	return mysqli_affected_rows($conn);
}

// ubah keranjang
function ubahkeranjang($data) {
	$conn = koneksi();

	$id_transaksi = htmlspecialchars($data['id_transaksi']);
	$id_menu = htmlspecialchars($data['id_menu']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$nama = htmlspecialchars($data['nama_menu']);
	$porsi = htmlspecialchars($data['porsi']);
	$harga_jual = htmlspecialchars($data['harga_jual']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$subtotal = htmlspecialchars($data['subtotal']);

	$query = "UPDATE keranjang SET tanggal='$tanggal',nama_menu='$nama',porsi='$porsi',harga_jual='$harga_jual',jumlah='$jumlah',subtotal='$subtotal' WHERE id_menu = '$id_menu'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

//function untuk menambahkan data didalam database
function tambahtransaksi($data) {
	$conn = koneksi();

	$id_transaksi = htmlspecialchars($data['id_transaksi']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$namap = htmlspecialchars($data['nama_pelanggan']);
	$id_pegawai = htmlspecialchars($data['id_pegawai']);
	$id_meja = htmlspecialchars($data['id_meja']);
	$total = htmlspecialchars($data['total_bayar']);
	$pajak = htmlspecialchars($data['pajak']);
	$tunai = htmlspecialchars($data['tunai']);
	$kembali = htmlspecialchars($data['kembali']);

	
	$detail = "INSERT INTO detail SELECT * FROM keranjang";
	$transaksi = "INSERT INTO transaksi VALUES ('$id_transaksi','$id_pegawai','$id_meja', '$namap', '$tanggal', '$total','$pajak','$tunai','$kembali')";
	$delet = "DELETE FROM keranjang";

	mysqli_query($conn, $detail);
	mysqli_query($conn, $transaksi);
	mysqli_query($conn, $delet);

	return mysqli_affected_rows($conn);
}

// tambah catatan pemasukan
function tambahpemasukan($data) {
	$conn = koneksi();

	$jenis = htmlspecialchars($data['jenis']);
	$keterangan = htmlspecialchars($data['keterangan']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$jumlah = htmlspecialchars($data['jumlah']);

	$query = "INSERT INTO pemasukan VALUES ('','$jenis','$keterangan','$tanggal','$jumlah')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah pemasukan
function ubahpemasukan($data) {
	$conn = koneksi();

	$id_pemasukan = htmlspecialchars($data['id_pemasukan']);
	$jenis = htmlspecialchars($data['jenis']);
	$keterangan = htmlspecialchars($data['keterangan']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$jumlah = htmlspecialchars($data['jumlah']);

	$query = "UPDATE pemasukan SET jenis='$jenis',keterangan='$keterangan',tanggal='$tanggal',jumlah='$jumlah' WHERE id_pemasukan = '$id_pemasukan'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus pemasukan
function hapuspemasukan($id) {
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM pemasukan WHERE id_pemasukan = '$id'");
	return mysqli_affected_rows($conn);
}

// tambah pengeluaran
function tambahpengeluaran($data) {
	$conn = koneksi();

	$jenis = htmlspecialchars($data['jenis']);
	$keterangan = htmlspecialchars($data['keterangan']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$jumlah = htmlspecialchars($data['jumlah']);

	$query = "INSERT INTO pengeluaran VALUES ('','$jenis','$keterangan','$tanggal','$jumlah')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah pengeluaran
function ubahpengeluaran($data) {
	$conn = koneksi();

	$id_pengeluaran = htmlspecialchars($data['id_pengeluaran']);
	$jenis = htmlspecialchars($data['jenis']);
	$keterangan = htmlspecialchars($data['keterangan']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$jumlah = htmlspecialchars($data['jumlah']);

	$query = "UPDATE pengeluaran SET jenis='$jenis',keterangan='$keterangan',tanggal='$tanggal',jumlah='$jumlah' WHERE id_pengeluaran = '$id_pengeluaran'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus pengeluaran
function hapuspengeluaran($id) {
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id'");
	return mysqli_affected_rows($conn);
}

// tambah meja
function tambahmeja($data) {
	$conn = koneksi();

	$id_meja = htmlspecialchars($data['id_meja']);
	$status = htmlspecialchars($data['status']);
	$query = "INSERT INTO meja VALUES ('$id_meja','$status')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah meja
function ubahmeja($data) {
	$conn = koneksi();

	$id = htmlspecialchars($data['id_meja']);
	$status = htmlspecialchars($data['status']);

	$query = "UPDATE meja SET status='$status' WHERE id_meja='$id'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus meja
function hapusmeja($id) {
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM meja WHERE id_meja = '$id'");
	return mysqli_affected_rows($conn);
}

function upload() {
	$nama_file = $_FILES['gambar']['name'];
	$tipe_file = $_FILES['gambar']['type'];
	$ukuran_file = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	// ketika tidak ada gambar yg dipilih
	if ($error == 4) {
		// echo "<script>
		// alert('pilih gambar terlebih dahulu!');
		// </script>";

		return 'nofoto.png';
	}

	// cek ekstensi file
	$daftar_gambar = ['jpg', 'jpeg', 'png'];
	$ekstensi_file = explode('.', $nama_file);
	$ekstensi_file = strtolower(end($ekstensi_file));
	if (!in_array($ekstensi_file, $daftar_gambar)) {
		echo "<script>
		alert('yang anda pilih bukan gambar!');
		</script>";

		return false;
	}

	// cek tipe file
	if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
		echo "<script>
		alert('yang anda pilih bukan gambar!');
		</script>";

		return false;
	}

	// cek ukuran file
	// maksimal 5Mb = 5000000
	if ($ukuran_file > 5000000) {
		echo "<script>
		alert('ukuran terlalu besar!');
		</script>";

		return false;
	}

	// lolos pengecekan
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

	return $nama_file_baru;
}

// tambah menu
function tambahmenu($data) {
	$conn = koneksi();

	$id_menu = htmlspecialchars($data['id_menu']);
	$nama_menu = htmlspecialchars($data['nama_menu']);
	$porsi = htmlspecialchars($data['porsi']);
	$harga_jual = htmlspecialchars($data['harga_jual']);
	$harga_modal = htmlspecialchars($data['harga_modal']);
	$status_menu = htmlspecialchars($data['status_menu']);
	$estimasi_waktu_buat = htmlspecialchars($data['estimasi_waktu_buat']);
	// $gambar = htmlspecialchars($data['gambar']);

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}
	

	$query = "INSERT INTO menu VALUES ('$id_menu','$nama_menu','$porsi','$harga_jual','$harga_modal','$status_menu','$estimasi_waktu_buat','$gambar')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah menu
function ubahmenu($data) {
	$conn = koneksi();

	$id_menu = htmlspecialchars($data['id_menu']);
	$nama_menu = htmlspecialchars($data['nama_menu']);
	$porsi = htmlspecialchars($data['porsi']);
	$harga_jual = htmlspecialchars($data['harga_jual']);
	$harga_modal = htmlspecialchars($data['harga_modal']);
	$status_menu = htmlspecialchars($data['status_menu']);
	$estimasi_waktu_buat = htmlspecialchars($data['estimasi_waktu_buat']);
	$gambar_lama = htmlspecialchars($data['gambar_lama']);

	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	if ($gambar == 'nofoto.png') {
		$gambar = $gambar_lama;
	}

	$query = "UPDATE menu SET nama_menu='$nama_menu',porsi='$porsi',harga_jual='$harga_jual',harga_modal='$harga_modal',status_menu='$status_menu',estimasi_waktu_buat='$estimasi_waktu_buat',gambar='$gambar' WHERE id_menu='$id_menu'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
// hapus menu
function hapusmenu($id) {
	$conn = koneksi();
	$m = " ";
	// menghapus gambar di folder img
	$m = query("SELECT * FROM menu WHERE id_menu = '$id'")[0];
	if ($m['gambar'] != 'nofoto.png') {
		unlink('../assets/img/' . $m['gambar']);
	}

	mysqli_query($conn, "DELETE FROM menu WHERE id_menu = '$id'");
	return mysqli_affected_rows($conn);
}


// hapus supplier
function hapussupplier($id) {
	$conn = koneksi();


	mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier = '$id'");
	return mysqli_affected_rows($conn);
}

// tambah supplier
function tambahsupplier($data) {
	$conn = koneksi();

	$id_supplier = htmlspecialchars($data['id_supplier']);
	$nama = htmlspecialchars($data['nama']);
	$jenis = htmlspecialchars($data['jenis']);
	$alamat = htmlspecialchars($data['alamat']);
	$no_telepon = htmlspecialchars($data['no_telepon']);
	$email = htmlspecialchars($data['email']);
	

	$query = "INSERT INTO supplier VALUES ('$id_supplier','$nama','$jenis','$alamat','$no_telepon','$email')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


// ubah supplier
function ubahsupplier($data) {
	$conn = koneksi();

	$id_supplier = htmlspecialchars($data['id_supplier']);
	$nama = htmlspecialchars($data['nama']);
	$jenis = htmlspecialchars($data['jenis']);
	$alamat = htmlspecialchars($data['alamat']);
	$no_telepon = htmlspecialchars($data['no_telepon']);
	$email = htmlspecialchars($data['email']);

	$query = "UPDATE supplier SET nama= '$nama', jenis= '$jenis', alamat= '$alamat', no_telepon= '$no_telepon', email= '$email' WHERE id_supplier = '$id_supplier'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// tambah stok
function tambahstok($data) {
	$conn = koneksi();

	$id_stok = htmlspecialchars($data['id_stok']);
	$id_supplier = htmlspecialchars($data['id_supplier']);
	$nama_bahan = htmlspecialchars($data['nama_bahan']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$satuan = htmlspecialchars($data['satuan']);
	$query = "INSERT INTO stok VALUES ('$id_stok','$id_supplier','$nama_bahan', '$jumlah', '$satuan')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// ubah stok
function ubahstok($data) {
	$conn = koneksi();

	$id_stok = htmlspecialchars($data['id_stok']);
	$id_supplier = htmlspecialchars($data['id_supplier']);
	$nama_bahan = htmlspecialchars($data['nama_bahan']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$satuan = htmlspecialchars($data['satuan']);
	$id_stok = htmlspecialchars($data['id_stok']);
	$query = "UPDATE stok SET id_supplier='$id_supplier',nama_bahan='$nama_bahan', jumlah='$jumlah', satuan='$satuan' WHERE id_stok='$id_stok'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus stok
function hapusstok($id) {
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM stok WHERE id_stok = '$id'");
	return mysqli_affected_rows($conn);
}

// ubah pegawai
function ubahpegawai($data) {
	$conn = koneksi();

	$id = htmlspecialchars($data['id_pegawai']);
	$nama = htmlspecialchars($data['nama']);
	$posisi = htmlspecialchars($data['posisi']);
	$alamat = htmlspecialchars($data['alamat']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$no_telp = htmlspecialchars($data['no_telepon']);
	$gambar_lama = htmlspecialchars($data['gambar_lama']);

	$gambar = uploadpegawai();
	if (!$gambar) {
		return false;
	}

	if ($gambar == 'nofoto.png') {
		$gambar = $gambar_lama;
	}

	$query = "UPDATE pegawai SET nama='$nama',posisi='$posisi',alamat='$alamat',tanggal_lahir='$tanggal_lahir',no_telepon='$no_telp',gambar='$gambar' WHERE id_pegawai='$id'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function uploadpegawai() {
	$nama_file = $_FILES['gambar']['name'];
	$tipe_file = $_FILES['gambar']['type'];
	$ukuran_file = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	// ketika tidak ada gambar yg dipilih
	if ($error == 4) {
		// echo "<script>
		// alert('pilih gambar terlebih dahulu!');
		// </script>";

		return 'nofoto.png';
	}

	// cek ekstensi file
	$daftar_gambar = ['jpg', 'jpeg', 'png'];
	$ekstensi_file = explode('.', $nama_file);
	$ekstensi_file = strtolower(end($ekstensi_file));
	if (!in_array($ekstensi_file, $daftar_gambar)) {
		echo "<script>
		alert('yang anda pilih bukan gambar!');
		</script>";

		return false;
	}

	// cek tipe file
	if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
		echo "<script>
		alert('yang anda pilih bukan gambar!');
		</script>";

		return false;
	}

	// cek ukuran file
	// maksimal 5Mb = 5000000
	if ($ukuran_file > 5000000) {
		echo "<script>
		alert('ukuran terlalu besar!');
		</script>";

		return false;
	}

	// lolos pengecekan
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	move_uploaded_file($tmp_file, '../assets/img/pegawai/' . $nama_file_baru);

	return $nama_file_baru;
}

// tambah pegawai
function tambahpegawai($data) {
	$conn = koneksi();

	$id = htmlspecialchars($data['id_pegawai']);
	$nama = htmlspecialchars($data['nama']);
	$posisi = htmlspecialchars($data['posisi']);
	$alamat = htmlspecialchars($data['alamat']);
	$tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
	$no_telp = htmlspecialchars($data['no_telepon']);
	// $gambar = htmlspecialchars($data['gambar']);

	// upload gambar
	$gambar = uploadpegawai();
	if (!$gambar) {
		return false;
	}
	$query = "INSERT INTO pegawai VALUES ('$id','$nama','$posisi','$alamat','$tanggal_lahir','$no_telp','$gambar')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus pegawai 
function hapuspegawai($id) {
	$conn = koneksi();
	$p = " ";
	// menghapus gambar di folder img
	$p = query("SELECT * FROM pegawai WHERE id_pegawai = '$id'")[0];
	if ($p['gambar'] != 'nofoto.png') {
		unlink('../assets/img/pegawai/' . $p['gambar']);
	}

	mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = '$id'");
	return mysqli_affected_rows($conn);
}

?>