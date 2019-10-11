<link rel="stylesheet" href="assets/css/jack-morris.css">
<script src="assets/js/jack-morris.js" charset="utf-8"></script>
<h3 class="page-header">Beranda</h3>
<?php

$jml_pengunjung = count($table->viewwhere('user',array('hak_akses' => 'pengunjung' )));
$jml_member = count($table->viewwhere('user',array('hak_akses' => 'member' )));
$jml_programmer = count($table->viewwhere('user',array('hak_akses' => 'programmer' )));
$jml_analis = count($table->viewwhere('user',array('hak_akses' => 'analis' )));
$jml_manager = count($table->viewwhere('user',array('hak_akses' => 'manager_marketing' )));
$jml_direktur = count($table->viewwhere('user',array('hak_akses' => 'direktur' )));

function penjumlahan($data_angka) {
   $hasil = 0;
   foreach ($data_angka as $index_id => $angka) {
      $hasil = $hasil + $angka;
   }
   return $hasil;
}
$arr_user = array (
            $jml_pengunjung,
            $jml_member,
            $jml_programmer,
            $jml_analis,
            $jml_manager,
            $jml_direktur
         );
$sum_all = penjumlahan($arr_user);
$ps = $sum_all/100;
 ?>
<div class="row">
  	<div class="col-sm-12">
	  	<div class="jumbotron">
			<table>
				<tr>
					<td>
                  <h3><strong>Jumlah Semua Pengguna : <?= $sum_all ?></strong></h3>
						<h3><span class="label label-default label-lg">Jumlah Calon Member : <?= $jml_pengunjung ?></span></h3>
						<h3><span class="label label-danger label-lg">Jumlah Member : <?= $jml_member ?></span></h3>
						<h3><span class="label label-primary label-lg">Jumlah Programmer : <?= $jml_programmer ?></span></h3>
						<h3><span class="label label-warning label-lg">Jumlah Analis : <?= $jml_analis ?></span></h3>
						<h3><span class="label label-info label-lg">Jumlah Manager : <?= $jml_manager ?></span></h3>
						<h3><span class="label label-success label-lg">Jumlah Direktur : <?= $jml_direktur ?></span></h3>
					</td>
					<td>
						<div class="graph-donut"id="graph" style="position:float"></div>
					</td>
				</tr>
			</table>
	  	</div>
  	</div>
		<script type="text/javascript">
			Morris.Donut({
			  element: 'graph',
			  data: [
				 {value: '<?= $ps*$jml_pengunjung ?>', label: 'calon Member'},
				 {value: '<?= $ps*$jml_member ?>', label: 'Member'},
				 {value: '<?= $ps*$jml_programmer ?>', label: 'Programmer'},
				 {value: '<?= $ps*$jml_analis ?>', label: 'Analis'},
				 {value: '<?= $ps*$jml_manager ?>', label: 'Manager'},
				 {value: '<?= $ps*$jml_direktur ?>', label: 'direktur'}
			  ],
			  backgroundColor: '#fff',
			  labelColor: '#060',
			  colors: [
				 '#777',
				 '#d9534f',
				 '#337ab7',
				 '#f0ad4e',
             '#5bc0de',
             '#5cb85c'
			  ],
			  formatter: function (x) { return x + "%"}
			});
		</script>
</div>
