<div class="card">
	<div class="card-header d-flex justify-content-between">
		<h4><i class="bi bi-list-task me-2"></i> Detail Latihan: <?= $latihan->judul ?></h4>
	</div>

	<div class="card-body">

		<!-- Notifikasi -->
		<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show">
			<?= $this->session->flashdata('success') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		</div>
		<?php elseif ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show">
			<?= $this->session->flashdata('error') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		</div>
		<?php endif; ?>

		<!-- Form Input Jumlah Soal & Opsi -->
		<div class="mb-4 p-3 border rounded bg-light">
			<h5>Buat Soal Baru</h5>
			<div class="row g-2">
				<div class="col-md-4">
					<input type="number" id="jumlahSoal" class="form-control" placeholder="Jumlah Soal" min="1">
				</div>
				<div class="col-md-4">
					<input type="number" id="jumlahOpsi" class="form-control" placeholder="Jumlah Opsi per Soal" min="2"
						max="10">
				</div>
				<div class="col-md-4">
					<button class="btn btn-primary w-100" id="buatFormSoal"><i class="bi bi-plus-circle"></i> Buat Form
						Soal</button>
				</div>
			</div>
		</div>

		<!-- Form Soal Dinamis -->
		<form method="post" action="<?= site_url('admin/latihan/simpan_massal') ?>" id="formSoalMassal">
			<input type="hidden" name="id_latihan" value="<?= $latihan->id_latihan ?>">

			<div id="containerSoal"></div>

			<div class="mt-3">
				<button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Semua Soal</button>
				<a href="<?= base_url('admin/latihan') ?>" class="btn btn-secondary">Kembali</a>
			</div>
		</form>

		<!-- Daftar Soal yang sudah ada -->
		<hr>
		<h5>Daftar Soal</h5>
		<?php foreach($soal as $s): ?>
		<div class="mb-4 p-3 border rounded shadow-sm">
			<div class="d-flex justify-content-between align-items-center">
				<strong><?= $s->pertanyaan ?></strong>
				<div>
					<button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
						data-bs-target="#editSoal<?= $s->id_soal ?>">
						<i class="bi bi-pencil"></i>
					</button>
					<a href="<?= site_url('admin/latihan/delete_soal/'.$s->id_soal.'/'.$latihan->id_latihan) ?>"
						onclick="return confirm('Hapus soal ini?')" class="btn btn-sm btn-outline-danger">
						<i class="bi bi-trash"></i>
					</a>
				</div>
			</div>
			<ul class="mt-2">
				<?php 
        $opsi = $this->db->get_where('opsi_soal',['id_soal'=>$s->id_soal])->result();
        foreach($opsi as $o): ?>
				<li <?= $o->jawaban_benar ? 'class="fw-bold text-success"' : '' ?>>
					<?= $o->teks_opsi ?> <?= $o->jawaban_benar ? '(Benar)' : '' ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<div class="modal fade" id="editSoal<?= $s->id_soal ?>" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<form method="post" action="<?= site_url('admin/latihan/update_soal') ?>">
			<input type="hidden" name="id_soal" value="<?= $s->id_soal ?>">
			<input type="hidden" name="id_latihan" value="<?= $latihan->id_latihan ?>">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Soal</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label>Pertanyaan</label>
						<textarea name="pertanyaan" class="form-control" required><?= $s->pertanyaan ?></textarea>
					</div>
					<div class="mb-3">
						<label>Opsi Jawaban</label>
						<?php foreach($opsi as $i => $o): ?>
						<div class="input-group mb-2">
							<span class="input-group-text"><?= chr(65+$i) ?>.</span>
							<input type="text" name="opsi[]" class="form-control" value="<?= $o->teks_opsi ?>" required>
							<div class="input-group-text">
								<input type="radio" name="jawaban_benar" value="<?= $i ?>"
									<?= $o->jawaban_benar ? 'checked' : '' ?>> Benar
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	document.getElementById('buatFormSoal').addEventListener('click', function (e) {
		e.preventDefault();

		let jumlahSoal = parseInt(document.getElementById('jumlahSoal').value);
		let jumlahOpsi = parseInt(document.getElementById('jumlahOpsi').value);

		if (!jumlahSoal || !jumlahOpsi || jumlahSoal < 1 || jumlahOpsi < 2) {
			alert("Masukkan jumlah soal dan opsi yang valid!");
			return;
		}

		let container = document.getElementById('containerSoal');
		container.innerHTML = "";

		for (let i = 0; i < jumlahSoal; i++) {
			let soalHtml = `
    <div class="mb-4 p-3 border rounded bg-white shadow-sm">
      <h5>Soal ${i+1}</h5>
      <div class="mb-3">
        <label>Pertanyaan</label>
        <textarea name="pertanyaan[${i}]" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label>Opsi Jawaban</label>
    `;

			for (let j = 0; j < jumlahOpsi; j++) {
				soalHtml += `
      <div class="input-group mb-2">
        <span class="input-group-text">${String.fromCharCode(65+j)}.</span>
        <input type="text" name="opsi[${i}][]" class="form-control" required>
        <div class="input-group-text">
          <input type="radio" name="jawaban_benar[${i}]" value="${j}" required> Benar
        </div>
      </div>`;
			}

			soalHtml += "</div></div>";
			container.innerHTML += soalHtml;
		}
	});

</script>
