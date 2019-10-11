<div class="row">
	<div class="col-sm-12">
		<?php if(($hak_akses == 'administrator') || ($hak_akses =='manager_marketing')): ?>
			<h3 class="page-header">Data Perkembangan Aplikasi Proyek Seluruh</h3>
		<?php elseif($hak_akses == 'member'): ?>
			<h3 class="page-header">Perkembangan Aplikasi Saya</h3>
		<?php elseif (($hak_akses == 'programmer') || ($hak_akses == 'analis')): ?>
			<h3 class="page-header">Kelola Data Perkembangan Semua Aplikasi</h3>
		<?php endif; ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php
				if(isset($_GET["update"])){
					$id_perkembangan = $_GET["id_perkembangan"];
					if($id_perkembangan != 0){
						$where = array("id_perkembangan"=>$id_perkembangan);
						$r = $table->select("data_prkb_aplikasi_proyek",$where);
			?>
							<div class="jumbotron">
								<div class="row">
									<section>
										<div class="wizard">
											<div class="wizard-inner">
												<div class="connecting-line"></div>
												<ul class="nav nav-tabs" role="tablist">
													<li role="presentation" class="active">
														<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
															<span class="round-tab">
																	  <i class="glyphicon glyphicon-folder-open"></i>
																 </span>
														</a>
													</li>

													<li role="presentation" class="disabled">
														<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
															<span class="round-tab">
																	  <i class="glyphicon glyphicon-pencil"></i>
																 </span>
														</a>
													</li>
													<li role="presentation" class="disabled">
														<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
															<span class="round-tab">
																	  <i class="glyphicon glyphicon-picture"></i>
																 </span>
														</a>
													</li>

													<li role="presentation" class="disabled">
														<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
															<span class="round-tab">
																	  <i class="glyphicon glyphicon-ok"></i>
																 </span>
														</a>
													</li>
												</ul>
											</div>

											<form role="form" action="?user=edit" method="post" enctype="multipart/form-data">
												<div class="tab-content">
													<div class="tab-pane active" role="tabpanel" id="step1">
														<h4>Langkah 1 : Pilih Aplikasi</h4>
															<table class="table table-hover">
																<tr>
																	<td>ID Aplikasi</td>
																	<td>Nama Aplikasi</td>
																	<td>Pilih</td>
																	<?php
																	$mytr = $table->view('data_aplikasi');
																	?>
																</tr>
																<?php foreach ($mytr as $tr): ?>
																	<tr>
																		<td><?php echo $tr['id_aplikasi'] ?></td>
																		<td><?php echo $tr['nama_aplikasi'] ?></td>
																		<td>
																			<input type="radio" name="id_aplikasi" value="<?php echo $tr['id_aplikasi'] ?>" class="btn btn-primary next-step"/>
																		</td>
																	</tr>
																<?php endforeach; ?>
															</table>
														<ul class="list-inline pull-right">
														</ul>
													</div>
													<div class="tab-pane" role="tabpanel" id="step2">
														<h4>Langkah 2 : Isi Pekerjaan</h4>
														<table class="table table-hover">
															<tr>
																<td>ID Pekerjaan</td>
																<td>Nama Pekerjaan</td>
																<?php
																$mytr = $table->view('data_pekerjaan');
																?>
															</tr>
															<?php foreach ($mytr as $tr): ?>
																<tr>
																	<td><?php echo $tr['id_kerja'] ?></td>
																	<td><?php echo $tr['nama_kerja'] ?></td>
																	<td>
																		<input type="radio" name="id_kerja" value="<?php echo $tr['id_kerja'] ?>" class="btn btn-primary next-step"/>
																	</td>
																</tr>
															<?php endforeach; ?>
														</table>

														<ul class="list-inline pull-right">
															<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
														</ul>
													</div>
													<div class="tab-pane" role="tabpanel" id="step3">
														<h4>Langkah 3 : Isi Sub Pekerjaan</h4>
														<table class="table table-hover">
															<tr>
																<td>ID Sub Pekerjaan</td>
																<td>Nama Sub Pekerjaan</td>
																<?php
																$mytr = $table->view('data_subpekerjaan');
																?>
															</tr>
															<?php foreach ($mytr as $tr): ?>
																<tr>
																	<td><?php echo $tr['id_subkerja'] ?></td>
																	<td><?php echo $tr['nama_subkerja'] ?></td>
																	<td>
																		<input type="radio" name="id_subkerja" value="<?php echo $tr['id_subkerja'] ?>" class="btn btn-primary next-step"/>
																	</td>
																</tr>
															<?php endforeach; ?>
														</table>
														<ul class="list-inline pull-right">
															<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
														</ul>
													</div>
													<div class="tab-pane" role="tabpanel" id="complete">
														<h4>Langkah 4 : Isi Beberapa Informasi Perkembangan Aplikasi</h4>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="hidden" name="id_perkembangan" value="<?php echo $id_perkembangan ;?> ">
															  <label for=""> Tahap</label>
															  <input type="number" class="form-control" name="tahap" value="<?php echo $r['tahap'];?>"
															   required="required" placeholder="Tahap">
															</div>
															<div class="form-group">
															  <label for=""> Jenis Aplikasi</label>
															  <input type="text" class="form-control" name="jenis_aplikasi" value="<?php echo $r['jenis_aplikasi'];?>"
															  required="required" placeholder="Jenis Aplikasi">
															</div>
															<div class="form-group">
															  <label for=""> Realisasi</label>
															  <input type="text" class="form-control" name="realisasi" value="<?php echo $r['realisasi'];?>"
															  required="required" placeholder="Realisasi">
															</div>
															<div class="form-group">
																<label for=""> Target</label>
																<input type="radio" required="required" class="radio-inline" name="target" <?php if($r['target'] == 'Y'){ echo 'selected'; } ?> value="Y"/>Y
																<input type="radio" required="required" class="radio-inline" name="target" <?php if($r['target'] == 'N'){ echo 'selected'; } ?> value="N"/>N
															</div>
														</div>
														<div class="col-sm-6">

															<div class="form-group">
															  <label for=""> Jadwal Masuk</label>
															  <input type="date" class="form-control tanggal" name="jdwl_masuk" value="<?php echo $r['jdwl_masuk'];?>"
															  required="required" placeholder="Jadwal Masuk">
															</div>
															<div class="form-group">
															  <label for=""> Jadwal keluar</label>
															  <input type="date" class="form-control tanggal" name="jdwl_keluar" value="<?php echo $r['jdwl_keluar'];?>"
															  required="required" placeholder="Jadwal Keluar">
															</div>

														</div>

														<ul class="list-inline pull-right">
															<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
															<button type="submit" name="prkb_aplikasi_proyek" class="btn btn-success">Simpan</button>
														</ul>
													</div>
													<div class="clearfix"></div>
													<a href="?user=prkb_aplikasi_proyek" type="button" class="btn btn-danger">
													  Close
												  </a>
												</div>
											</form>
										</div>
									</section>
								</div>
							</div>
			<?php
					}
				}
				else if(isset($_GET["tambah"])){
			?>
				<div class="jumbotron">
					<div class="row">
						<section>
							<div class="wizard">
								<div class="wizard-inner">
									<div class="connecting-line"></div>
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
												<span class="round-tab">
				                                <i class="glyphicon glyphicon-folder-open"></i>
				                            </span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
												<span class="round-tab">
				                                <i class="glyphicon glyphicon-pencil"></i>
				                            </span>
											</a>
										</li>
										<li role="presentation" class="disabled">
											<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
												<span class="round-tab">
				                                <i class="glyphicon glyphicon-picture"></i>
				                            </span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
												<span class="round-tab">
				                                <i class="glyphicon glyphicon-ok"></i>
				                            </span>
											</a>
										</li>
									</ul>
								</div>

								<form role="form" action="?user=add" method="post" enctype="multipart/form-data">
									<div class="tab-content">
										<div class="tab-pane active" role="tabpanel" id="step1">
											<h4>Langkah 1 : Pilih Aplikasi</h4>
											 	<table class="table table-hover">
												 	<tr>
														<td>ID Aplikasi</td>
												 		<td>Nama Aplikasi</td>
												 		<td>Pilih</td>
														<?php
														$where = array('status' => 'belum');
														$mytr = $table->viewwhere('data_aplikasi',$where);
														?>
												 	</tr>

													<?php foreach ($mytr as $tr): ?>
														<tr>
															<td><?php echo $tr['id_aplikasi'] ?></td>
															<td><?php echo $tr['nama_aplikasi'] ?></td>
															<td>
																<input type="radio" name="id_aplikasi" value="<?php echo $tr['id_aplikasi'] ?>" class="btn btn-primary next-step"/>
															</td>
														</tr>
													<?php endforeach; ?>
												</table>
											<ul class="list-inline pull-right">
											</ul>
										</div>
										<div class="tab-pane" role="tabpanel" id="step2">
											<h4>Langkah 2 : Isi Pekerjaan</h4>
											<table class="table table-hover">
												<tr>
													<td>ID Pekerjaan</td>
													<td>Nama Pekerjaan</td>
													<?php
													$mytr = $table->view('data_pekerjaan');
													?>
												</tr>
												<?php foreach ($mytr as $tr): ?>
													<tr>
														<td><?php echo $tr['id_kerja'] ?></td>
														<td><?php echo $tr['nama_kerja'] ?></td>
														<td>
															<input type="radio" name="id_kerja" value="<?php echo $tr['id_kerja'] ?>" class="btn btn-primary next-step"/>
														</td>
													</tr>
												<?php endforeach; ?>
											</table>

											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
											</ul>
										</div>
										<div class="tab-pane" role="tabpanel" id="step3">
											<h4>Langkah 3 : Isi Sub Pekerjaan</h4>
											<table class="table table-hover">
												<tr>
													<td>ID Sub Pekerjaan</td>
													<td>Nama Sub Pekerjaan</td>
													<?php
													$mytr = $table->view('data_subpekerjaan');
													?>
												</tr>
												<?php foreach ($mytr as $tr): ?>
													<tr>
														<td><?php echo $tr['id_subkerja'] ?></td>
														<td><?php echo $tr['nama_subkerja'] ?></td>
														<td>
															<input type="radio" name="id_subkerja" value="<?php echo $tr['id_subkerja'] ?>" class="btn btn-primary next-step"/>
														</td>
													</tr>
												<?php endforeach; ?>
											</table>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
											</ul>
										</div>
										<div class="tab-pane" role="tabpanel" id="complete">
											<h4>Langkah 4 : Isi Beberapa Informasi Perkembangan Aplikasi</h4>
											<div class="col-sm-6">
												<div class="form-group">
												  <input type="hidden" class="form-control" name="tahap" required="required"
													placeholder="Tahap" value="1">
												</div>
												<div class="form-group">
												  <label for=""> Jenis Aplikasi</label>
												  <input type="text" class="form-control" name="jenis_aplikasi" required="required"
													placeholder="Jenis Aplikasi">
												</div>
												<div class="form-group">
												  <label for=""> Realisasi</label>
												  <input type="double" class="form-control" name="realisasi" required="required"
													placeholder="Realisasi">
												</div>
												<div class="form-group">
													<label for=""> Target</label>
													<input type="radio" class="radio-inline" name="target" required="required" value="Y"/>Y
													<input type="radio" class="radio-inline" name="target" required="required" value="N"/>N
												</div>
											</div>
											<div class="col-sm-6">

												<div class="form-group">
												  <label for=""> Jadwal Masuk</label>
												  <input type="text" class="form-control tanggal" name="jdwl_masuk" required="required"
													placeholder="Jadwal Masuk">
												</div>
												<div class="form-group">
												  <label for=""> Jadwal keluar</label>
												  <input type="text" class="form-control tanggal" name="jdwl_keluar" required="required"
													placeholder="Jadwal Keluar">
												</div>
												<input type="hidden" name="status" value="sedang">

											</div>

											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
												<button type="submit" name="prkb_aplikasi_proyek" class="btn btn-success">Simpan</button>
											</ul>
										</div>
										<div class="clearfix"></div>
										<a href="?user=prkb_aplikasi_proyek" type="button" class="btn btn-danger">
										  Close
									  </a>
									</div>
								</form>
							</div>
						</section>
					</div>
				</div>
				<?php
				}
			?>
	</div>

	<div class="col-sm-12">
		<?php if ($hak_akses == 'administrator'): ?>
			<a class="btn btn-success" href="?user=prkb_aplikasi_proyek&tambah">tambah</a>
		<?php endif; ?>
		<br/><br/>
		<table class="table table-bordered table-striped">
			<tr>
				<th>#</th>
				<th>ID App</th>
				<th>ID Kerja</th>
				<th>ID Subkerja</th>
				<th>Tanggal</th>
				<th>Tahap</th>
				<th>Target</th>
				<th>Jenis Aplikasi</th>
				<th>Realisasi</th>
				<th>Jadwal Masuk</th>
				<th>Jadwal Keluar</th>
				<?php if(($hak_akses == 'programmer')||($hak_akses == 'analis') ): ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
			<?php
				$where = array('id_user' => $id_user );
				$apprt = $table->select("data_aplikasi",$where);
				$myrow = $table->view("data_prkb_aplikasi_proyek");
				foreach ($myrow as $row) {
					if ($hak_akses == 'member') { ?>
						<?php if ($apprt['id_aplikasi'] == $row['id_aplikasi']): ?>
						<tr>
							<td>
								<?php echo $row["id_perkembangan"]; ?>
							</td>
							<td>
								<button type="button" class="btn btn-danger" title="" data-container="body" data-toggle="popover" data-placement="right" data-original-title="Nama Aplikasi" data-content="<?php
								  	$where = array('id_aplikasi' => $row["id_aplikasi"]);
								  	$getr = $table->select('data_aplikasi',$where);
								  	echo $getr['nama_aplikasi'];
						  			?>">
								<?php echo $row["id_aplikasi"]; ?>
							  	</button>
							</td>
							<td>
								<button type="button" class="btn btn-warning" title="" data-container="body" data-toggle="popover" data-placement="right" data-original-title="Nama Pekerjaan" data-content="<?php
								  $where = array('id_kerja' => $row["id_kerja"]);
								  $getr = $table->select('data_pekerjaan',$where);
								  echo $getr['nama_kerja'];
							  	?>">
								<?php echo $row["id_kerja"]; ?>
							  </button>
							</td>
							<td>
								<button type="button" class="btn btn-success" title="" data-container="body" data-toggle="popover" data-placement="right" data-original-title="Nama Sub Pekerjaan" data-content="<?php
								  $where = array('id_subkerja' => $row["id_subkerja"]);
								  $getr = $table->select('data_subpekerjaan',$where);
								  echo $getr['nama_subkerja'];
							  	?>">
								<?php echo $row["id_subkerja"]; ?>
							  </button>
							</td>
							<td>
								<?php echo $row["tanggal"]; ?>
							</td>
							<td>
								<?php echo $row["tahap"]; ?>
							</td>
							<td>
								<?php echo $row["target"]; ?>
							</td>
							<td>
								<?php echo $row["jenis_aplikasi"]; ?>
							</td>
							<td><b><?php echo $row["realisasi"]; ?></b></td>
							<td><b><?php echo $row["jdwl_masuk"]; ?></b></td>
							<td><b><?php echo $row["jdwl_keluar"]; ?></b></td>
						</tr>
						<?php endif; ?>
						<?php
					}
					else {?>
						<tr>
							<td>
								<?php echo $row["id_perkembangan"]; ?>
							</td>
							<td>
								<button type="button" class="btn btn-danger" title="" data-container="body" data-toggle="popover" data-placement="right" data-original-title="Nama Aplikasi" data-content="<?php
								  	$where = array('id_aplikasi' => $row["id_aplikasi"]);
								  	$getr = $table->select('data_aplikasi',$where);
								  	echo $getr['nama_aplikasi'];
						  			?>">
								<?php echo $row["id_aplikasi"]; ?>
							  	</button>
							</td>
							<td>
								<button type="button" class="btn btn-warning" title="" data-container="body" data-toggle="popover" data-placement="right" data-original-title="Nama Pekerjaan" data-content="<?php
								  $where = array('id_kerja' => $row["id_kerja"]);
								  $getr = $table->select('data_pekerjaan',$where);
								  echo $getr['nama_kerja'];
							  	?>">
								<?php echo $row["id_kerja"]; ?>
							  </button>
							</td>
							<td>
								<button type="button" class="btn btn-success" title="" data-container="body" data-toggle="popover" data-placement="right" data-original-title="Nama Sub Pekerjaan" data-content="<?php
								  $where = array('id_subkerja' => $row["id_subkerja"]);
								  $getr = $table->select('data_subpekerjaan',$where);
								  echo $getr['nama_subkerja'];
							  	?>">
								<?php echo $row["id_subkerja"]; ?>
							  </button>
							</td>
							<td>
								<?php echo $row["tanggal"]; ?>
							</td>
							<td>
								<?php echo $row["tahap"]; ?>
							</td>
							<td>
								<?php echo $row["target"]; ?>
							</td>
							<td>
								<?php echo $row["jenis_aplikasi"]; ?>
							</td>
							<td><b><?php echo $row["realisasi"]; ?></b></td>
							<td><b><?php echo $row["jdwl_masuk"]; ?></b></td>
							<td><b><?php echo $row["jdwl_keluar"]; ?></b></td>
							<?php if(($hak_akses == 'programmer')||($hak_akses == 'analis')): ?>
								<td>
									<div class="btn-group-justified">
										<a href="?user=prkb_aplikasi_proyek&update&id_perkembangan=<?php echo $row["id_perkembangan"]; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o "></i></a>
										<a href="?user=delete&prkb_aplikasi_proyek=1&id_perkembangan=<?php echo $row["id_perkembangan"]; ?>&id_aplikasi=<?php echo $row["id_aplikasi"]; ?>" class="btn btn-danger"><i class="fa fa-trash-o "></i></a>
									</div>
								</td>
							<?php endif; ?>
						</tr>
						<?
					}
				?>

				<?php
				}
			?>
		</table>
	</div>
</div>
