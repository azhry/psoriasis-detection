<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Daftar Gejala
					</div>
				</div>
				<div class="portlet-body">
					<?= form_open('user') ?>
						<div class="md-checkbox-list">
							<?php foreach ($gejala as $row): ?>
							<div>
								<input type="checkbox" id="checkbox-<?= $row->id ?>" name="gejala_<?= $row->id ?>" class="md-check">
								<label for="checkbox-<?= $row->id ?>">
								<span></span>
								<span class="check"></span>
								<span class="box"></span>
								<?= $row->nama_gejala ?> </label>
							</div>
							<?php endforeach; ?>
						</div>
						<input type="submit" value="Proses" name="process" class="btn btn-primary">
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<?php if (isset($result)): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Hasil
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-responsive table-hover table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Gejala</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($gejala_terpilih as $i => $row): ?>
								<tr>
									<td><?= $i + 1 ?></td>
									<td><?= $row->nama_gejala ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<p>Dari perhitungan <strong><?= count($gejala_terpilih) ?></strong> gejala tersebut didapat hasil penyakit <strong><?= $result[0]['index'] ?> (<?= implode(',', array_column($penyakit, 'nama_penyakit')) ?>)</strong> dengan nilai probabilitas <strong><?= $result[0]['nilai'] ?></strong> atau <strong><?= round($result[0]['nilai'] * 100, 2) ?> %</strong></p>
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Penyakit</th>
								<th>Saran Penanganan</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($penyakit as $i => $row): ?>
								<tr>
									<td><?= $i + 1 ?></td>
									<td><?= $row->nama_penyakit ?></td>
									<td><?= nl2br($row->saran_penanganan) ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- END PAGE CONTENT INNER -->
</div>