<?php
$tgl = "2013-11-09"; // bisa juga diambil dari sumber database

$tanggal = date("Y-m",strtotime($tgl));



echo "Format tanggal awal: $tgl<br />";

echo "Format tanggal baru: $tanggal";
 ?>
