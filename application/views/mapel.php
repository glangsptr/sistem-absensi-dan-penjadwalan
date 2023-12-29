<?= $this->session->flashdata('pesan');?>
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('mapel/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Mapel</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Mata Pelajaran</th>
          <th>Kode Mapel</th>
          <th>Nama Guru</th>
          <th>Waktu Perminggu</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach($mapel as $ssw) : ?>
        <tbody>
          <tr>
              <td><?= $no++ ?></td>
              <td><?= $ssw->nama_mapel ?></td>
              <td><?= $ssw->id_mapel ?></td>
              <td><?= $ssw->guru_mapel ?></td>
              <td><?= $ssw->waktu_mapel ?></td>
              <td>
                <button data-toggle="modal" data-target="#edit<?= $ssw->id_mapel ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('mapel/delete/' . $ssw->id_mapel) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        </tbody>
    <?php endforeach ?>
      </table>
    </div>
</div>
<?php foreach($mapel as $ssw) { ?>
<div class="modal fade" id="edit<?= $ssw->id_mapel ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="<?= base_url('mapel/edit/' . $ssw->id_mapel) ?>" method="POST">
                <div class="form-group">
                  <label>mapel</label>
                  <input type="text" name="nama_mapel" class="form-control" value="<?= $ssw->nama_mapel ?>">
                  <?= form_error('nama_mapel', '<div class="text-small text-danger">', '</div'); ?>   
                </div>
                <div class="form-group">
                  <label>Guru Mapel</label>
                  <input type="text" name="guru_mapel" class="form-control" value="<?= $ssw->guru_mapel ?>" >
                  <?= form_error('guru_mapel', '<div class="text-small text-danger">', '</div'); ?>    
                </div>  
                <div class="form-group">
                  <label>Waktu Mapel</label>
                    <input type="text" name="waktu_mapel" class="form-control" value="<?= $ssw->waktu_mapel ?>" >
                  <?= form_error('waktu_mapel', '<div class="text-small text-danger">', '</div'); ?>   
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