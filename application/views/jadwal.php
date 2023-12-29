<?= $this->session->flashdata('pesan');?>
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('jadwal/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Jadwal</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Hari</th>
          <th>Mapel</th>
          <th>Nama Guru</th>
          <th>Ruang jadwal</th>
          <th>Jam Mulai / Jam Berakhir</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php ;
      foreach($jadwal as $ssw) : ?>
        <tbody>
          <tr>
              <td><?= $ssw->id_jadwal ?></td>
              <td><?= $ssw->jadwal_mapel ?></td>
              <td><?= $ssw->jadwal_guru ?></td>
              <td><?= $ssw->jadwal_kelas ?></td>
              <td><?= $ssw->jadwal_waktu ?></td>
              <td>
                <button data-toggle="modal" data-target="#edit<?= $ssw->id_jadwal ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('jadwal/delete/' . $ssw->id_jadwal) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        </tbody>
    <?php endforeach ?>
      </table>
    </div>
</div>
<?php foreach($jadwal as $ssw) { ?>
<div class="modal fade" id="edit<?= $ssw->id_jadwal ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="<?= base_url('jadwal/edit/' . $ssw->id_jadwal) ?>" method="POST">
                <div class="form-group">
                  <label>Hari</label>
                  <input type="text" name="id_jadwal" class="form-control" value="<?= $ssw->id_jadwal ?>">
                  <?= form_error('id_jadwal', '<div class="text-small text-danger">', '</div'); ?>   
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <input type="text" name="jadwal_mapel" class="form-control" value="<?= $ssw->jadwal_mapel ?>" >
                  <?= form_error('jadwal_mapel', '<div class="text-small text-danger">', '</div'); ?>    
                </div>
                <div class="form-group">
                  <label>Nama Dosen</label>
                  <input type="text" name="jadwal_guru" class="form-control" value="<?= $ssw->jadwal_guru ?>" >
                  <?= form_error('jadwal_guru', '<div class="text-small text-danger">', '</div'); ?>    
                </div>
                <div class="form-group">
                  <label>Ruang Kelas</label>
                  <input type="text" name="jadwal_kelas" class="form-control" value="<?= $ssw->jadwal_kelas ?>" >
                  <?= form_error('jadwal_kelas', '<div class="text-small text-danger">', '</div'); ?>    
                </div>
                <div class="form-group">
                  <label>Waktu Mulai / Waktu Berakhir</label>
                  <input type="text" name="jadwal_waktu" class="form-control" value="<?= $ssw->jadwal_waktu ?>" >
                  <?= form_error('jadwal_waktu', '<div class="text-small text-danger">', '</div'); ?>    
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