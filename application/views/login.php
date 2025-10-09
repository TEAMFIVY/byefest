<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FIVY Login</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			font-family: 'Quicksand', sans-serif;
		}

		body {
			background: #d7dbe5;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
			overflow: hidden;
		}

		.container {
			display: flex;
			width: 850px;
			height: 520px;
			background: #ffffff;
			border-radius: 20px;
			box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
			overflow: hidden;
			position: relative;
		}

		/* ==== LEFT SIDE ==== */
		.left {
			width: 45%;
			background: linear-gradient(135deg, #5d9bff, #8fbfff);
			padding: 40px 30px;
			color: white;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			position: relative;
			clip-path: ellipse(100% 100% at 0% 50%);
			overflow: hidden;
		}

		.left h1 {
			font-size: 42px;
			font-weight: bold;
		}

		.left p {
			font-size: 15px;
			margin-top: 8px;
			opacity: 0.95;
		}

		.left small {
			font-size: 12px;
			text-align: center;
			color: #e0e0e0;
		}

		/* ==== SHAPE / IMAGE ==== */
		.shape {
			flex-grow: 1;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 10px;
		}

		.shape img {
			max-width: 100%;
			max-height: 260px;
			object-fit: contain;
			filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.2));
			transition: transform 0.4s ease;
		}

		.shape img:hover {
			transform: scale(1.05);
		}

		/* ==== RIGHT SIDE ==== */
		.right {
			width: 55%;
			padding: 60px 50px;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.right h2 {
			text-align: center;
			margin-bottom: 40px;
			color: #4a90e2;
			font-size: 32px;
			font-weight: 700;
		}

		.form-group {
			margin-bottom: 20px;
		}

		.form-group label {
			display: block;
			margin-bottom: 6px;
			font-weight: 600;
			color: #555;
		}

		.form-group input {
			width: 100%;
			padding: 12px 14px;
			border: 1px solid #ccc;
			border-radius: 8px;
			font-size: 15px;
			transition: all 0.3s ease;
		}

		.form-group input:focus {
			border-color: #4a90e2;
			box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
			outline: none;
		}


		.login-btn {
			display: inline-block;
			width: 100%;
			padding: 12px;
			background: #4a90e2;
			border: none;
			color: white;
			font-size: 16px;
			font-weight: bold;
			border-radius: 25px;
			margin-top: 15px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
			transition: background 0.3s ease;
		}



		.login-btn:hover {
			background: #357bd8;
		}

		.signup {
			text-align: center;
			margin-top: 18px;
			font-size: 14px;
		}

		.signup a {
			color: #4a90e2;
			text-decoration: none;
			font-weight: 600;
		}

		.signup a:hover {
			text-decoration: underline;
		}

		/* ==== SOCIAL LOGIN ==== */
		.social-login {
			display: flex;
			justify-content: center;
			margin-top: 30px;
			gap: 25px;
		}

		.social-login img {
			width: 32px;
			height: 32px;
			cursor: pointer;
			transition: transform 0.25s ease;
		}

		.social-login img:hover {
			transform: scale(1.15);
		}

		/* ==== RESPONSIVE ==== */
		@media (max-width: 768px) {
			.container {
				flex-direction: column;
				width: 95%;
				height: auto;
			}

			.left {
				width: 100%;
				clip-path: none;
				border-radius: 20px 20px 0 0;
				text-align: center;
				padding: 30px;
			}

			.shape img {
				max-height: 200px;
			}

			.right {
				width: 100%;
				padding: 40px 30px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="left">
			<div>
				<h1>FIVY</h1>
				<p>E-Learning untuk SMA/SMK Sederajat</p>
			</div>
			<div class="shape">
				<img src="<?= base_url('assets/images/move.png') ?>">
			</div>
			<small>Created By @TeamFIVY</small>
		</div>
		<div class="right">
			<h2>Sign In</h2>
			<form action="<?= base_url('auth/login_aksi') ?>" method="POST">
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password">
				</div>
                <button type="submit" class="login-btn">Login</button>
				<div class="signup">
					Belum memiliki akun? <a href="<?= base_url('auth/register') ?>">Daftar</a>
				</div>
				<div class="social-login">
					<img src="https://img.icons8.com/color/48/google-logo.png" alt="Google">
					<img src="https://img.icons8.com/color/48/facebook-new.png" alt="Facebook">
					<img src="https://img.icons8.com/color/48/twitter--v1.png" alt="Twitter">
				</div>
			</form>
		</div>
	</div>
</body>

</html>
