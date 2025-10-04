<div class="col-12">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h4 class="card-title"><i class="bi bi-people-fill me-2"></i> Daftar Member | ByeFest</h4>
			<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
				<i class="bi bi-plus-circle me-1"></i> Tambah Member
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
							<th>Nama</th>
							<th>Email</th>
							<th>Paket</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($member as $m): ?>
						<tr>
							<td><?= $m->nama ?></td>
							<td><?= $m->email ?></td>
							<td><?= $m->paket ?></td>
							<td class="text-center">
								<!-- Tombol Edit -->
								<button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
									data-bs-target="#editUserModal<?= $m->id_user ?>">
									<i class="bi bi-pencil-square"></i>
								</button>
								<!-- Tombol Delete -->
								<button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
									data-bs-target="#deleteUserModal<?= $m->id_user ?>">
									<i class="bi bi-trash"></i>
								</button>
							</td>
						</tr>

						<!-- Modal Edit -->
						<div class="modal fade" id="editUserModal<?= $m->id_user ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<form action="<?= site_url('admin/member/update') ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title">Edit Member</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id_user" value="<?= $m->id_user ?>">
											<div class="mb-3">
												<label class="form-label">Nama</label>
												<input type="text" class="form-control" name="nama"
													value="<?= $m->nama ?>" required>
											</div>
											<div class="mb-3">
												<label class="form-label">Email</label>
												<input type="email" class="form-control" name="email"
													value="<?= $m->email ?>" required readonly>
											</div>
											<!-- <div class="mb-3">
												<label class="form-label">Paket</label>
												<select class="form-control" name="paket" required>
													<option value="minggunan" <?= $m->paket == 'mingguan' ? 'selected' : '' ?>>
														Basic</option>
													<option value="bulanan"
														<?= $m->paket == 'bulanan' ? 'selected' : '' ?>>Premium</option>
													<option value="tahunan" <?= $m->paket == 'tahunan' ? 'selected' : '' ?>>VIP
													</option>
												</select>
											</div> -->
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
						<div class="modal fade" id="deleteUserModal<?= $m->id_user ?>" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form action="<?= site_url('admin/member/hapus/'.$m->id_user) ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title">Hapus Member</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body text-center">
											<input type="hidden" name="id_user" value="<?= $m->id_user ?>">
											<i class="bi bi-trash-fill text-danger fs-1 mb-3"></i>
											<p>Apakah Anda yakin ingin menghapus <strong><?= $m->nama ?></strong>?</p>
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
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form action="<?= site_url('admin/member/simpan') ?>" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Member</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Paket</label>
						<select class="form-control" name="paket" required>
							<option value="mingguan">Mingguan</option>
							<option value="bulanan">Bulanan</option>
							<option value="tahunan">Tahunan</option>
						</select>
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
