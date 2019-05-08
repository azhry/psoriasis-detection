<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<?= $this->session->flashdata('msg') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Input Gejala
					</div>
				</div>
				<div class="portlet-body">
					<?= form_open('app/input-gejala') ?>
						<div class="form-group">
							<label for="nama_gejala">Nama Gejala</label>
							<textarea class="form-control" name="nama_gejala"></textarea>
						</div>
						<div class="form-group">
							<label for="belief">Belief</label>
							<input type="number" step="any" name="belief" class="form-control">
						</div>
						<div class="form-group">
							<label for="penyakit">Penyakit</label>
							<div class="md-checkbox-list">
								<?php foreach ($penyakit as $row): ?>
								<!-- <div class="md-checkbox"> -->
								<div>
									<input type="checkbox" id="checkbox-<?= $row->kode ?>" name="<?= $row->kode ?>" class="md-check">
									<label for="checkbox-<?= $row->kode ?>">
									<span></span>
									<span class="check"></span>
									<span class="box"></span>
									<?= $row->nama_penyakit . ' (' . $row->kode . ')' ?> </label>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>