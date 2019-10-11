<?php
// session ketika sesudah login
if (isset($_SESSION['SES_MarketPlace'])) {
   $administrator_dir ='pages/administrator/';
   $direktur_dir ='pages/direktur/';
   $manager_dir ='pages/manager/';
   $member_dir ='pages/member/';
   $proanalis_dir ='pages/proanalis/';
   include 'user_config.php';
   if ($hak_akses == 'administrator') {
    require_once 'administrator_routing.php';
   }
   else if (($hak_akses == 'member')) {
    require_once 'member_routing.php';
   }
   else if (($hak_akses == 'programmer')||($hak_akses == 'analis')) {
    require_once 'proanalis_routing.php';
   }
   else if ($hak_akses == 'direktur') {
    require_once 'direktur_routing.php';
   }
   else if ($hak_akses == 'manager_marketing') {
    require_once 'manager_routing.php';
   }
   if ($_GET) {
      switch ($_GET['user']) {
         //profil
         case 'profil':
   			if(!file_exists ('pages/profil.php'))
   			die ("Filed tidak ada!");
   			include 'pages/profil.php'; break;
         case 'aplikasi':
   			if(!file_exists ('pages/aplikasi.php'))
   			die ("File tidak ada!");
   			include 'pages/aplikasi.php'; break;
         case 'prkb_aplikasi_proyek':
   			if(!file_exists ('pages/prkb_aplikasi_proyek.php'))
   			die ("File tidak ada!");
   			include 'pages/prkb_aplikasi_proyek.php'; break;
         case 'detail_prkb_aplikasi_proyek':
   			if(!file_exists ('pages/detail_prkb_aplikasi_proyek.php'))
   			die ("File tidak ada!");
   			include 'pages/detail_prkb_aplikasi_proyek.php'; break;
         case 'tindak_turun_tangan':
            if(!file_exists ('pages/tindak_turun_tangan.php'))
            die ("Filed tidak ada!");
            include 'pages/tindak_turun_tangan.php'; break;
   		case 'grafik':
   			if(!file_exists ('pages/grafik.php'))
   			die ("File tidak ada!");
   			include 'pages/grafik.php'; break;
   		case 'laporan':
   			if(!file_exists ('pages/laporan.php'))
   			die ("File tidak ada!");
   			include 'pages/laporan.php'; break;

         // crud
   		case 'add':
   			if(!file_exists ('core/add.php'))
   			die ("File tidak ada!");
   			include 'core/add.php';break;
   		case 'edit':
   			if(!file_exists ('core/edit.php'))
   			die ("File tidak ada!");
   			include 'core/edit.php';break;
   		case 'delete':
   			if(!file_exists ('core/delete.php'))
   			die ("File tidak ada!");
   			include 'core/delete.php';break;
         // logout
   		case 'logout':
   			if(!file_exists ('pages/logout.php'))
   			die ("File tidak ada!");
   			include 'pages/logout.php';break;
      }
   }
}
// session sebelum login
else {
   if ($_GET) {
       // menampilkan menu ?open
      switch ($_GET['user']) {
       // login
      case '':
          if(!file_exists ("pages/login.php")) die ("File tidak ada!");
          include "pages/login.php";break;
      case 'login':
          if(!file_exists ('pages/login.php')) die ("File tidak ada!");
          include 'pages/login.php'; break;
      case 'login_proses':
          if(!file_exists ('pages/login_proses.php')) die ("File tidak ada!");
          include 'pages/login_proses.php'; break;
      case 'signin':
          if(!file_exists ('pages/signin.php')) die ("File tidak ada!");
          include 'pages/signin.php'; break;
      case 'add':
			if(!file_exists ('core/add.php'))
			die ("File tidak ada!");
			include 'core/add.php';break;
      // logout
      case 'logout':
         if(!file_exists ('pages/logout.php'))
         die ("File tidak ada!");
         include 'pages/logout.php';break;
       }
     }
   else {
      if(!file_exists ('pages/login.php')) die ("File tidak ada!");
      include 'pages/login.php';
   }
}
?>
