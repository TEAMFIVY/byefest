<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Pembayaran - FIVY</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		body {
			margin: 0;
			font-family: 'Poppins', sans-serif;
			background: linear-gradient(to right, #e6f0ff, #ffffff);
			color: #2c3e91;
		}

		.payment-container {
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 60px 20px;
			min-height: 100vh;
		}

		.payment-card {
			background: white;
			padding: 40px;
			border-radius: 20px;
			max-width: 600px;
			width: 100%;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
		}

		.payment-card h2 {
			font-size: 28px;
			font-weight: 600;
			margin-bottom: 10px;
			color: #1b2e70;
		}

		.payment-card .subtext {
			font-size: 14px;
			margin-bottom: 30px;
			color: #555;
		}

		.summary-box {
			background: #f7faff;
			border: 1px solid #dce6f9;
			border-radius: 12px;
			padding: 20px;
			margin-bottom: 30px;
		}

		.summary-item {
			display: flex;
			justify-content: space-between;
			margin-bottom: 10px;
			font-size: 15px;
		}

		.payment-methods {
			display: flex;
			flex-direction: column;
			gap: 15px;
			margin: 20px 0 30px;
		}

		.method {
			display: flex;
			align-items: center;
			gap: 15px;
			background: #eef4ff;
			padding: 12px 18px;
			border-radius: 12px;
			cursor: pointer;
			transition: 0.3s;
			border: 2px solid transparent;
		}

		.method:hover,
		.method input:checked+img {
			border-color: #2c3e91;
		}

		.method input {
			transform: scale(1.2);
			margin-right: 10px;
		}

		.cta-button {
			background-color: #2c3e91;
			color: white;
			padding: 14px 24px;
			border: none;
			border-radius: 10px;
			font-size: 16px;
			font-weight: 600;
			width: 100%;
			cursor: pointer;
			transition: 0.3s ease;
		}

		.cta-button:hover {
			background-color: #1b2e70;
		}

		.back-button {
			display: block;
			text-align: center;
			margin-top: 20px;
			color: #2c3e91;
			text-decoration: none;
			font-weight: 600;
			transition: 0.2s ease;
		}

		.back-button:hover {
			text-decoration: underline;
		}

	</style>
</head>

<body>
	<div class="payment-container">
		<div class="payment-card">
			<h2>Konfirmasi Pembayaran</h2>
			<p class="subtext">Silakan periksa kembali data dan pilih metode pembayaran Anda</p>

			<div class="summary-box">
				<div class="summary-item">
					<span>Paket:</span>
					<strong>Paket Bulanan</strong>
				</div>
				<div class="summary-item">
					<span>Harga:</span>
					<strong>Rp120.000</strong>
				</div>
				<div class="summary-item">
					<span>Nama:</span>
					<strong>Davin Amanta</strong>
				</div>
				<div class="summary-item">
					<span>Email:</span>
					<strong>davin@email.com</strong>
				</div>
			</div>

			<h3>Pilih Metode Pembayaran</h3>
			<div class="payment-methods">
				<label class="method">
					<input type="radio" name="metode" checked>
					<img src="../ovo.svg" alt="OVO" width="55" />
					<span>OVO</span>
				</label>
				<label class="method">
					<input type="radio" name="metode">
					<img src="../dana.svg" alt="DANA" width="55" />
					<span>DANA</span>
				</label>
				<label class="method">
					<input type="radio" name="metode">
					<img src="https://img.icons8.com/color/48/000000/bank-card-back-side.png" alt="Bank" />
					<span>Transfer Bank</span>
				</label>
			</div>
			<a href="<?= base_url('member/home') ?>"><button class="cta-button">Bayar Sekarang</button></a>
		</div>
	</div>
</body>

</html>
