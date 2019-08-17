<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<?= $this->session->flashdata('msg') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Input Penyakit
					</div>
				</div>
				<div class="portlet-body">
					<?= form_open('app/input-penyakit') ?>
						<div class="form-group">
							<label for="nama_penyakit">Nama Penyakit</label>
							<textarea class="form-control" name="nama_penyakit"></textarea>
						</div>
						<div class="form-group">
							<label for="kode">Kode</label>
							<input type="text" name="kode" maxlength="2" class="form-control">
						</div>
						<div class="form-group">
							<label for="saran_penanganan">Saran Penanganan</label>
							<textarea class="form-control" name="saran_penanganan"></textarea>
						</div>
						<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>