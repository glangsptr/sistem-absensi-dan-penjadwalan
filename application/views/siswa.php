<?= $this->session->flashdata('pesan');?>
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('siswa/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Siswa</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Siswa</th>
          <th>NIS</th>
          <th>Kelas</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach($siswa as $ssw) : ?>
        <tbody>
          <tr>
              <td><?= $no++ ?></td>
              <td><?= $ssw->nama_siswa ?></td>
              <td><?= $ssw->id_siswa ?></td>
              <td><?= $ssw->id_kelas ?></td>
              <td><?= $ssw->alamat ?></td>
              <td>
                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
        </tbody>
    <?php endforeach ?>
      </table>
    </div>
</div>