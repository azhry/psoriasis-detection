<div class="page-content">
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row margin-top-10">
		<div class="col-md-12">
			<h2>Sistem Pakar Untuk Menentukan Jenis Penyakit Kulit Psoriasis Menggunakan Metode Dempster-Shafer</h2>
			<h4>Usman Firnandes</h4>
			<h5>NIM. 09021181320034</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $this->session->flashdata('msg') ?>
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						Profile
					</div>
				</div>
				<div class="portlet-body">
					<?= form_open('admin/profile') ?>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" class="form-control" value="<?= $pengguna->nama ?>">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" value="<?= $pengguna->username ?>">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="rpassword">Re-type Password</label>
							<input type="password" name="rpassword" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn blue" value="Ubah">
						</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>