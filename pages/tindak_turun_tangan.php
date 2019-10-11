<div class="row">
	<div class="col-sm-10">
		<?php if ($hak_akses == 'member'): ?>
			<h3 class="page-header">Lihat Tindak Turun Tangan Aplikasi Saya</h3>
		<?php elseif (($hak_akses == 'programmer') || ($hak_akses == 'analis' )): ?>
			<h3 class="page-header">Lihat Tindak Turun Tangan Semua Aplikasi</h3>
		<?php elseif ($hak_akses == ('manager_marketing')): ?>
			<h3 class="page-header">Kelola Tindak Turun Tangan Semua Aplikasi</h3>
		<?php endif; ?>
			<?php
				if(isset($_GET["update"])){
					$id_ttt = $_GET["id_ttt"];
					if($id_ttt != 0){
						$where = array("id_ttt"=>$id_ttt);
						$r = $table->select("tindak_tt",$where);
						?>
						<h4>Edit Tindak turun Tangan</h4>
							<form method="post" action="?user=edit">
								<input type="hidden" name="id_ttt" value="<?= $r['id_ttt']?>">
								<div class="col-sm-6">
									<div class="jumbotron">
										<h3>Pilih Aplikasi</h3>
									<table class="table table-bordered">
										<tr>
											<th>Id Aplikasi</th>
											<th>Nama Aplikasi</th>
											<th></th>
										</tr>
											<?php
											$tindak_tt = $table->view('data_aplikasi');
											foreach ($tindak_tt as $rapp) {?>
												<tr>
													<td>
														<?= $rapp['id_aplikasi'] ?>
													</td>
													<td>
														<?= $rapp['nama_aplikasi'] ?>
													</td>
													<td>
														<input type="radio" name="id_aplikasi" value="<?= $rapp['id_aplikasi'] ?>" ></input>
													</td>
												</tr>
											<?php
											}
											 ?>
									</table>
								</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Persoalan</label>
										<input type="text" class="form-control" name="persoalan" value="<?= $r['persoalan']; ?>"
										 placeholder="Masukkan Persoalan">
									</div>
									<div class="form-group">
										<label>Tindakan</label>
										<input type="text" class="form-control" name="tindakan" value="<?= $r['tindakan']; ?>"
										placeholder="Masukkan Tindakan">
									</div>
								</div>
									<input type="submit" class="btn btn-primary" name="tindak_tt">
									<input type="reset" class="btn btn-danger">
									<a href="?user=tindak_turun_tangan" class="btn btn-default" >close</a>
								</div>
							</form>
			<?php
					}
				}
				else if(isset($_GET["tambah"])){
			?>
			<h4>Tambah Tindak turun Tangan</h4>
					<form method="post" action="?user=add">
						<div class="col-sm-6">
							<div class="jumbotron">
								<h4>Pilih Aplikasi :</h4>
							<table class="table table-bordered">
								<tr>
									<th>Id Aplikasi</th>
									<th>Nama Aplikasi</th>
									<th></th>
								</tr>
									<?php
									$tindak_tt = $table->view('data_aplikasi');
									foreach ($tindak_tt as $r) {?>
										<tr>
											<td>
												<?= $r['id_aplikasi'] ?>
											</td>
											<td>
												<?= $r['nama_aplikasi'] ?>
											</td>
											<td>
												<input required="required" type="radio" name="id_aplikasi" value="<?= $r['id_aplikasi'] ?>"></input>
											</td>
										</tr>
									<?php
									}
									 ?>
							</table>
						</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Persoalan</label>
								<input required="required" type="text" class="form-control" name="persoalan" placeholder="Masukkan Persoalan">
							</div>
							<div class="form-group">
								<label>Tindakan</label>
								<input required="required" type="text" class="form-control" name="tindakan" placeholder="Masukkan Tindakan">
							</div>
						</div>
							<input type="submit" class="btn btn-primary" name="tindak_tt">
							<input type="reset" class="btn btn-danger">
							<a href="?user=tindak_turun_tangan" class="btn btn-default" >close</a>
						</div>
					</form>
			<?php
				}
			?>
	</div>
	<div class="col-sm-10">
		<?php if ($hak_akses == 'manager_marketing'): ?>
			<a class="btn btn-success" href="?user=tindak_turun_tangan&tambah">tambah</a>
		<?php endif; ?>
		<br/><br/>
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>ID Aplikasi</th>
				<th>Nama Aplikasi</th>
				<th>tanggal tindakan</th>
				<th>Persoalan</th>
				<th>Tindakan</th>
				<?php if ($hak_akses == 'manager_marketing'): ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
			<?php
			$where = array('id_user' => $id_user );
			$apprt = $table->select("data_aplikasi",$where);
			$myrow = $table->view("tindak_tt");
			foreach ($myrow as $tr) {
				if ($hak_akses == 'member') {?>
					<?php if ($apprt['id_aplikasi'] == $tr['id_aplikasi']): ?>
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
						<?php if ($hak_akses == 'manager_marketing'): ?>
							<td>
								<a href="?user=user&update&id_user=<?php echo $row["id_user"]; ?>" class="btn btn-info btn-xs">Edit</a>
								<a href="?user=delete&userdelete=1&id_user=<?php echo $row["id_user"]; ?>" class="btn btn-danger btn-xs">Delete</a>
							</td>
						<?php endif; ?>
					</tr>
					<?php endif; ?>
			<?php
				}
				else { ?>
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
						<?php if ($hak_akses == 'manager_marketing'): ?>
							<td>
								<a href="?user=tindak_turun_tangan&update&id_ttt=<?php echo $tr["id_ttt"]; ?>" class="btn btn-info btn-xs">Edit</a>
								<a href="?user=delete&tindak_tt=1&id_ttt=<?php echo $tr["id_ttt"]; ?>" class="btn btn-danger btn-xs">hapus</a>
								<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&tindak_tt=1&id_ttt=<?php echo $tr["id_ttt"]; ?>&navbar=1');">Delete</a>
							</td>
						<?php endif; ?>
					</tr>
				<?php }
			}
			?>
		</table>
	</div>
</div>
<!-- DELETE -->
<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Tindak turun Tangan ?</h4>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Popup untuk delete-->
<!-- Javascript untuk popup modal Delete -->
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    };
</script>
