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

//function untuk menambahkan data didalam database
function tambahkeranjang($data) {
	$conn = koneksi();

	$id_transaksi = htmlspecialchars($data['id_transaksi']);
	$id_menu = htmlspecialchars($data['id_menu']);
	$tanggal = htmlspecialchars($data['tanggal']);
	$nama = htmlspecialchars($data['nama_menu']);
	$porsi = htmlspecialchars($data['porsi']);
	$harga = htmlspecialchars($data['harga']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$subtotal = htmlspecialchars($data['subtotal']);

	$query = "INSERT INTO keranjang VALUES ('$id_transaksi','$id_menu','$tanggal','$nama','$porsi','$harga','$jumlah','$subtotal')";

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
	$harga = htmlspecialchars($data['harga']);
	$jumlah = htmlspecialchars($data['jumlah']);
	$subtotal = htmlspecialchars($data['subtotal']);

	$query = "UPDATE keranjang SET tanggal='$tanggal',nama_menu='$nama',porsi='$porsi',harga='$harga',jumlah='$jumlah',subtotal='$subtotal' WHERE id_menu = '$id_menu'";

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

	$query = "UPDATE meja SET status='$status' WHERE id_meja = '$id'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

// hapus meja
function hapusmeja($id) {
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM meja WHERE id_meja = '$id'");
	return mysqli_affected_rows($conn);
}

?>