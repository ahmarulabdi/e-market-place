<div class="img-responsive">
  </div>
  <div class="container">
        <div class="col-lg-6 col-lg-offset-3" >
            <div class="logingrid-jack-1">
					<form method="post" action="?user=add">
						<div class="form-group">
							<label>Username</label>
							<input required="required" type="text" class="form-control" name="username" placeholder="Username Anda">
							<label>Password</label>
							<input required="required" type="password" class="form-control" name="password" placeholder="Password Anda">
							<label>Konfirmasi Password</label>
							<input required="required" type="password" class="form-control" name="konfirmasi_password" placeholder="Password Konfirmasi">
							<input required="required" type="hidden" name="hak_akses" value="pengunjung">
							<?php if (isset($_GET['password'])): ?>
								<?php if ($_GET['password'] == 'false'): ?>
									<span class="text-danger">password tidak sesuai</span><br>
								<?php endif; ?>
							<?php endif; ?>
							<label>Nama Anda</label>
							<input required="required" type="text" class="form-control" name="nama_user" placeholder="Nama Anda">
							<label>Email</label>
							<input required="required" type="email" class="form-control" name="email" placeholder="Email Anda">
						</div>
							<button type="submit" class="btn btn-l btn-success " name="registrasi">Registrasi</button>
							<input type="reset" class="btn btn-l btn-danger ">
							<a href="?user=login" class="btn btn-l btn-default ">Kembali</a>
					</form>
            </div>
        </div>
      </img>
    </div>
