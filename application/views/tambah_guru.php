<form action="<?= base_url('guru/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Nama Guru</label>
		<input type="text" name="nama_guru" class="form-control">
		<?= form_error('nama_guru', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Mata Pelajaran</label>
		<input type="text" name="mapel_guru" class="form-control">
		<?= form_error('mapel_guru', '<div class="text-small text-danger">', '</div'); ?>		
	</div>	
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat_guru" class="form-control"></textarea>
		<?= form_error('alamat_guru', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Username</label>

		<input type="text" name="username" class="form-control">
		<?= form_error('username', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control">
		<?= form_error('password', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>		
</form>