<?= $this->session->flashdata('pesan');?>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Hari / Tanggal</th>
          <th>Mapel</th>
          <th>Ruang Kelas</th>
          <th>Jumlah Absensi</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach($absensi as $ssw) : ?>
        <tbody>
          <tr>
              <td><?= $no++ ?></td>
              <td><?= $ssw->tanggal_absensi ?></td>
              <td><?= $ssw->nama_mapel ?></td>
              <td><?= $ssw->kelas_absensi ?></td>
              <td><?= $ssw->total_absensi ?></td>
              <td>
                <button data-toggle="modal" data-target="#edit<?= $ssw->id_absensi ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('absensi/delete/' . $ssw->id_absensi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        </tbody>
    <?php endforeach ?>
      </table>
    </div>
</div>
<!-- Modal Edit-->
<?php foreach($absensi as $ssw) { ?>
<div class="modal fade" id="edit<?= $ssw->id_absensi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="<?= base_url('absensi/edit/' . $ssw->id_absensi) ?>" method="POST">
                <div class="form-group">
                  <label>Hari / Tanggal </label>
                  <input type="date" name="tanggal_absensi" class="form-control" value="<?= $ssw->tanggal_absensi ?>">
                  <?= form_error('tanggal_absensi', '<div class="text-small text-danger">', '</div'); ?>   
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <input type="text" name="nama_mapel" class="form-control" value="<?= $ssw->nama_mapel ?>" >
                  <?= form_error('nama_mapel', '<div class="text-small text-danger">', '</div'); ?>    
                </div>  
                <div class="form-group">
                  <label>Ruang Kelas</label>
                  <input type="text" name="kelas_absensi" class="form-control" value="<?= $ssw->kelas_absensi ?>" >
                  <?= form_error('kelas_absensi', '<div class="text-small text-danger">', '</div'); ?>    
                </div>
                <div class="form-group">
                  <label>Jumlah Absensi</label>
                  <input type="text" name="total_absensi" class="form-control" value="<?= $ssw->total_absensi ?>" >
                  <?= form_error('total_absensi', '<div class="text-small text-danger">', '</div'); ?>    
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