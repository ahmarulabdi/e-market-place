<?php $date =date('Y-m-d');?>
<?php if (isset($_GET['perhari'])):
	$where_date = array('tanggal_mulai' => $date );
	$where_masuk = array('jdwl_masuk' => $date );
	$where_tgl = array('tgl' => $date );
 	?>
	<?php
	$where = array('hak_akses' => 'member');
	$data_user = $table->viewwhere('user',$where);
	$data_aplikasi = $table->viewwhere('data_aplikasi',$where_date);
	$data_prkb_aplikasi_proyek = $table->viewwhere('data_prkb_aplikasi_proyek',$where_masuk);
	$tindak_tt = $table->viewwhere('tindak_tt',$where_tgl);
	?>
<?php elseif(isset($_GET['semua'])):
	$data_user = $table->view('user');
	$data_aplikasi =$table->view('data_aplikasi');
	$data_prkb_aplikasi_proyek = $table->view('data_prkb_aplikasi_proyek');
	$tindak_tt = $table->view('tindak_tt');
endif;	?>
	<h3 class="page-header"><?= $date ?></h3>
	<h4 class="page-header">Member</h4>
	<table class="table table-bordered">
		<tr>
			<th>ID User</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<?php foreach ($data_user as $r_user): ?>
			<tr>
				<td><?= $r_user['id_user']?></td>
				<td><?= $r_user['nama_user']?></td>
				<td><?= $r_user['username']?></td>
				<td><?= $r_user['email']?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<h4 class="page-header">Aplikasi hari ini</h4>
	<table class="table table-bordered">
		<tr>
			<th>ID App</th>
			<th>Nama Aplikasi</th>
			<th>Kontraktor</th>
			<th>Lokasi</th>
			<th>Tanggal Mulai</th>
			<th>ID User</th>
			<th>Gambar App</th>
			<th>Status</th>
		</tr>
		<?php foreach ($data_aplikasi as $r_aplikasi): ?>
			<tr>
				<td><?= $r_aplikasi['id_aplikasi']?></td>
				<td><?= $r_aplikasi['nama_aplikasi']?></td>
				<td><?= $r_aplikasi['kontraktor']?></td>
				<td><?= $r_aplikasi['lokasi']?></td>
				<td><?= $r_aplikasi['tanggal_mulai']?></td>
				<td><?= $r_aplikasi['id_user']?></td>
				<td><?= $r_aplikasi['gambar_aplikasi']?></td>
				<td><?= $r_aplikasi['status']?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<h4 class="page-header">Perkembangan Aplikasi hari ini</h4>
	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>ID App</th>
			<th>ID Kerja</th>
			<th>ID Sub Kerja</th>
			<th>Tanggal</th>
			<th>Tahap</th>
			<th>Target</th>
			<th>Jenis App</th>
			<th>Realisasi</th>
			<th>Jadwal Masuk</th>
			<th>Jadwal Keluar</th>
		</tr>
		<?php foreach ($data_prkb_aplikasi_proyek as $r_prkb_aplikasi_proyek): ?>
			<tr>
				<td><?= $r_prkb_aplikasi_proyek['id_perkembangan']?></td>
				<td><?= $r_prkb_aplikasi_proyek['id_aplikasi']?></td>
				<td><?= $r_prkb_aplikasi_proyek['id_kerja']?></td>
				<td><?= $r_prkb_aplikasi_proyek['id_subkerja']?></td>
				<td><?= $r_prkb_aplikasi_proyek['tanggal']?></td>
				<td><?= $r_prkb_aplikasi_proyek['tahap']?></td>
				<td><?= $r_prkb_aplikasi_proyek['target']?></td>
				<td><?= $r_prkb_aplikasi_proyek['jenis_aplikasi']?></td>
				<td><?= $r_prkb_aplikasi_proyek['realisasi']?></td>
				<td><?= $r_prkb_aplikasi_proyek['jdwl_masuk']?></td>
				<td><?= $r_prkb_aplikasi_proyek['jdwl_keluar']?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<h4 class="page-header">Tindak Turun Tangan hari ini</h4>
	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>ID App</th>
			<th>Nama Aplikasi</th>
			<th>Tanggal Tindakan</th>
			<th>Persoalan</th>
			<th>tindakan</th>
		</tr>
		<?php foreach ($tindak_tt as $tr): ?>
			<tr>
				<td><?= $tr["id_ttt"]; ?></td>
				<td><?= $tr["id_aplikasi"]; ?></td>
				<td>
				<?php
				$id_app = $tr["id_aplikasi"];
				$where = array("id_aplikasi"=>$id_app);
				$r = $table->select("data_aplikasi",$where);
				echo $r['nama_aplikasi'];
				 ?>
				 </td>
				<td><?= $tr["tgl"]; ?></td>
				<td><?= $tr["persoalan"]; ?></td>
				<td><?= $tr["tindakan"]; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
