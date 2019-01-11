<?php 
	require 'koneksi.php';
	$response = array();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nbi = $_POST['nbi']; 
		$cek = mysqli_query($koneksi,"SELECT * FROM mhs WHERE nbi = '$nbi'");
		$ada = mysqli_num_rows($cek);
		if ($ada) {
			$query = "DELETE FROM mhs WHERE nbi ='$nbi'";
			$result = mysqli_query($koneksi, $query);
			echo json_encode(array('kode'=>1,'pesan'=>'Berhasil Hapus Data'));
		}else{
			echo json_encode(array('kode'=>3,'pesan'=>'Data Tidak Ditemukan'));
		}
	}else{
		echo json_encode(array('kode'=>4,'pesan'=>'Gagal Request Data'));
	}
 ?>