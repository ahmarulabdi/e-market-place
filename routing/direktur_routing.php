<?php
if ($_GET) {
	// menampilkan menu ?open
	switch ($_GET['user']) {
		// awal
		case '':
			if(!file_exists ($direktur_dir.'direktur_dashboard.php'))
			die ("Filed tidak ada!");
			include $direktur_dir.'direktur_dashboard.php'; break;

		//pengalihan ketika sudah login
		case 'login':
			if(!file_exists ($direktur_dir.'direktur_dashboard.php'))
			die ("File tidak ada!");
			include $direktur_dir.'direktur_dashboard.php'; break;
		case 'login_proses':
			if(!file_exists ($direktur_dir.'direktur_dashboard.php'))
			die ("File tidak ada!");
			include $direktur_dir.'direktur_dashboard.php'; break;

		// halaman utama direktur
		case 'direktur_dashboard':
			if(!file_exists ($direktur_dir.'direktur_dashboard.php'))
			die ("File tidak ada!");
			include $direktur_dir.'direktur_dashboard.php'; break;
	}
}
else {
	// halaman utama direktur
	if(!file_exists ($direktur_dir.'direktur_dashboard.php'))
	die ("Filed tidak ada!");
	include $direktur_dir.'direktur_dashboard.php';

}
?>
