<form action="<?= base_url('absensi/tambah_aksi') ?>" method="POST">
	<div class="form-group">
		<label>Hari / Tanggal</label>
		<input type="date" name="tanggal_absensi" class="form-control">
		<?= form_error('tanggal_absensi', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<div class="form-group">
		<label>Mapel</label>
		<input type="text" name="nama_mapel" class="form-control">
		<?= form_error('nama_mapel', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
		<div class="form-group">
		<label>Ruang Kelas</label>
		<input type="text" name="kelas_absensi" class="form-control">
		<?= form_error('kelas_absensi', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
		<div class="form-group">
		<label>Jumlah Absensi</label>
		<input type="text" name="total_absensi" class="form-control">
		<?= form_error('total_absensi', '<div class="text-small text-danger">', '</div'); ?>		
	</div>
	<button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>		
</form>