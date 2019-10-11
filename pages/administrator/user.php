<div class="row">
	<div class="col-sm-12">
		<h3 class="page-header">Data User</h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
			<?php
				if(isset($_GET["update"])){
					$id_user = $_GET["id_user"];
					if($id_user != 0){
						$where = array("id_user"=>$id_user);
						$r = $table->select("user",$where);
			?>
						<div class="jumbotron">
							<form method="post" action="?user=edit">
								<div class="form-group">
									<input required="required"type="hidden" name="id_user" value="<?php echo $id_user; ?>">
									<label>Username</label>
									<input required="required" type="text" class="form-control" name="username" value="<?php echo $r["username"]; ?>" placeholder="Masukkan Username">
									<label>Password</label>
									<input required="required" type="password" class="form-control" name="password" placeholder="Masukkan Password">
									<label for="hak_akses">Hak Akses :</label>
									<select class="form-control m-bot15" name="hak_akses">
										<?php $hak_akses = $r['hak_akses']; ?>
										<option <?php if($r['hak_akses'] == 'administrator'){echo 'selected="selected"';} ?> >Administrator</option>
										<option <?php if($r['hak_akses'] == 'member'){echo 'selected="selected"';} ?> >Member</option>
										<option <?php if($r['hak_akses'] == 'pengunjung'){echo 'selected="selected"';} ?> >Pengunjung</option>
										<option <?php if($r['hak_akses'] == 'programmer'){echo 'selected="selected"';} ?> >Programmer</option>
										<option <?php if($r['hak_akses'] == 'analis'){echo 'selected="selected"';} ?> >Analis</option>
										<option <?php if($r['hak_akses'] == 'manager_marketing'){echo 'selected="selected"';} ?> >Manager Marketing</option>
										<option <?php if($r['hak_akses'] == 'direktur'){echo 'selected="selected"';} ?> >Direktur</option>
									</select>
									<label>Nama User</label>
									<input required="required" type="text" class="form-control" name="nama_user" value="<?php echo $r["nama_user"]; ?>" placeholder="Masukkan Nama User">
								</div>
								<input required="required" type="submit" class="btn btn-primary" name="user">
								<a href="?user=user" class="btn btn-default" >close</a>
							</form>
						</div>
			<?php
					}
				}
				else if(isset($_GET["tambah"])){
			?>
				<div class="jumbotron">
					<form method="post" action="?user=add">
						<div class="form-group">
							<label>Username</label>
							<input required="required" type="text" class="form-control" name="username" placeholder="Masukkan Username">
							<label>Password</label>
							<input required="required" type="password" class="form-control" name="password" placeholder="Masukkan Password">
							<label for="hak_akses">Hak Akses :</label>
							<select class="form-control m-bot15" name="hak_akses">
								<?php
								$hak_akses = array(
									'administrator' => 'Administrator' ,
									'member' => 'Member' ,
									'pengunjung' => 'Pengunjung' ,
									'programmer' => 'Programmer' ,
									'analis' => 'Analis' ,
									'manager_marketing' => 'Manager Marketing' ,
									'direktur' => 'Direktur'
								);
									foreach ($hak_akses as $key => $value) {
										echo "<option value='".$key."'>".$value."</option>";
									}
								?>
							</select>
							<label>Nama User</label>
							<input required="required" type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama User">
						</div>
							<input required="required" type="submit" class="btn btn-primary" name="user">
							<input required="required" type="reset" class="btn btn-danger">
							<a href="?user=user" class="btn btn-default" >close</a>
					</form>
				</div>
			<?php
				}
			?>
	</div>
	<div class="col-sm-12">
		<a class="btn btn-success" href="?user=user&tambah">tambah</a>
		<br/><br/>
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Hak Akses</th>
				<th>Nama User</th>
				<th>Email</th>
				<th>Aksi</th>
			</tr>
			<?php
				$myrow = $table->view("user");
				foreach ($myrow as $row) {
				?>
				<?php if ($row["username"] != $user ): ?>
					<tr>
						<td><?php echo $row["id_user"]; ?></td>
						<td><?php echo $row["username"]; ?></td>
						<?php if ($row["hak_akses"] == 'pengunjung'): ?>
							<td>
								<span class="	text text-danger">
									<?php echo $row["hak_akses"]; ?>
								</span>
							</td>
						<?php else: ?>
							<td><?php echo $row["hak_akses"]; ?></td>
						<?php endif; ?>
						<td><?php echo $row["nama_user"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td>
							<?php if ($row["hak_akses"] == 'pengunjung'): ?>
								<a href="?user=edit&active=1&id_user=<?php echo $row["id_user"]; ?>" class="btn btn-success btn-xs">Aktifkan</a>
							<?php else: ?>
								<a href="?user=user&update&id_user=<?php echo $row["id_user"]; ?>" class="btn btn-info btn-xs">Edit</a>
							<?php endif; ?>
							<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&userdelete=1&id_user=<?php echo $row['id_user']; ?>&navbar=1');">
								Delete
							</a>
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
                <h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data User ?</h4>
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
