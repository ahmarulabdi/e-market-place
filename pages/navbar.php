<!-- Navigation -->
<nav class="box-shadow navbar navbar-inverse navbar-fixed-top" role="navigation" id="dvs_linear_horizontal ">

   <?php if (isset($_SESSION['SES_MarketPlace'])): ?>
      <?php include 'routing/user_config.php'; ?>
      <div class="navbar-header">
         <a class="navbar-brand" href="#">E-MarketPlace</a>
      </div>
      <div class="">
      <!-- Top Navigation: Left Menu -->
      <?php if ($hak_akses == 'administrator') : ?>
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
      <?php elseif(($hak_akses == 'member')||($hak_akses == 'programmer')||($hak_akses == 'analis')) : ?>
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
      <?php elseif($hak_akses == 'direktur'): ?>
         <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="?user="><i class="fa fa-home fa-fw"></i>beranda</a></li>
            <li><a href="?user=grafik"><i class="fa fa-bar-chart-o fa-fw"></i>Grafik Per Proyek</a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   Laporan <b class="caret"></b>
               </a>
               <ul class="dropdown-menu dropdown-user">
                   <li><a href="?user=laporan&perhari"><i class="fa fa-user fa-fw"></i> Perhari</a>
                   </li>
                   </li>
                   <li class="divider"></li>
                   <li><a class=a-jack href="?user=laporan&semua"><span class="fa fa-users"></span> Semua</a></li>
               </ul>
            </li>
         </ul>
      <?php elseif($hak_akses == 'manager_marketing'): ?>

      <?php endif; ?>
      <ul class="nav navbar-right navbar-top-links">
         <?php if ($hak_akses == 'administrator'): ?>
            <li>
               <?php
               $r_user = $table->viewwhere('user',array('hak_akses' => 'pengunjung' ));
               $jml_pengunjung = count($r_user); ?>
               <?php if ($jml_pengunjung): ?>
                  <a href="?user=user">
                     <i class="fa fa-bell"></i> Calon Member <span class="label label-success">+<?=$jml_pengunjung ?></span>
                  </a>
               <?php endif; ?>

            </li>
            <span class="label label-danger">
         <?php elseif($hak_akses == ('programmer'||'analis')): ?>
            <span class="label label-primary">
         <?php elseif($hak_akses == 'manager_marketing'): ?>
            <span class="label label-success">
         <?php elseif($hak_akses == 'direktur'): ?>
            <span class="label label-info">
         <?php endif; ?>
            <?php echo $hak_akses; ?>
         </span>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   <?php echo $r['nama_user']; ?> <b class="caret"></b>
               </a>
               <ul class="dropdown-menu dropdown-user">
                   <li><a href="?user=profil"><i class="fa fa-user fa-fw"></i> Data Pengguna</a>
                   </li>
                   </li>
                   <li class="divider"></li>
                   <li><a class=a-jack href="?user=logout"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
               </ul>
            </li>
      <?php else : ?>
         <ul class="nav navbar-nav navbar-right">
           <!-- <li><a class=a-jack href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
         </ul>
      <?php endif; ?>


</nav>
<h3>navbar</h3>
