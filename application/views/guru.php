<?= $this->session->flashdata('pesan');?>
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('guru/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Guru</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Guru</th>
          <th>NIP</th>
          <th>Mata Pelajaran</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach($guru as $ssw) : ?>
        <tbody>
          <tr>
              <td><?= $no++ ?></td>
              <td><?= $ssw->nama_guru ?></td>
              <td><?= $ssw->id_guru ?></td>
              <td><?= $ssw->mapel_guru ?></td>
              <td><?= $ssw->alamat_guru ?></td>
              <td>
                <button data-toggle="modal" data-target="#edit<?= $ssw->id_guru ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('guru/delete/' . $ssw->id_guru) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        </tbody>
    <?php endforeach ?>
      </table>
    </div>
</div>
<?php foreach($guru as $ssw) { ?>
<div class="modal fade" id="edit<?= $ssw->id_guru ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="<?= base_url('guru/edit/' . $ssw->id_guru) ?>" method="POST">
                <div class="form-group">
                  <label>Nama Guru</label>
                  <input type="text" name="nama_guru" class="form-control" value="<?= $ssw->nama_guru ?>">
                  <?= form_error('nama_guru', '<div class="text-small text-danger">', '</div'); ?>   
                </div>
                <div class="form-group">
                  <label>Mata Pelajaran</label>
                  <input type="text" name="mapel_guru" class="form-control" value="<?= $ssw->mapel_guru ?>" >
                  <?= form_error('mapel_guru', '<div class="text-small text-danger">', '</div'); ?>    
                </div>  
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat_guru" class="form-control"><?= $ssw->alamat_guru ?></textarea>
                  <?= form_error('alamat_guru', '<div class="text-small text-danger">', '</div'); ?>   
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