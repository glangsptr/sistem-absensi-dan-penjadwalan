<?= $this->session->flashdata('pesan');?>
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('kelas/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kelas</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Kode Kelas</th>
          <th>Wali Kelas</th>
          <th>Anggota Kelas</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach($kelas as $ssw) : ?>
        <tbody>
          <tr>
              <td><?= $no++ ?></td>
              <td><?= $ssw->nama_kelas ?></td>
              <td><?= $ssw->id_kelas ?></td>
              <td><?= $ssw->wali_kelas ?></td>
              <td><?= $ssw->anggota_kelas ?></td>
              <td>
                <button data-toggle="modal" data-target="#edit<?= $ssw->id_kelas ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('kelas/delete/' . $ssw->id_kelas) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        </tbody>
    <?php endforeach ?>
      </table>
    </div>
</div>
<?php foreach($kelas as $ssw) { ?>
<div class="modal fade" id="edit<?= $ssw->id_kelas ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="<?= base_url('kelas/edit/' . $ssw->id_kelas) ?>" method="POST">
                <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" name="nama_kelas" class="form-control" value="<?= $ssw->nama_kelas ?>">
                  <?= form_error('nama_kelas', '<div class="text-small text-danger">', '</div'); ?>   
                </div>
                <div class="form-group">
                  <label>Wali Kelas</label>
                  <input type="text" name="wali_kelas" class="form-control" value="<?= $ssw->wali_kelas ?>" >
                  <?= form_error('wali_kelas', '<div class="text-small text-danger">', '</div'); ?>    
                </div>  
                <div class="form-group">
                  <label>Anggota Kelas</label>
                  <textarea name="anggota_kelas" class="form-control"><?= $ssw->anggota_kelas ?></textarea>
                  <?= form_error('anggota_kelas', '<div class="text-small text-danger">', '</div'); ?>   
                </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i></i>Simpan</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i></i>Reset</button>
                  </div>
              </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>