<h3 class="page-header">Beranda Pengguna</h3>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<strong>Aplikasi Saya </strong>
			<div class="btn-group pull-right">
				<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
				</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
					class="glyphicon glyphicon-th"></span>Grid</a>
				</div>
			</div>
			<div id="products" class="row list-group">
				<?php
				$app = $table->view('data_aplikasi');
				foreach($app as $r){
					?>
					<?php if ($hak_akses == 'member'): ?>
						<?php if ($r["id_user"] == $id_user): ?>
							<div class="item  col-xs-4 col-lg-4">
								<div class="thumbnail">
									<img class="group list-group-image" src="assets/images/app/<?php echo $r['gambar_aplikasi']; ?>"
									alt="<?php echo $r['gambar_aplikasi']; ?>" />
									<div class="caption">
										<h4 class="group inner list-group-item-heading">
											<strong><?= $r['nama_aplikasi']?></strong>
										</h4>
											<p class="group inner list-group-item-text">
												</p>
												<div class="row">
														<div class="col-xs-12">
															<table class="table table-striped">
																<tr>
																	<td>Kontraktor</td>
																	<td><?= $r['kontraktor'] ?></td>
																</tr>
																<tr>
																	<td>Lokasi</td>
																	<td><?= $r['lokasi'] ?></td>
																</tr>
																<tr>
																	<td>Lokasi</td>
																	<td><?= $r['lokasi'] ?></td>
																</tr>
																<tr>
																	<td>Tanggal Mulai</td>
																	<td><?= $r['tanggal_mulai'] ?></td>
																</tr>
																<tr>
																	<td>Tanggal Mulai</td>
																	<td><?= $r['id_user'] ?></td>
																</tr>
															</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php elseif ($hak_akses == ('administrator'||'programmer'||'analis')): ?>
					<?php endif; ?>
						<?php
					} ?>
						</div>
	</div>
</div>
