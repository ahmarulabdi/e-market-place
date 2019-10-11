<?php
if ($_GET) {
	// menampilkan menu ?open
	switch ($_GET['user']) {
		// awal
		case '':
			if(!file_exists ($administrator_dir.'admin_dashboard.php'))
			die ("Filed tidak ada!");
			include $administrator_dir.'admin_dashboard.php'; break;

		//pengalihan ketika sudah login
		case 'login':
			if(!file_exists ($administrator_dir.'admin_dashboard.php'))
			die ("File tidak ada!");
			include $administrator_dir.'admin_dashboard.php'; break;
		case 'login_proses':
			if(!file_exists ($administrator_dir.'admin_dashboard.php'))
			die ("File tidak ada!");
			include $administrator_dir.'admin_dashboard.php'; break;

		// halaman utama admin
		case 'admin_dashboard':
			if(!file_exists ($administrator_dir.'admin_dashboard.php'))
			die ("File tidak ada!");
			include $administrator_dir.'admin_dashboard.php'; break;
		//menu
		case 'pekerjaan':
			if(!file_exists ($administrator_dir.'pekerjaan.php'))
			die ("File tidak ada!");
			include $administrator_dir.'pekerjaan.php'; break;
		case 'subpekerjaan':
			if(!file_exists ($administrator_dir.'subpekerjaan.php'))
			die ("File tidak ada!");
			include $administrator_dir.'subpekerjaan.php'; break;
		case 'user':
			if(!file_exists ($administrator_dir.'user.php'))
			die ("File tidak ada!");
			include $administrator_dir.'user.php'; break;



	}
}
else {
	// halaman utama admin
	if(!file_exists ($administrator_dir.'admin_dashboard.php'))
	die ("Filed tidak ada!");
	include $administrator_dir.'admin_dashboard.php';
}
?>
