<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<?= $this->session->flashdata('msg') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Form Tambah Gejala Penyakit
					</div>
				</div>
				<div class="portlet-body">
					<?= form_open('admin/tambah-gejala-penyakit/' . $id_penyakit) ?>
						<table class="table table-bordered table-striped table-hover">
							<tbody>
								<tr>
									<td width="20%"><strong>Nama Penyakit</strong></td>
									<td><?= $penyakit->nama_penyakit ?></td>
								</tr>
								<tr>
									<td><strong>Kode</strong></td>
									<td><?= $penyakit->kode ?></td>
								</tr>
								<tr>
									<td><strong>Saran Penanganan</strong></td>
									<td><?= $penyakit->nama_penyakit ?></td>
								</tr>
							</tbody>
						</table>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Gejala</th>
									<th>Belief</th>
									<th>Plausibility</th>
									<th>-</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($penyakit->gejala_penyakit as $i => $gejala): ?>
									<tr>
										<td><?= $i + 1 ?></td>
										<td><?= $gejala->gejala->nama_gejala ?></td>
										<td><?= $gejala->gejala->belief ?></td>
										<td><?= 1 - $gejala->gejala->belief ?></td>
										<td>
											<a class="btn red btn-xs" href="<?= base_url('admin/hapus-gejala-penyakit?id_penyakit=' . $penyakit->id . '&id_gejala=' . $gejala->gejala->id) ?>">Hapus Gejala</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<hr>
						<h3>Tambah Gejala Baru</h3>
						<div class="form-group">
							<label for="nama_gejala">Nama Gejala</label>
							<textarea class="form-control" name="nama_gejala"></textarea>
						</div>
						<div class="form-group">
							<label for="belief">Belief</label>
							<input type="number" step="any" name="belief" class="form-control">
						</div>
						<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>