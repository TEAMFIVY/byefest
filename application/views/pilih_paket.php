<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Daftar & Pembayaran Paket</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		body {
			margin: 0;
			padding: 0;
			background: linear-gradient(to right, #8EC5FC, #E0C3FC);
			font-family: 'Poppins', sans-serif;
		}

		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 40px 20px;
			min-height: 100vh;
		}

		.card {
			background: white;
			padding: 40px;
			border-radius: 20px;
			box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
			max-width: 500px;
			width: 100%;
		}

		h1 {
			text-align: center;
			margin-bottom: 30px;
			color: #2c3e91;
		}

		.input-group {
			margin-bottom: 20px;
		}

		.input-group label {
			display: block;
			margin-bottom: 8px;
			font-weight: 600;
			color: #333;
		}

		.input-group input {
			width: 100%;
			padding: 12px;
			border-radius: 10px;
			border: 1px solid #ccc;
			font-size: 14px;
		}

		.section-title {
			font-weight: 600;
			margin: 20px 0 10px;
			color: #2c3e91;
		}

		.packages {
			display: flex;
			justify-content: space-between;
			gap: 10px;
			margin-bottom: 20px;
		}

		.pill {
			flex: 1;
			text-align: center;
			padding: 12px 0;
			border: 2px solid #2c3e91;
			border-radius: 999px;
			font-weight: 600;
			color: #2c3e91;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		.pill:hover {
			background-color: #e6edff;
		}

		.pill.active {
			background-color: #2c3e91;
			color: white;
			transform: scale(1.05);
		}

		.agreement {
			display: flex;
			align-items: center;
			font-size: 14px;
			margin-bottom: 20px;
		}

		.agreement input {
			margin-right: 8px;
		}

		.agreement a {
			color: #2c3e91;
			text-decoration: underline;
		}

		.buttons {
			display: flex;
			gap: 15px;
		}

		.submit,
		.cancel {
			flex: 1;
			text-align: center;
			padding: 12px;
			border-radius: 10px;
			font-weight: 600;
			text-decoration: none;
		}

		.submit {
			background-color: #2c3e91;
			color: white;
			transition: background-color 0.3s ease;
		}

		.submit:hover {
			background-color: #1a2a6c;
		}

		.cancel {
			background-color: transparent;
			border: 2px solid #2c3e91;
			color: #2c3e91;
		}

		.cancel:hover {
			background-color: #2c3e91;
			color: white;
		}

	</style>
</head>

<body>
	<div class="container">
		<div class="card">
			<h1>Daftar & Pilih Paket</h1>

			<!-- Arahkan ke Dashboard/simpan -->
			<form action="<?= site_url('dashboard/simpan') ?>" method="post" class="form">
				<!-- <div class="input-group">
					<label for="fullname">Nama Lengkap</label>
					<input type="text" id="fullname" name="fullname" value="<?= $this->session->userdata('nama') ?>"
						required readonly>
				</div>

				<div class="input-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" value="<?= $this->session->userdata('email') ?>"
						required readonly>
				</div> -->

				<p class="section-title">Pilih Paket:</p>
				<div class="packages">
					<div class="pill" onclick="selectPill(this, 'mingguan')">Mingguan</div>
					<div class="pill" onclick="selectPill(this, 'bulanan')">Bulanan</div>
					<div class="pill" onclick="selectPill(this, 'tahunan')">Tahunan</div>
				</div>

				<!-- Hidden input untuk menyimpan paket yang dipilih -->
				<input type="hidden" name="paket" id="paket" required>

				<div class="agreement">
					<input type="checkbox" required>
					<label>Saya menyetujui <a href="#">Syarat & Ketentuan</a></label>
				</div>

				<div class="buttons">
					<button type="submit" class="submit">Lanjutkan Pembayaran</button>
					<a href="<?= site_url('dashboard') ?>" class="cancel">Kembali</a>
				</div>
			</form>
		</div>
	</div>

	<script>
		// Menandai paket yang dipilih dan simpan ke input hidden
		function selectPill(el, paket) {
			document.querySelectorAll('.pill').forEach(p => p.classList.remove('active'));
			el.classList.add('active');
			document.getElementById('paket').value = paket;
		}

		// Tambahkan sedikit proteksi agar user harus pilih paket
		document.querySelector('form').addEventListener('submit', function (e) {
			if (!document.getElementById('paket').value) {
				alert('Silakan pilih paket terlebih dahulu!');
				e.preventDefault();
			}
		});

	</script>
</body>


</html>
