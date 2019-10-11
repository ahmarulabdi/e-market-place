<?php
if ($_GET) {
	// menampilkan menu ?open
	switch ($_GET['user']) {
		// awal
		case '':
			if(!file_exists ($member_dir.'member_dashboard.php'))
			die ("Filed tidak ada!");
			include $member_dir.'member_dashboard.php'; break;

		//pengalihan ketika sudah login
		case 'login':
			if(!file_exists ($member_dir.'member_dashboard.php'))
			die ("File tidak ada!");
			include $member_dir.'member_dashboard.php'; break;
		case 'login_proses':
			if(!file_exists ($member_dir.'member_dashboard.php'))
			die ("File tidak ada!");
			include $member_dir.'member_dashboard.php'; break;

		// halaman utama member
		case 'member_dashboard':
			if(!file_exists ($member_dir.'member_dashboard.php'))
			die ("File tidak ada!");
			include $member_dir.'member_dashboard.php'; break;

	}
}
else {
	// halaman utama member
	if(!file_exists ($member_dir.'member_dashboard.php'))
	die ("Filed tidak ada!");
	include $member_dir.'member_dashboard.php';

}
?>
