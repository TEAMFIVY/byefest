<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show">
    <i class="bi bi-check-circle me-1"></i> <?= $this->session->flashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Daftar Latihan Soal</h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Mapel</th>
                    <th>Tingkat Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($latihan as $l): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $l->judul ?></td>
                    <td><?= $l->mapel ?></td>
                    <td><?= $l->tingkat_kelas ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $l->id_latihan ?>">Edit</button>
                        <a href="<?= site_url('admin/latihan/delete/'.$l->id_latihan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Delete</a>
                        <a href="<?= site_url('admin/latihan/detail/'.$l->id_latihan) ?>" class="btn btn-sm btn-primary">Detail Soal</a>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?= $l->id_latihan ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <form method="post" action="<?= site_url('admin/latihan/update') ?>">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Latihan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id_latihan" value="<?= $l->id_latihan ?>">
                          <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" value="<?= $l->judul ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label>Mapel</label>
                            <input type="text" name="mapel" value="<?= $l->mapel ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label>Tingkat Kelas</label>
                            <input type="text" name="tingkat_kelas" value="<?= $l->tingkat_kelas ?>" class="form-control" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <form method="post" action="<?= site_url('admin/latihan/simpan') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Latihan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Mapel</label>
            <input type="text" name="mapel" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Tingkat Kelas</label>
            <input type="text" name="tingkat_kelas" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
