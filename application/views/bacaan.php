<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Carousel Mapel</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			font-family: 'Poppins', sans-serif;
			background-color: #f9fbfd;
			color: #333;
			line-height: 1.6;
		}

		header {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			padding: 15px 30px;
			z-index: 1000;
			background-color: rgba(44, 62, 80, 1);
			/* awal: solid */
			color: white;
			backdrop-filter: blur(10px);
			transition: background-color 0.3s ease;
		}

		.header-container {
			max-width: 1200px;
			margin: auto;
			display: flex;
			justify-content: space-between;
			align-items: center;
			flex-wrap: wrap;
			gap: 20px;
		}

		header.scrolled {
			background-color: rgba(44, 62, 80, 0.20);
			/* agak transparan saat scroll */
		}

		#locknav {
			color: rgba(255, 255, 255, 0.475);
			cursor: default;
		}


		.profile-dropdown {
			position: relative;
			display: inline-block;
		}

		.profile-capsule {
			display: flex;
			align-items: center;
			gap: 15px;
			padding: 8px 16px;
			background: white;
			border-radius: 999px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			cursor: pointer;
			text-decoration: none;
			/* agar teks tidak bergaris bawah */
			transition: background 0.3s ease, box-shadow 0.3s ease;
		}

		.profile-capsule:hover {
			background: #f0f4ff;
			box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
		}

		.profile-pic {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			object-fit: cover;
			border: 2px solid #3b5a91;
		}

		.login-button {
			font-weight: 600;
			font-size: 14px;
			color: #2c3e50;
			white-space: nowrap;
		}


		.profile-capsule:hover {
			background: #f0f4ff;
			box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
		}

		.profile-pic {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			object-fit: cover;
			border: 2px solid #3b5a91;
		}

		.profile-name {
			font-weight: 600;
			font-size: 14px;
			color: #2c3e50;
			white-space: nowrap;
		}

		.dropdown-icon {
			font-size: 18px;
			color: #3b5a91;
			transition: transform 0.3s ease;
		}

		.profile-dropdown.open .dropdown-icon {
			transform: rotate(180deg);
		}

		.dropdown-menu {
			position: absolute;
			right: 0;
			top: 110%;
			background: white;
			border-radius: 12px;
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
			width: 180px;
			padding: 10px 0;
			display: none;
			flex-direction: column;
			z-index: 999;
			animation: fadeInUp 0.3s ease;
		}

		.profile-dropdown.open .dropdown-menu {
			display: flex;
		}

		.dropdown-item {
			padding: 12px 20px;
			display: flex;
			align-items: center;
			gap: 12px;
			font-size: 14px;
			color: #2c3e50;
			text-decoration: none;
			transition: background 0.2s ease;
		}

		.dropdown-item svg {
			width: 18px;
			height: 18px;
			stroke: #3b5a91;
			stroke-width: 2;
		}

		.dropdown-item:hover {
			background: #f0f4ff;
			cursor: pointer;
		}

		.logo {
			font-size: 28px;
			font-weight: 700;
			color: #ffffff;
			text-decoration: none;

		}

		a .logo {
			text-decoration: none;
			color: inherit;
			/* biar warna tetap ikut dari .logo */
			color: #ffffff;
			/* pastikan warnanya putih */

		}

		a {
			text-decoration: none;
			/* hilangkan underline dari <a> */
		}


		.menu ul {
			list-style: none;
			display: flex;
			gap: 24px;
		}

		.menu ul li a {
			text-decoration: none;
			color: #ffffff;
			font-weight: 500;
			transition: color 0.3s ease;
		}

		.menu ul li a:hover {
			color: #a7c4ff;
		}

		.cta {
			background-color: #fff;
			color: #3b5a91;
			padding: 12px 30px;
			border-radius: 30px;
			text-decoration: none;
			font-weight: bold;
			transition: all 0.3s ease;
			display: inline-block;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		}

		.cta:hover {
			background-color: #3b5a91;
			color: #fff;
			transform: translateY(-2px);
			box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
		}

		.hero {
			background: linear-gradient(to right, #89CFF0, #6BA8E5);
			padding: 140px 20px 80px;
			border-radius: 0 0 30px 30px;
			overflow: hidden;
			text-align: center;
		}

		.hero-container {
			max-width: 1000px;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;
			gap: 40px;
		}

		.hero-image img {
			width: 460px;
			border-radius: 15px;
			-webkit-mask-image: linear-gradient(to bottom, black 50%, rgba(0, 0, 0, 0.5) 80%, transparent 100%);
			mask-image: linear-gradient(to bottom, black 50%, rgba(0, 0, 0, 0.5) 80%, transparent 100%);
		}


		.hero-text {
			max-width: 500px;
		}

		.hero-text h1 {
			font-size: 36px;
			margin-bottom: 15px;
			color: #fff;
		}

		.hero-text p {
			margin-bottom: 20px;
			color: #f0f0f0;
		}


		.hero-container {
			opacity: 0;
			transform: translateY(-50px);
			animation: flyInUp 1s ease-out forwards;
			animation-delay: 0.3s;
		}


		@keyframes flyInUp {
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.section-title {
			text-align: center;
			margin-top: 95px;
			font-size: 28px;
			color: #333;
			font-weight: bold;
		}

		/* Bagian CSS */
		.book-section {
			background-color: #f4f8ff;
			padding: 20px 30px;
			text-align: center;
		}

		.section-title {
			font-size: 2.2em;
			color: #3b5a91;
			margin-bottom: 40px;
			font-weight: 700;
		}

		.book-grid {
			display: flex;
			gap: 24px;
			overflow-x: auto;
			padding-bottom: 10px;
			scroll-behavior: smooth;
		}

		.book-grid::-webkit-scrollbar {
			height: 8px;
			opacity: 0;
		}

		.book-grid::-webkit-scrollbar-thumb {
			background: #cccccc00;
			border-radius: 4px;
		}

		.book-card {
			background: #fff;
			border-radius: 16px;
			padding: 20px;
			transition: all 0.4s ease;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
			flex: 0 0 220px;
			display: flex;
			flex-direction: column;
			align-items: center;
			animation: fadeInUp 1s ease;
			position: relative;
		}



		/* Lapisan overlay hitam transparan dengan ikon gembok */
		.book-lock-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			/* Transparan hitam */
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 16px;
			z-index: 2;
		}

		.lock-icon {
			font-size: 40px;
			color: white;
		}


		.book-card:hover {
			transform: translateY(-10px) scale(1.03);
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
		}

		.book-image img {
			width: 96px;
			height: auto;
			margin-bottom: 20px;
		}

		.book-content h3 {
			font-size: 1.2em;
			color: #2c3e50;
			margin-bottom: 10px;
		}

		.book-content p {
			height: 50px;
			font-size: 0.95em;
			color: #555;
			margin-bottom: 16px;
		}

		.book-content button {
			background-color: #007BFF;
			border: none;
			padding: 8px 14px;
			color: white;
			border-radius: 6px;
			font-size: 14px;
			cursor: pointer;
		}

		.book-content button:hover {
			background-color: #0056b3;
		}

		footer {
			background: #2c3e50;
			color: #ecf0f1;
			padding: 60px 20px 30px;
		}

		.footer-container {
			max-width: 1200px;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			gap: 40px;
			justify-content: space-between;
		}

		.footer-col {
			flex: 1 1 200px;
		}

		.footer-col h3 {
			margin-bottom: 15px;
			color: #ffffff;
		}

		.footer-col ul {
			list-style: none;
			padding: 0;
		}

		.footer-col ul li {
			margin-bottom: 10px;
		}

		.footer-col ul li a {
			color: #bdc3c7;
			text-decoration: none;
		}

		.footer-col ul li a:hover {
			text-decoration: underline;
		}

		.social-icons {
			display: flex;
			gap: 10px;
			margin-top: 10px;
		}

		.social-icons img {
			width: 32px;
			height: 32px;
		}

		.footer-bottom {
			text-align: center;
			margin-top: 40px;
			color: #95a5a6;
		}

		.contact-form input,
		.contact-form textarea {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: none;
			border-radius: 5px;
			font-family: 'Poppins', sans-serif;
		}

		@media screen and (max-width: 768px) {

			.hero-container,
			.why-container,
			.cards-container {
				flex-direction: column;
				text-align: center;
			}

			.menu ul {
				flex-direction: column;
				align-items: center;
			}
		}

		.book-image img {
			width: 200px;
			height: 270px;
			border-radius: 12px;
			transition: transform 0.3s ease;
		}

		.book-card::after {
			content: "🔒";
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			font-size: 40px;
			color: white;
			background: rgba(0, 0, 0, 0.5);
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 16px;
			z-index: 2;
		}

	</style>
</head>

<body>
	<header>
		<div class="header-container">
			<a href="<?= base_url('dashboard') ?>" style="text-decoration: none;">
				<div class="logo">FIVY</div>
			</a>
			<nav class="menu">
				<ul>
					<li><a href="<?= base_url('dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('dashboard/bacaan') ?>">Daftar Bacaan</a></li>
					<li>
						<div id="locknav">Latihan Soal</div>
					</li>
					<li>
						<div id="locknav">Try Out</div>
					</li>
				</ul>
			</nav>
			<div class="profile-dropdown" id="profileDropdown">
				<a href="<?= base_url('auth/login') ?>" class="profile-capsule">
					<span class="login-button">Login</span>
				</a>
			</div>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="../profile/profile.html"
					style="display: flex; align-items: center; gap: 8px;">
					<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24"
						stroke="currentColor" stroke-width="1.8">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 20.25a8.25 8.25 0 0115 0" />
					</svg>
					Profile
				</a>
				<a class="dropdown-item" href="../forum_diskusi/forum_diskusi.html">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
						<path stroke="currentColor" d="M5 6h14M5 12h10M5 18h7" />
					</svg>
					Forum Diskusi
				</a>
				<a class="dropdown-item" href="<?= base_url('auth/login') ?>">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
						<path stroke="currentColor"
							d="M15 3h4a2 2 0 0 1 2 2v4m-6 12h4a2 2 0 0 0 2-2v-4m-6 0L3 3m0 18L21 3" />
					</svg>
					Keluar
				</a>
			</div>
		</div>
		</div>
	</header>
	<script>
		const header = document.querySelector('header');

		window.addEventListener('scroll', () => {
			if (window.scrollY > 10) {
				header.classList.add('scrolled');
			} else {
				header.classList.remove('scrolled');
			}
		});

	</script>

	<section class="hero">
		<div class="hero-container">
			<div class="hero-image">
				<img src="<?= base_url('assets/images/ban.png') ?>" alt="Siswa Belajar">
			</div>
			<div class="hero-text">
				<h1>Belajar Lebih Mudah & Menyenangkan</h1>
				<p>
					FIVY adalah platform belajar online untuk siswa SMA/SMK yang dirancang agar lebih fleksibel,
					menyenangkan, dan
					bisa diakses kapan pun.
				</p>
				<a href="#" class="cta">Mulai Belajar Sekarang</a>
			</div>
		</div>
	</section>
	<!-- Bagian HTML -->
	<section class="book-section">
		<h2 class="section-title">Daftar Buku</h2>
		<div class="book-grid">
			<?php foreach ($buku as $bk): ?>
			<div class="book-card">
				<div class="book-image">
					<img src="<?= base_url('assets/uploads/buku/' . $bk->cover) ?>" alt="<?= $bk->judul ?>" loading="lazy" />
				</div>
				<div class="book-content">
					<h3><?= $bk->judul ?></h3>
					<button onclick="window.location.href='<?= site_url('buku/detail/' . $bk->id) ?>'">Lihat
						Detail</button>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<script>
		function toggleDropdown() {
			const dropdown = document.getElementById("profileDropdown");
			dropdown.classList.toggle("open");
		}

		window.addEventListener('click', function (e) {
			const dropdown = document.getElementById("profileDropdown");
			if (!dropdown.contains(e.target)) {
				dropdown.classList.remove("open");
			}
		});

	</script>
</body>
<footer>
	<div class="footer-container">
		<div class="footer-col">
			<h3>Tentang Kami</h3>
			<p>FIVY adalah solusi belajar online untuk siswa SMA/SMK dengan materi berkualitas dan tutor berpengalaman.
			</p>
		</div>
		<div class="footer-col">
			<h3>Quick Links</h3>
			<ul>
				<li><a href="<?= base_url('member/home') ?>">Home</a></li>
				<li><a href="<?= base_url('member/buku') ?>">Daftar Bacaan</a></li>
				<li><a href="#">Latihan Soal</a></li>
				<li><a href="#">Tryout</a></li>
			</ul>
		</div>
		<div class="footer-col contact-form">
			<h3>Kontak</h3>
			<input type="text" placeholder="Nama Anda">
			<input type="email" placeholder="Email Anda">
			<textarea rows="3" placeholder="Pesan Anda"></textarea>
			<button class="cta">Kirim</button>
		</div>
		<div class="footer-col">
			<h3>Ikuti Kami</h3>
			<div class="social-icons">
				<a href="#"><img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook"></a>
				<a href="#"><img src="https://img.icons8.com/color/48/instagram-new.png" alt="Instagram"></a>
				<a href="#"><img src="https://img.icons8.com/color/48/youtube-play.png" alt="YouTube"></a>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<p>&copy; 2025 FIVY. All Rights Reserved.</p>
	</div>
</footer>

</html>
