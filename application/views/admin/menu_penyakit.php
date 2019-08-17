<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<?= $this->session->flashdata('msg') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Data Penyakit
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kode</th>
								<th>Nama Penyakit</th>
								<th>-</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($penyakit as $i => $row): ?>
								<tr>
									<td><?= $i + 1 ?></td>
									<td><?= $row->kode ?></td>
									<td><?= $row->nama_penyakit ?></td>
									<td>
										<div class="btn-group">
											<a class="btn blue btn-xs" href="<?= base_url('admin/tambah-gejala-penyakit/' . $row->id) ?>">
												<i class="fa fa-edit"></i> Tambah Gejala
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<a href="<?= base_url('admin/input-penyakit') ?>" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Buat Penyakit Baru</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>