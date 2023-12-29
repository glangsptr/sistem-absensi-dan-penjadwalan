<form action="<?= base_url('mapel/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Mata Pelajaran</label>
		<input type="text" name="nama_mapel" class="form-control">
		<?= form_error('nama_mapel', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Nama Guru</label>
		<input type="text" name="guru_mapel" class="form-control">
		<?= form_error('guru_mapel', '<div class="text-small text-danger">', '</div'); ?>		
	</div>	
	<div class="form-group">
		<label>Waktu Perminggu</label>
		<input type="text" name="waktu_mapel" class="form-control">
		<?= form_error('waktu_mapel', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>		
</form>