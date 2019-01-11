<?php 
	require 'koneksi.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$part = "./gambar/";
		$filename = "img".rand(9,9999).".jpg";

		$nbi = $_POST['nbi']; 
		$nama = $_POST['nama']; 
		$alamat = $_POST['alamat']; 
		$tanggal_lahir = $_POST["tanggal_lahir"]; 
		$fakultas = $_POST["fakultas"];
		$jurusan = $_POST['jurusan'];
		$jenis_kelamin = $_POST["jenis_kelamin"];
		$hobi = $_POST["hobi"];
		$kewarganegaraan = $_POST["kewarganegaraan"]; 
		$latitude = $_POST['latitude']; 
		$longitude = $_POST['longitude'];

		$cek = mysqli_query($koneksi,"SELECT * FROM mhs WHERE nbi = '$nbi' ");
		$ada = mysqli_num_rows($cek);

		if ($ada > 0) {
			if ($_FILES['imageupload']) {
				$foto = $ip.$filename;
				$query = "UPDATE mhs SET nbi ='$nbi', nama = '$nama', alamat = '$alamat', tanggal_lahir = STR_TO_DATE('$tanggal_lahir', '%Y-%m-%d'), fakultas = '$fakultas',jurusan = '$jurusan', jenis_kelamin = '$jenis_kelamin', hobi = '$hobi', kewarganegaraan = '$kewarganegaraan', foto = '$foto', latitude = '$latitude', longitude = '$longitude' WHERE nbi = '$nbi' ";
				$result = mysqli_query($koneksi, $query);
				if ($result) {
					$destinationfile = $part.$filename; 
					move_uploaded_file($_FILES['imageupload']['tmp_name'], $destinationfile);
					echo json_encode(array('kode'=>1,'pesan'=> 'Berhasil Edit Data'));
				}else{
					echo json_encode(array('kode'=>2,'pesan'=>'Gagal Edit Data'));
				}
			}
		}else{
			echo json_encode(array('kode'=>3,'pesan'=>'Data Tidak Ditemukan, Gagal Edit Data'));
		}
	}else{
		echo json_encode(array('kode'=>4,'pesan'=>'Gagal Request Data'));
	}
 ?>