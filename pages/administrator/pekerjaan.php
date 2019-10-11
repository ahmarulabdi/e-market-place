<div class="row">
	<div class="col-sm-12">
		<h3 class="page-header">Data Pekerjaan</h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
			<?php
				if(isset($_GET["update"])){
					$id_kerja = $_GET["id_kerja"];
					if($id_kerja != 0){
						$where = array("id_kerja"=>$id_kerja);
						$r = $table->select("data_pekerjaan",$where);
			?>
						<div class="jumbotron">
							<form method="post" action="?user=edit">
								<div class="form-group">
									<input required="required" type="hidden" name="id_kerja" value="<?php echo $id_kerja; ?>">
									<label>Nama Pekerjaan</label>
									<input required="required" type="text" class="form-control" name="nama_kerja" value="<?php echo $r["nama_kerja"]; ?>" placeholder="Masukkan Nama Kerja">
									<label>Bobot</label>
									<input required="required" type="text" class="form-control" name="bobot" value="<?php echo $r["bobot"]; ?>" placeholder="Masukkan Bobot">
								</div>
								<input required="required" type="submit" class="btn btn-primary" name="pekerjaan">
								<a href="?user=pekerjaan" class="btn btn-default" >close</a>
							</form>
						</div>
			<?php
					}
				}
				else if(isset($_GET["tambah"])){
			?>
				<div class="jumbotron">
					<form method="post" action="?user=add">
						<div class="form-group">
							<label>Nama Pekerjaan</label>
							<input required="required" type="text" class="form-control" name="nama_kerja" placeholder="Masukkan Nama Kerja">
							<label>Bobot</label>
							<input required="required" type="text" class="form-control" name="bobot" placeholder="Masukkan Bobot">
						</div>
							<input required="required" type="submit" class="btn btn-primary" name="pekerjaan">
							<input required="required" type="reset" class="btn btn-danger">
							<a href="?user=pekerjaan" class="btn btn-default" >close</a>
					</form>
				</div>
			<?php
				}
			?>
	</div>
	<div class="col-sm-12">
		<?php if (isset($_GET['false'])): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
				<span class="text-danger">Pekerjaan yang dilaksanakan tidak bisa di hapus</span>
			</div>
		<?php endif; ?>
		<a class="btn btn-success" href="?user=pekerjaan&tambah">tambah</a>
		<br/><br/>
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>Nama Kerja</th>
				<th>Bobot</th>
				<th>Aksi</th>
			</tr>
			<?php
				$myrow = $table->view("data_pekerjaan");
				foreach ($myrow as $row) {
				?>
				<tr>
					<td><?php echo $row["id_kerja"]; ?></td>
					<td><?php echo $row["nama_kerja"]; ?></td>
					<td><?php echo $row["bobot"]; ?></td>
					<td>
						<a href="?user=pekerjaan&update&id_kerja=<?php echo $row["id_kerja"]; ?>" class="btn btn-info btn-xs">Edit</a>
						<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&pekerjaan=1&id_kerja=<?php echo $row['id_kerja']; ?>&navbar=1');">Delete</a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</div>
</div>
<!-- DELETE -->
<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data Pekerjaan ?</h4>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Popup untuk delete-->
<!-- Javascript untuk popup modal Delete -->
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    };
</script>
