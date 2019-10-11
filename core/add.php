<?php
require_once 'action.php';
if(isset($_POST["pekerjaan"])){
	$myArray = array(
				"nama_kerja" => $_POST["nama_kerja"],
				"bobot" => $_POST["bobot"],
	);
	if($table->add("data_pekerjaan",$myArray)){
		header("location:?user=pekerjaan&msg=Data Ditambah");
	}
}
else if(isset($_POST["subpekerjaan"])){
	$myArray = array(
				"nama_subkerja" => $_POST["nama_subkerja"],
				"bobot" => $_POST["bobot"]
	);
	if($table->add("data_subpekerjaan",$myArray)){
		header("location:?user=subpekerjaan&msg=Data Ditambah");
	}
}
else if(isset($_POST["aplikasi"])){
	// uploadgambar
   $foto = $_FILES['foto']['name'];
   $tmp_file = $_FILES['foto']['tmp_name'];
   // penyimpanan file foto di memori
   $path = "/home/rndmjcklnx/WEBDEV/SI_EmarketPlace/assets/images/app/".$foto;
   move_uploaded_file($tmp_file, $path); // Cek apakah gambar berhasil diupload atau tidak

	$myArray = array(
		"nama_aplikasi" => $_POST["nama_aplikasi"],
		"kontraktor" => $_POST["kontraktor"],
		"lokasi" => $_POST["lokasi"],
		"tanggal_mulai" => $_POST["tanggal_mulai"],
		"id_user" => $_POST["id_user"],
		"gambar_aplikasi" => $foto
	);
	if($table->add("data_aplikasi",$myArray)){
		header("location:?user=aplikasi&msg=Data Ditambah");
	}
}
else if(isset($_POST["user"])){
	$myArray = array(
				"username" => $_POST["username"],
				"password" => md5($_POST["password"]),
				"hak_akses" => $_POST["hak_akses"],
				"nama_user" => $_POST["nama_user"]
	);
	if($table->add("user",$myArray)){
		header("location:?user=user&msg=Data Ditambah");
	}
}
else if(isset($_POST["registrasi"])){
	if ($_POST["password"] != $_POST["konfirmasi_password"] ) {
		header("location:?user=signin&password=false");
	}
	else {
		$myArray = array(
			"username" => $_POST["username"],
			"password" => md5($_POST["password"]),
			"email" => $_POST["email"],
			"hak_akses" => $_POST["hak_akses"],
			"nama_user" => $_POST["nama_user"]
		);
		// foreach ($myArray as $key => $value) {
		// 	echo $key."=>".$value."<br/>";
		// }
		if($table->add("user",$myArray)){
			header("location:?user=login&registrasi=true");
		}
	}
}
else if(isset($_POST["prkb_aplikasi_proyek"])){
	$myArray = array(
				"id_aplikasi" => $_POST["id_aplikasi"],
				"id_kerja" => $_POST["id_kerja"],
				"id_subkerja" => $_POST["id_subkerja"],
				"tahap" => $_POST["tahap"],
				"target" => $_POST["target"],
				"jenis_aplikasi" => $_POST["jenis_aplikasi"],
				"realisasi" => $_POST["realisasi"],
				"jdwl_masuk" => $_POST["jdwl_masuk"],
				"jdwl_keluar" => $_POST["jdwl_keluar"]
	);
	$myArrayapp = array("status" => $_POST['status']);
	$where = array("id_aplikasi" => $_POST["id_aplikasi"]);

	if(($table->add("data_prkb_aplikasi_proyek",$myArray))&&($table->edit('data_aplikasi',$where,$myArrayapp))){
		header(sprintf("location:?user=prkb_aplikasi_proyek&msg=Data Ditambah"));
	}
}

else if(isset($_POST["tindak_tt"])){
	$myArray = array(
				"id_aplikasi" => $_POST["id_aplikasi"],
				"persoalan" => $_POST["persoalan"],
				"tgl" => date('Y-m-d'),
				"tindakan" => $_POST["tindakan"]
	);

	if($table->add("tindak_tt",$myArray)){
		header("location:?user=tindak_turun_tangan&msg=Data Ditambah");
	}
}

 ?>
