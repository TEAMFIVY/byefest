<div class="col-12">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h4 class="card-title"><i class="bi bi-journal-bookmark-fill me-2"></i> Daftar Buku</h4>
			<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBookModal">
				<i class="bi bi-plus-circle me-1"></i> Tambah Buku
			</button>
		</div>
		<div class="card-body">

			<!-- Notifikasi -->
			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success alert-dismissible fade show">
				<i class="bi bi-check-circle me-1"></i>
				<?= $this->session->flashdata('success') ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			</div>
			<?php elseif ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<i class="bi bi-exclamation-triangle me-1"></i>
				<?= $this->session->flashdata('error') ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			</div>
			<?php endif; ?>

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
						<?php foreach ($books as $b): ?>
						<tr>
							<td>
								<img src="<?= $b->cover 
        ? base_url('assets/uploads/buku/' . $b->cover) 
        : 'https://via.placeholder.com/60x80.png?text=No+Cover' ?>" class="img-thumbnail"
									style="width:120px; height:80px;">
							</td>

							<td><?= $b->judul ?></td>
							<td><?= $b->mapel ?></td>
							<td><?= $b->kelas ?></td>
							<td class="text-center">
								<!-- Tombol Edit -->
								<button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
									data-bs-target="#editBookModal<?= $b->id ?>">
									<i class="bi bi-pencil-square"></i>
								</button>
								<!-- Tombol Delete -->
								<button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
									data-bs-target="#deleteBookModal<?= $b->id ?>">
									<i class="bi bi-trash"></i>
								</button>
							</td>
						</tr>

						<!-- Modal Edit -->
						<div class="modal fade" id="editBookModal<?= $b->id ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<form action="<?= site_url('admin/buku/update') ?>" method="post"
										enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title">Edit Buku</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id" value="<?= $b->id ?>">
											<div class="mb-3">
												<label for="judul<?= $b->id ?>" class="form-label">Judul Buku</label>
												<input type="text" class="form-control" id="judul<?= $b->id ?>"
													name="judul" value="<?= $b->judul ?>" required>
											</div>
											<div class="mb-3">
												<label for="mapel<?= $b->id ?>" class="form-label">Mata
													Pelajaran</label>
												<input type="text" class="form-control" id="mapel<?= $b->id ?>"
													name="mapel" value="<?= $b->mapel ?>" required>
											</div>
											<div class="mb-3">
												<label for="kelas<?= $b->id ?>" class="form-label">Kelas</label>
												<input type="text" class="form-control" id="kelas<?= $b->id ?>"
													name="kelas" value="<?= $b->kelas ?>" required>
											</div>
											<div class="mb-3">
												<label for="cover<?= $b->id ?>" class="form-label">Cover Buku</label>
												<input type="file" class="form-control" id="cover<?= $b->id ?>"
													name="cover">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-light-secondary"
												data-bs-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- Modal Delete -->
						<div class="modal fade" id="deleteBookModal<?= $b->id ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form action="<?= site_url('admin/buku/delete') ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title">Hapus Buku</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body text-center">
											<input type="hidden" name="id" value="<?= $b->id ?>">
											<i class="bi bi-trash-fill text-danger fs-1 mb-3"></i>
											<p>Apakah Anda yakin ingin menghapus <strong><?= $b->judul ?></strong>?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-light-secondary"
												data-bs-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-danger">Hapus</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form action="<?= site_url('admin/buku/simpan') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Buku</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
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
						<label class="form-label">Cover Buku</label>
						<input type="file" class="form-control" id="cover" name="cover">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
