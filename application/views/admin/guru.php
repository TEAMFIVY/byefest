<div class="col-12">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h4 class="card-title"><i class="bi bi-people-fill me-2"></i> Daftar Guru | Byefest</h4>
			<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGuruModal">
				<i class="bi bi-plus-circle me-1"></i> Tambah Guru
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
							<th>ID Guru</th>
							<th>Nama Guru</th>
							<th>NIP</th>
							<th>Mata Pelajaran</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($guru as $g): ?>
						<tr>
							<td><?= $g->id_guru ?></td>
							<td><?= $g->nama ?></td>
							<td><?= $g->nip ?></td>
							<td><?= $g->mapel ?></td>
							<td class="text-center">
								<!-- Tombol Edit -->
								<button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
									data-bs-target="#editGuruModal<?= $g->id_guru ?>">
									<i class="bi bi-pencil-square"></i>
								</button>
								<!-- Tombol Delete -->
								<button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
									data-bs-target="#deleteGuruModal<?= $g->id_guru ?>">
									<i class="bi bi-trash"></i>
								</button>
							</td>
						</tr>

						<!-- Modal Edit -->
						<div class="modal fade" id="editGuruModal<?= $g->id_guru ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<form action="<?= site_url('admin/guru/update') ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title">Edit Guru</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id_guru" value="<?= $g->id_guru ?>">
											<div class="mb-3">
												<label class="form-label">NIP</label>
												<input type="text" class="form-control" name="nip"
													value="<?= $g->nip ?>" required>
											</div>
											<div class="mb-3">
												<label class="form-label">Mata Pelajaran</label>
												<input type="text" class="form-control" name="mapel"
													value="<?= $g->mapel ?>" required>
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
						<div class="modal fade" id="deleteGuruModal<?= $g->id_guru ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form action="<?= site_url('admin/guru/hapus') ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title">Hapus Guru</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body text-center">
											<input type="hidden" name="id_guru" value="<?= $g->id_guru ?>">
											<i class="bi bi-trash-fill text-danger fs-1 mb-3"></i>
											<p>Apakah Anda yakin ingin menghapus guru dengan NIP
												<strong><?= $g->nip ?></strong>?</p>
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
<div class="modal fade" id="addGuruModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form action="<?= site_url('admin/guru/simpan') ?>" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Guru</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="mb-3">
						<label class="form-label">NIP</label>
						<input type="text" class="form-control" name="nip" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="text" class="form-control" name="email" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Mata Pelajaran</label>
						<input type="text" class="form-control" name="mapel" required>
					</div>
					<!-- id_user bisa dipilih kalau guru dihubungkan dengan user -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
