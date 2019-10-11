<?php if (isset($_SESSION['SES_MarketPlace'])): ?>
	<?php if ($hak_akses == 'administrator'): ?>
		<!-- Sidebar -->
        <div class="nav-side-menu" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="?user=admin_dashboard" class=""><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="?user=prkb_aplikasi_proyek" class=""><i class="fa fa-bar-chart-o fa-fw"></i> Perkembangan Aplikasi</a>
                    </li>
						  <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Kelola Proyek<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="?user=aplikasi" class="">Aplikasi</a></li>
                            <li><a href="?user=pekerjaan" class="">Pekerjaan</a></li>
                            <li><a href="?user=subpekerjaan" class=""></i>Sub Pekerjaan</a></li>
                        </ul>
                    </li>
						  <li>
							  <a href="?user=user" class=""><i class="fa fa-users fa-fw"></i> Kelola User</a>
						  </li>
                </ul>

            </div>
        </div>
	<?php elseif ($hak_akses == 'member'): ?>
		<!-- Sidebar -->
			<div class="nav-side-menu" role="navigation">
				<div class="sidebar-nav navbar-collapse">

	          	<ul class="nav" id="side-menu">
	              	<li>
	                  <a href="?user=member_dashboard" class=""><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
	              	</li>
	              	<li>
	                  <a href="?user=aplikasi" class=""><i class="fa fa-flask fa-fw"></i> Aplikasi</a>
	              	</li>
	              	<li>
	                  <a href="?user=prkb_aplikasi_proyek" class=""><i class="fa fa-pencil-square-o fa-fw"></i> Data Perkembangan</a>
	              	</li>
					  	<li>
						  <a href="?user=tindak_turun_tangan" class=""><i class="fa fa-flag fa-fw"></i>Tindak Turun Tangan</a>
					  	</li>
	              	<li>
	                  <a href="?user=grafik" class=""><i class="fa fa-bar-chart-o fa-fw"></i> Grafik Proyek</a>
	              	</li>
	          	</ul>

	      	</div>
	  		</div>
	<?php elseif (($hak_akses == 'programmer')||($hak_akses == 'analis')): ?>
		<!-- Sidebar -->
        <div class="nav-side-menu" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="?user=proanalis_dashboard" class=""><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="?user=aplikasi" class=""><i class="fa fa-flask fa-fw"></i> Semua Aplikasi</a>
                    </li>
                    <li>
                        <a href="?user=prkb_aplikasi_proyek" class=""><i class="fa fa-pencil-square-o fa-fw"></i> Data Perkembangan</a>
                    </li>
                    <li>
                        <a href="?user=tindak_turun_tangan" class=""><i class="fa fa-flag fa-fw"></i>Tindak Turun Tangan</a>
                    </li>
						  <li>
							  <a href="?user=grafik" class=""><i class="fa fa-bar-chart-o fa-fw"></i> Grafik Proyek</a>
						  </li>

                    <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="?user=laporan&perhari">Perhari</a></li>
                            <li><a href="?user=laporan&semua">Semua</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
	<?php elseif($hak_akses == 'manager_marketing'): ?>
		<!-- Sidebar -->
        <div class="nav-side-menu" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="?user=member_dashboard" class=""><i class="fa fa-home fa-fw"></i> Beranda</a>
                    </li>
						  <li>
                        <a href="?user=prkb_aplikasi_proyek" class=""><i class="fa fa-pencil-square-o fa-fw"></i> Data Perkembangan</a>
                    </li>
                    <li>
                        <a href="?user=tindak_turun_tangan" class=""><i class="fa fa-flag fa-fw"></i>Tindak Turun Tangan</a>
                    </li>
						  <li>
							  <a href="?user=member_dashboard" class=""><i class="fa fa-bar-chart-o fa-fw"></i> Grafik Per Proyek</a>
						  </li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Proyek</a></li>
                            <li><a href="#">Per Proyek</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
	<?php endif; ?>
<?php endif; ?>
