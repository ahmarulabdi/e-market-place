
<div class="row">
	<div class="col-lg-12">
      <h2 class="page-header">Data Pengguna</h2>
		<?php
		$id_user = $r['id_user'];
		$where = $arrayName = array('id_user' =>  $id_user);
		$row = $table->select('user',$where);
		$username_profil = $row['username'];
		$password_profil = $row['password'];
		$nama_user_profil = $row['nama_user'];
		?>
  	</div>
</div>
<div class="row">
	<div class="col-sm-5">
		<div class="jumbotron">
			<h4>anda terdaftar sebagai <span class="text-danger"><?php echo $hak_akses ?></span>
			pada Sistem Informasi E-Market Place</h4>
			<table class="table table-condensed">
				<tr>
					<td><h4>Username</h4></h4></td>
					<td><h4>:	<?php echo $username_profil; ?></h4></td>
				</tr>
				<tr>
					<td><h4>Nama User</h4></td>
					<td><h4>:	<?php echo $nama_user_profil; ?></h4></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-sm-5">
		<div class="form-group">
			<a href="?user=profil&rubah" class="btn btn-warning">Ubah Password ??</a>
			<?php if (isset($_GET['password'])): ?>
				<?php if ($_GET['password'] == 'changed'): ?>
					<h3 class="text text-success">password berhasil dirubah <i class="fa fa-check"></i></h3>
				<?php elseif($_GET['password'] == 'false'): ?>
					<h3 class="text text-danger">password lama salah <i class="fa fa-bolt"></i></h3>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php if (isset($_GET['rubah'])): ?>
			<form class="" action="?user=edit" method="post">
				<div class="form-group">
					<input required="required" type="hidden" name="id_user" value="<?php echo $r['id_user'] ?>">
					<input required="required" type="hidden" name="old_password_true" value="<?php echo $r['password']; ?>">
					<label for="">Password</label>
					<input required="required" type="password" class="form-control" name="old_password_inp" placeholder="password lama">
					<p class="help-block">masukkan password lama anda</p>
				</div>
				<div class="form-group">
				  <label for="">Password Baru</label>
				  <input required="required" type="password" class="form-control" name="new_password" placeholder="password baru">
				  <p class="help-block">masukkan password baru anda</p>
				</div>
				<input required="required" type="submit" name="password" class="btn btn-success" value="Rubah Password">
				<input required="required" type="reset" class="btn btn-danger" value="Reset">
				<a href="?user=profil" type="reset" class="btn btn-default" >Close</a>
			</form>
		<?php endif; ?>
	</div>
</div>
