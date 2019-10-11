  <div class="container">
        <div class="col-lg-6 col-lg-offset-3" >
            <div class="logingrid-jack-1">
              <span class="text text-center"><h3>Sistem Informasi <span class="text text-primary">E-MarketPlace</span></h3></span>
               <?php if (isset($_GET['registrasi'])): ?>
                  <?php if ($_GET['registrasi'] == 'true'): ?>
                     <h3 class="text-center text-success">Registrasi Berhasil<i class="fa fa-check"></i></h3>
                  <?php endif; ?>
               <?php endif; ?>
               <?php if (isset($_GET['auth'])): ?>
                  <?php if ($_GET['auth'] == 'false'): ?>
                     <h3 class="text-center text-danger">Login Gagal<i class="fa fa-bolt"></i></h3>
                  <?php endif; ?>
               <?php endif; ?>
                <form class="form-horizontal" role="form" method="post" action="?user=login_proses">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input required="required" type="text" class="form-control" name="txtusername" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input required="required" type="password" class="form-control" name="txtpassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <label for="">
                                <input type="checkbox" name="" value="show password">
                                show password
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="btnlogin" >Log In</button>
                    <a href="?user=signin" class="btn btn-success btn-block" >Sign In</a>
                </form>
            </div>
        </div>
    </div>
