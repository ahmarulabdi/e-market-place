<?php

include "db.php";

class Table extends Database
{
	public function add($table,$fileds){
		//"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
		$sql = "";
		$sql .= "INSERT INTO ".$table;
		$sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
		$sql .= "('".implode("','", array_values($fileds))."')";
		echo "$sql";
		$query = mysqli_query($this->con,$sql);
		var_dump($query);
		if($query){
			return true;
		}
	}
	public function view($table){
		$sql = "SELECT * FROM ".$table;
		$array = array();
		$query = mysqli_query($this->con,$sql);
		while($r = mysqli_fetch_assoc($query)){
			$array[] = $r;
		}
		return $array;
	}
	public function edit($table,$where,$fields){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND m_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		foreach ($fields as $key => $value) {
			//UPDATE table SET m_name = '' , qty = '' WHERE id = '';
			$sql .= $key . "='".$value."', ";
		}
		$sql = substr($sql, 0,-2);
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		if(mysqli_query($this->con,$sql)){
			return true;
		}
	}
	public function delete($table,$where){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
		$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql = "DELETE FROM ".$table." WHERE ".$condition;
		echo $sql;
		if(mysqli_query($this->con,$sql)){
			return true;
		}
	}
}
class TableAdvanced extends Table
{
	public function select($table,$where){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND m_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_array($query);
		return $row;
	}
	public function selectnot($table,$where){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND m_name = 'something'
			$condition .= $key . "!='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_array($query);
		return $row;
	}
	public function selectmax($table,$where,$fields){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND m_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT max(".$fields.") FROM ".$table." WHERE ".$condition;
		echo $sql;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_array($query);
		return $row;
	}
	public function viewwhere($table,$where){
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND m_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql = "SELECT * FROM ".$table." where ".$condition;
		$array = array();
		$query = mysqli_query($this->con,$sql);
		while($r = mysqli_fetch_assoc($query)){
			$array[] = $r;
		}
		return $array;
	}
	public function viewpermonth_id($table,$id_user){
		$sql = "SELECT CONCAT(YEAR(tanggal_mulai),'-0',MONTH(tanggal_mulai)) AS bulan, COUNT(*) AS jumlah_bulanan
		FROM ".$table." where id_user = ".$id_user."
		GROUP BY MONTH(tanggal_mulai)";
		$array = array();
		$query = mysqli_query($this->con,$sql);
		while($r = mysqli_fetch_assoc($query)){
			$array[] = $r;
		}
		return $array;
	}
	public function viewpermonth_all($table){
		$sql = "SELECT CONCAT(YEAR(tanggal_mulai),'-0',MONTH(tanggal_mulai)) AS bulan, COUNT(*) AS jumlah_bulanan
		FROM ".$table."
		GROUP BY MONTH(tanggal_mulai)";
		$array = array();
		$query = mysqli_query($this->con,$sql);
		while($r = mysqli_fetch_assoc($query)){
			$array[] = $r;
		}
		return $array;
	}
}
$table = new TableAdvanced;

?>
