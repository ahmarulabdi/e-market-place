<?php
// MEMBACA TOMBOL LOGIN DARI FILE login.
	if(isset($_POST['btnlogin'])){
		include 'core/conn.php';
		$txtusername = $_POST['txtusername'];
	   $ecrptpassword = $_POST['txtpassword'];
	   $txtpassword =md5($ecrptpassword) ;

	   $mysql = "SELECT * from user where username = '$txtusername' AND password = '$txtpassword' ";
	   echo $mysql;

	   
		$myquery = mysqli_query($conn,$mysql);
	   $r = mysqli_fetch_array($myquery);
  		if (mysqli_num_rows($myquery) >= 1) {

		   $_SESSION['SES_MarketPlace'] = 'default';
		   $_SESSION['SES_MarketPlace'] = $r['username'];

		   $hak_akses = $r['hak_akses'];

		   if ($hak_akses == 'administrator') {
		      header(sprintf('Location:?user=admin_dashboard'));
		   }
		   else if(($hak_akses == 'member')) {
		      header(sprintf('Location:?user=member_dashboard'));
		   }
		   else if(($hak_akses == 'programmer')||($hak_akses == 'analis')) {
		      header(sprintf('Location:?user=proanalis_dashboard'));
		   }
		   else if($hak_akses == 'direktur') {
		      header(sprintf('Location:?user=grafik'));
		   }
		   else if($hak_akses == 'manager_marketing') {
		      header(sprintf('Location:?user=manager_dashboard'));
		   }
		}
		else {
			header(sprintf('Location:?user=login&auth=false'));
		}
	}
?>
