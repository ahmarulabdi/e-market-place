<?php
require_once 'action.php';
if(isset($_GET["pekerjaan"])){
	$id_kerja = $_GET["id_kerja"];
	$where = array("id_kerja"=>$id_kerja);
	if($table->delete("data_pekerjaan",$where)){
		header("location:?user=pekerjaan&msg=Hapus Data berhasil");
	}
	else {
		header("location:?user=pekerjaan&false");
	}
}
else if(isset($_GET["subpekerjaan"])){
	$id_subkerja = $_GET["id_subkerja"];
	$where = array("id_subkerja"=>$id_subkerja);
	if($table->delete("data_subpekerjaan",$where)){
		header("location:?user=subpekerjaan&msg=Hapus Data berhasil");
	}
	else {
		header("location:?user=subpekerjaan&false");
	}
}
else if(isset($_GET["userdelete"])){
	$id_user = $_GET["id_user"];
	var_dump($id_user);
	$where = array("id_user" => $id_user);
	if($table->delete("user",$where)){
		header("location:?user=user&msg=Hapus Data berhasil");
	}
}
else if(isset($_GET["aplikasi"])){
	$id_aplikasi = $_GET["id_aplikasi"];
	$where = array("id_aplikasi" => $id_aplikasi);
	$data_aplikasi = $table->delete("data_aplikasi",$where);
	$tindak_tt = $table->delete("tindak_tt",$where);
	if($table->delete("data_prkb_aplikasi_proyek",$where)){
		header("location:?user=aplikasi&msg=Hapus Data berhasil");
	}
	else {
		header("location:?user=aplikasi&false");
	}
}
else if(isset($_GET["prkb_aplikasi_proyek"])){
	$id_aplikasi = $_GET["id_aplikasi"];
	$id_perkembangan = $_GET["id_perkembangan"];
	$where = array("id_perkembangan" => $id_perkembangan);
	if($table->delete("data_prkb_aplikasi_proyek",$where)){
		$where = array('id_aplikasi' => $id_aplikasi);
		$myArray = array('status' => 'belum');
		$table->edit('data_aplikasi',$where,$myArray);
		header("location:?user=prkb_aplikasi_proyek&msg=Hapus Data berhasil");
	}
}
else if(isset($_GET["tindak_tt"])){
	$id_ttt = $_GET["id_ttt"];
	$where = array("id_ttt" => $id_ttt);
	if($table->delete("tindak_tt",$where)){
		header("location:?user=tindak_turun_tangan&msg=Hapus Data berhasil");
	}
}
?>
