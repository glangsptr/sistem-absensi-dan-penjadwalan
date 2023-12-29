<form action="<?= base_url('siswa/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Nama Siswa</label>
		<input type="text" name="nama_siswa" class="form-control">
		<?= form_error('nama_siswa', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Kelas</label>
		<input type="text" name="kelas_siswa" class="form-control">
		<?= form_error('kelas_siswa', '<div class="text-small text-danger">', '</div'); ?>		
	</div>	
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat_siswa" class="form-control"></textarea>
		<?= form_error('alamat_siswa', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>		
</form>