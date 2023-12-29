<form action="<?= base_url('kelas/tambah_aksi') ?>" method="POST">
  <div class="form-group">
    <label>Kelas</label>
    <input type="text" name="nama_kelas" class="form-control">
    <?= form_error('nama_kelas', '<div class="text-small text-danger">', '</div'); ?>    
  </div>
  <div class="form-group">
    <label>Wali Kelas</label>
    <input type="text" name="wali_kelas" class="form-control">
    <?= form_error('wali_kelas', '<div class="text-small text-danger">', '</div'); ?>   
  </div>  
  <div class="form-group">
    <label>Anggota Kelas</label>
    <textarea name="anggota_kelas" class="form-control"></textarea>
    <?= form_error('anggota_kelas', '<div class="text-small text-danger">', '</div'); ?>    
  </div>
  <button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
  <button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>    
</form>