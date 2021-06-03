const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const hasilCari = document.querySelector('.hasil-cari');

// hilangkan tombol cari
tombolCari.style.display = 'none';

// event ketika kita menuliskan keyword meja
keyword.addEventListener('keyup', function () {
	// fetch()
	fetch('../ajax/cari_stok.php?keyword=' + keyword.value)
		.then((response) => response.text())
		.then((response) => (hasilCari.innerHTML = response));

});