<div class="col-12">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title"><i class="bi bi-journal-bookmark-fill me-2"></i> Daftar Buku</h4>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Buku
      </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr>
              <th>Cover</th>
              <th>Judul</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($books as $b) : ?>
              <tr>
                <td>
                  <img src="<?= $b->cover ?: 'https://via.placeholder.com/60x80.png?text=No+Cover' ?>"
                       alt="cover" class="img-thumbnail" style="width:60px; height:80px;">
                </td>
                <td><?= $b->judul ?></td>
                <td><?= $b->mapel ?></td>
                <td><?= $b->kelas ?></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline-primary"
                          data-bs-toggle="modal" data-bs-target="#bookModal"
                          onclick="editBook(<?= $b->id ?>)">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger"
                          data-bs-toggle="modal" data-bs-target="#deleteModal"
                          onclick="deleteBook(<?= $b->id ?>)">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form action="<?= site_url('admin/buku/store') ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="bookId">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="mapel" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" id="mapel" name="mapel" required>
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" required>
          </div>
          <div class="mb-3">
            <label for="cover" class="form-label">URL Cover</label>
            <input type="url" class="form-control" id="cover" name="cover">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= site_url('admin/buku/delete') ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="id" id="deleteBookId">
          <i class="bi bi-trash-fill text-danger fs-1 mb-3"></i>
          <p>Apakah Anda yakin ingin menghapus buku ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
