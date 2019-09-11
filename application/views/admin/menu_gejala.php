<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<?= $this->session->flashdata('msg') ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Data Gejala
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kode Gejala</th>
								<th>Nama Gejala</th>
								<th>Belief</th>
								<th>Plausibility</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($gejala as $i => $row): ?>
								<tr>
									<td><?= $i + 1 ?></td>
									<td><?= $row->kode ?></td>
									<td><?= $row->nama_gejala ?></td>
									<td><?= $row->belief ?></td>
									<td><?= 1 - $row->belief ?></td>
									<td>
										<div class="btn-group">
											<a class="btn blue" href="<?= base_url('admin/edit-gejala/' . $row->id) ?>">
												<i class="fa fa-edit"></i> Edit
											</a>
											<!-- <a class="btn red" href="#button">
												<i class="fa fa-trash"></i> Delete
											</a> -->
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<a href="<?= base_url('admin/input-gejala') ?>" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Buat Gejala Baru</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>