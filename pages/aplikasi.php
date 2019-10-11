<div class="row">
	<div class="col-sm-12">
		<?php if ($hak_akses == 'member'): ?>
			<h3 class="page-header">Aplikasi Saya</h3>
		<?php elseif ($hak_akses == ('administrator'||'programmer'||'analis')): ?>
			<h3 class="page-header">Kelola Data Aplikasi</h3>
		<?php endif; ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
			<?php
				if(isset($_GET["update"])){
					$id_aplikasi = $_GET["id_aplikasi"];
					if($id_aplikasi != 0){
						$where = array("id_aplikasi"=>$id_aplikasi);
						$r = $table->select("data_aplikasi",$where);
			?>
						<div class="jumbotron">
							<form method="post" action="?user=edit" enctype="multipart/form-data">
								<div class="form-group">
									<input type="hidden" name="id_aplikasi" value="<?php echo $id_aplikasi; ?>">
									<input type="hidden" name="gambar_aplikasi" value="<?php echo $r['gambar_aplikasi'] ;?> ">
									<label>Nama Aplikasi</label>
									<input type="text" class="form-control" name="nama_aplikasi" value="<?php echo $r["nama_aplikasi"]; ?>" required="required" placeholder="Masukkan Nama Aplikasi">
									<label>Kontraktor</label>
									<input type="text" class="form-control" name="kontraktor" value="<?php echo $r["kontraktor"]; ?>" required="required" placeholder="Masukkan Kontraktor">
									<label>Lokasi</label>
									<input type="text" class="form-control" name="lokasi" value="<?php echo $r["lokasi"]; ?>" required="required" placeholder="Masukkan Lokasi">
									<label>Tanggal Mulai</label>
									<input type="date" class="form-control tanggal" name="tanggal_mulai" value="<?php echo $r["tanggal_mulai"]; ?>" required="required" placeholder="Masukkan Tanggal Mulai">
									<?php if ($hak_akses != 'member'): ?>
										<label>ID User</label>
										<input type="number" class="form-control" name="id_user" required="required" placeholder="Masukkan ID User">
									<?php else: ?>
										<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user; ?>">
									<?php endif; ?>
									<div class="form-group">
									  <label for=""> UI App</label>
									  <input type="file" name="foto" class="btn btn-info">
									</div>
								</div>
								<input type="submit" class="btn btn-primary" name="aplikasi">
								<a href="?user=aplikasi" class="btn btn-default" >close</a>
							</form>
						</div>
			<?php
					}
				}
				else if(isset($_GET["tambah"])){
			?>
				<div class="jumbotron">
					<form method="post" action="?user=add" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Aplikasi</label>
							<input type="text" class="form-control" name="nama_aplikasi" required="required" placeholder="Masukkan Nama Aplikasi">
							<label>Kontraktor</label>
							<input type="text" class="form-control" name="kontraktor" required="required" placeholder="Masukkan Kontraktor">
							<label>Lokasi</label>
							<input type="text" class="form-control" name="lokasi" required="required" placeholder="Masukkan Lokasi">
							<label>Tanggal Mulai</label>
							<input type="text" class="form-control tanggal"  name="tanggal_mulai" required="required" placeholder="Masukkan Tanggal Mulai">
							<!-- <input type="text" class="form-control tanggal" name="jdwl_masuk" required="required" placeholder="Jadwal Masuk"> -->
							<?php if ($hak_akses != 'member'): ?>
								<label>ID User</label>
								<input type="number" class="form-control" name="id_user" required="required" placeholder="Masukkan ID User">
							<?php else: ?>
								<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user; ?>">
							<?php endif; ?>
							<div class="form-group">
							  <label for=""> UI App</label>
							  <input type="file" name="foto" class="btn btn-info" required="required">
							</div>

						</div>
							<input type="submit" class="btn btn-primary" name="aplikasi">
							<input type="reset" class="btn btn-danger">
							<a href="?user=aplikasi" class="btn btn-default" >close</a>
					</form>
				</div>
			<?php
				}
			?>
	</div>
	<div class="col-sm-12">
		<?php if ($hak_akses == ('administrator'||'programmer'||'analis')): ?>
			<?php if (isset($_GET['false'])): ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					Aplikasi yang sedang dikembangkan tidak bisa di hapus
				</div>
			<?php endif; ?>
			<a class="btn btn-success" href="?user=aplikasi&tambah">tambah</a>
		<?php endif; ?>
		<br/><br/>
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>Nama Aplikasi</th>
				<th>Kontraktor</th>
				<th>Lokasi</th>
				<th>Tanggal Mulai</th>
				<th>ID User</th>
				<th>UI App</th>
				<th>Status App</th>
				<th>Aksi</th>
			</tr>
			<?php
				$myrow = $table->view("data_aplikasi");
				foreach ($myrow as $row) {
				?>
				<?php if ($hak_akses == 'member'): ?>
					<?php if ($row["id_user"] == $id_user): ?>
						<tr>
							<td><?php echo $row["id_aplikasi"]; ?></td>
							<td><?php echo $row["nama_aplikasi"]; ?></td>
							<td><?php echo $row["kontraktor"]; ?></td>
							<td><?php echo $row["lokasi"]; ?></td>
							<td><b><?php echo $row["tanggal_mulai"]; ?></b></td>
							<td><b><?php echo $row["id_user"]; ?></b></td>
							<td><img style="width : 200px;" src="assets/images/app/<?php echo $row['gambar_aplikasi']; ?>"></td>
							<td><b><?php echo $row["status"]; ?></b></td>
							<td>
								<a href="?user=aplikasi&update&id_aplikasi=<?php echo $row["id_aplikasi"]; ?>" class="btn btn-info btn-xs">Edit</a>
								<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&aplikasi=1&id_aplikasi=<?php echo $row["id_aplikasi"]; ?>&navbar=1');">Delete</a>
							</td>
						</tr>
					<?php endif; ?>
				<?php elseif ($hak_akses == ('administrator'||'programmer'||'analis')): ?>
					<tr>
						<td><?php echo $row["id_aplikasi"]; ?></td>
						<td><?php echo $row["nama_aplikasi"]; ?></td>
						<td><?php echo $row["kontraktor"]; ?></td>
						<td><?php echo $row["lokasi"]; ?></td>
						<td><b><?php echo $row["tanggal_mulai"]; ?></b></td>
						<td><b><?php echo $row["id_user"]; ?></b></td>
						<td><img style="width : 200px;" src="assets/images/app/<?php echo $row['gambar_aplikasi']; ?>"></td>
						<td><b><?php echo $row["status"]; ?></b></td>
						<td>
							<a href="?user=aplikasi&update&id_aplikasi=<?php echo $row["id_aplikasi"]; ?>" class="btn btn-info btn-xs">Edit</a>
							<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&aplikasi=1&id_aplikasi=<?php echo $row["id_aplikasi"]; ?>&navbar=1');">Delete</a>
						</td>
					</tr>

				<?php endif; ?>
			<?php
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
                <h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data Aplikasi ?</h4>
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
