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
										<!-- Tombol buka modal Kelola Bab -->
										<button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
											data-bs-target="#addBabModal<?= $b->id ?>">
											<i class="bi bi-book"></i>
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
													<p>Apakah Anda yakin ingin menghapus <strong><?= $b->judul ?></strong>?
													</p>
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

								<!-- Modal Tambah Bab -->
								<!-- <div class="modal fade" id="addBabModal<?= $b->id ?>" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-lg">
										<div class="modal-content">
											<form action="<?= site_url('admin/bab/simpan') ?>" method="post">
												<div class="modal-header">
													<h5 class="modal-title">Tambah Bab untuk Buku: <?= $b->judul ?></h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body">
													<input type="hidden" name="id_buku" value="<?= $b->id ?>">

													<div class="mb-3">
														<label for="judul_bab<?= $b->id ?>" class="form-label">Judul
															Bab</label>
														<input type="text" class="form-control" id="judul_bab<?= $b->id ?>"
															name="judul_bab" required>
													</div>

													<div class="mb-3">
														<label for="urutan<?= $b->id ?>" class="form-label">Urutan</label>
														<input type="text" class="form-control" id="urutan<?= $b->id ?>"
															name="urutan" placeholder="Misal: 1 atau Bab I">
													</div>

													<div class="mb-3">
														<label for="isi<?= $b->id ?>" class="form-label">Isi Bab</label>
														<textarea class="form-control" id="isi<?= $b->id ?>" name="isi"
															rows="4" required></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-light-secondary"
														data-bs-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-success">Simpan Bab</button>
												</div>
											</form>
										</div>
									</div>
								</div> -->

								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>

		<!-- Modal Kelola Bab -->
		<?php foreach ($books as $b): ?>
		<!-- Tombol untuk buka modal -->
		<!-- <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addBabModal<?= $b->id ?>">
			<i class="bi bi-book"></i>
		</button> -->

		<!-- Modal untuk buku ini -->
		<div class="modal fade" id="addBabModal<?= $b->id ?>" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Kelola Bab - <?= $b->judul ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">

						<!-- Tombol Tambah Bab -->
						<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahBab<?= $b->id ?>">
							<i class="bi bi-plus-circle"></i> Tambah Bab
						</button>

						<!-- Tabel Daftar Bab -->
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Judul Bab</th>
										<th>Urutan</th>
										<th>Isi</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
                                $babList = $this->db->get_where('bab', ['id_buku' => $b->id])->result();
                                foreach ($babList as $bab): ?>
									<tr>
										<td><?= $bab->judul_bab ?></td>
										<td><?= $bab->urutan ?></td>
										<td><?= substr($bab->isi,0,30) ?>...</td>
										<td class="text-center">
											<!-- Tombol Edit -->
											<button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
												data-bs-target="#editBab<?= $bab->id_bab ?>">
												<i class="bi bi-pencil-square"></i>
											</button>
											<!-- Tombol Delete -->
											<button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
												data-bs-target="#deleteBab<?= $bab->id_bab ?>">
												<i class="bi bi-trash"></i>
											</button>
										</td>
									</tr>

									<!-- Modal Edit Bab -->
									<div class="modal fade" id="editBab<?= $bab->id_bab ?>" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<form action="<?= site_url('admin/bab/update') ?>" method="post">
													<div class="modal-header">
														<h5 class="modal-title">Edit Bab</h5>
														<button type="button" class="btn-close"
															data-bs-dismiss="modal"></button>
													</div>
													<div class="modal-body">
														<input type="hidden" name="id_bab" value="<?= $bab->id_bab ?>">
														<div class="mb-3">
															<label class="form-label">Judul Bab</label>
															<input type="text" name="judul_bab" value="<?= $bab->judul_bab ?>"
																class="form-control" required>
														</div>
														<div class="mb-3">
															<label class="form-label">Urutan</label>
															<input type="text" name="urutan" value="<?= $bab->urutan ?>"
																class="form-control" required>
														</div>
														<div class="mb-3">
															<label class="form-label">Isi Bab</label>
															<textarea name="isi" class="form-control" rows="3"
																required><?= $bab->isi ?></textarea>
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

									<!-- Modal Delete Bab -->
									<div class="modal fade" id="deleteBab<?= $bab->id_bab ?>" tabindex="-1"
										aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<form action="<?= site_url('admin/bab/delete') ?>" method="post">
													<div class="modal-header">
														<h5 class="modal-title">Hapus Bab</h5>
														<button type="button" class="btn-close"
															data-bs-dismiss="modal"></button>
													</div>
													<div class="modal-body text-center">
														<input type="hidden" name="id" value="<?= $bab->id_bab ?>">
														<i class="bi bi-trash-fill text-danger fs-1 mb-3"></i>
														<p>Yakin ingin menghapus <strong><?= $bab->judul_bab ?></strong>?</p>
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
		</div>
		<?php endforeach; ?>

		<!-- Modal Tambah Bab -->
		<!-- Modal Tambah Bab -->
		<div class="modal fade" id="tambahBab<?= $b->id ?>" tabindex="-1" aria-labelledby="tambahBabLabel<?= $b->id ?>"
			aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<form action="<?= site_url('admin/bab/store') ?>" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="tambahBabLabel<?= $b->id ?>">Tambah Bab untuk Buku: <?= $b->judul ?>
							</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="id_buku" value="<?= $b->id ?>">

							<div class="mb-3">
								<label for="judul_bab<?= $b->id ?>" class="form-label">Judul Bab</label>
								<input type="text" class="form-control" id="judul_bab<?= $b->id ?>" name="judul_bab" required>
							</div>

							<div class="mb-3">
								<label for="urutan<?= $b->id ?>" class="form-label">Urutan</label>
								<input type="number" class="form-control" id="urutan<?= $b->id ?>" name="urutan"
									placeholder="Contoh: 1" required>
							</div>

							<div class="mb-3">
								<label for="isi<?= $b->id ?>" class="form-label">Isi Bab</label>
								<textarea class="form-control" id="isi<?= $b->id ?>" name="isi" rows="4" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</form>
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
