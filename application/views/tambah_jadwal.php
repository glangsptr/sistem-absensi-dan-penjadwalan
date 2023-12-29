<form action="<?= base_url('jadwal/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Hari</label>
		<input type="text" name="id_jadwal" class="form-control">
		<?= form_error('id_jadwal', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Mapel</label>
		<input type="text" name="jadwal_mapel" class="form-control">
		<?= form_error('jadwal_mapel', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Nama Dosen</label>
		<input type="text" name="jadwal_guru" class="form-control">
		<?= form_error('jadwal_guru', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Ruang Kelas</label>
		<input type="text" name="jadwal_kelas" class="form-control">
		<?= form_error('jadwal_kelas', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Jam Mulai / jam Berakhir</label>
		<input type="text" name="jadwal_waktu" class="form-control">
		<?= form_error('jadwal_waktu', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>		
</form>