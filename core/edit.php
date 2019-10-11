<?php
require_once 'action.php';
if(isset($_POST["pekerjaan"])){
	$id_kerja = $_POST["id_kerja"];
	$where = array("id_kerja"=>$id_kerja);
	$myArray = array(
				"nama_kerja" => $_POST["nama_kerja"],
				"bobot" => $_POST["bobot"]
	);
	if($table->edit("data_pekerjaan",$where,$myArray)){
		header("location:?user=pekerjaan&msg=Update Data Berhasil");
	}
}
else if(isset($_POST["subpekerjaan"])){
	$id_subkerja = $_POST["id_subkerja"];
	$where = array("id_subkerja"=>$id_subkerja);
	$myArray = array(
				"nama_subkerja" => $_POST["nama_subkerja"],
				"bobot" => $_POST["bobot"]
	);
	if($table->edit("data_subpekerjaan",$where,$myArray)){
	header("location:?user=subpekerjaan&msg=Update Data Berhasil");
	}
}
else if(isset($_POST["user"])){
	$id_user = $_POST["id_user"];
	$where = array("id_user"=>$id_user);
	$myArray = array(
				"username" => $_POST["username"],
				"password" => md5($_POST["password"]),
				"hak_akses" => $_POST["hak_akses"],
				"nama_user" => $_POST["nama_user"]
	);
	if($table->edit("user",$where,$myArray)){
	header("location:?user=user&msg=Update Data Berhasil");
	}
}
else if(isset($_POST["aplikasi"])){
	// uploadgambar
   $foto = $_FILES['foto']['name'];
   $tmp_file = $_FILES['foto']['tmp_name'];
   // penyimpanan file foto di memori
   $path = "/home/rndmjcklnx/WEBDEV/SI_EmarketPlace/assets/images/app/".$foto;
   move_uploaded_file($tmp_file, $path); // Cek apakah gambar berhasil diupload atau tidak

	if ($foto == '') {
		$foto = $_POST['gambar_aplikasi'];
	}

	$id_aplikasi = $_POST["id_aplikasi"];
	$where = array("id_aplikasi"=>$id_aplikasi);
	$myArray = array(
		"nama_aplikasi" => $_POST["nama_aplikasi"],
		"kontraktor" => $_POST["kontraktor"],
		"lokasi" => $_POST["lokasi"],
		"tanggal_mulai" => $_POST["tanggal_mulai"],
		"id_user" => $_POST["id_user"],
		"gambar_aplikasi" => $foto
	);
	foreach ($myArray as $key => $value) {
		echo $key."->".$value."<br/>";
	}
	if($table->edit("data_aplikasi",$where,$myArray)){
	header("location:?user=aplikasi&msg=Update Data Berhasil");
	}
}
else if(isset($_POST["password"])){
	$decriptpass = $_POST['old_password_inp'];
	$ecriptpass = md5($decriptpass);
	if ($_POST['old_password_true'] != $ecriptpass ) {
		header("location:?user=profil&password=false&rubah");
	}
	else {
		$id_user = $_POST["id_user"];
		$where = array("id_user"=>$id_user);
		$encrpt_newpass = md5($_POST['new_password']);
		$myArray = array(
			"password" => $encrpt_newpass
		);
		if($table->edit("user",$where,$myArray)){
			header("location:?user=profil&password=changed");
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
	foreach ($myArray as $key => $value) {
		echo $key."=>".$value."<br/>";
	}
	$id_perkembangan = $_POST["id_perkembangan"];
	$where = array("id_perkembangan"=>$id_perkembangan);
	if($table->edit("data_prkb_aplikasi_proyek",$where,$myArray)){
		header("location:?user=prkb_aplikasi_proyek&prkb_aplikasi_proyek=changed");
	}
}
else if(isset($_POST["tindak_tt"])){
	$id_ttt = $_POST["id_ttt"];
	$where = array("id_ttt"=>$id_ttt);
	$myArray = array(
				"id_aplikasi" => $_POST["id_aplikasi"],
				"persoalan" => $_POST["persoalan"],
				"tgl" => date('Y-m-d'),
				"tindakan" => $_POST["tindakan"]
	);
	foreach ($myArray as $key => $value) {
		echo $key."=>".$value."<br/>";
	}
	if($table->edit("tindak_tt",$where,$myArray)){
	header("location:?user=tindak_turun_tangan&msg=Update Data Berhasil");
	}
}
elseif(isset($_GET["active"])) {

	$id_user = $_GET["id_user"];
	$where = array("id_user"=>$id_user);
	$myArray = array(
				"hak_akses" => 'member'
	);
	if($table->edit("user",$where,$myArray)){
	header("location:?user=user&msg=Activated");
	}
}

 ?>
