<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>Tryout | FIVY</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/buku.css') ?>">
	<style>
		@import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css');

		body {
			font-family: 'Poppins', sans-serif;
			background: linear-gradient(180deg, #f8faff, #eef2f7);
			margin: 0;
			padding-top: 90px;
		}

		.container {
			max-width: 1000px;
			margin: auto;
			padding: 0 16px;
		}

		h1 {
			text-align: center;
			color: #1f2b50;
			font-weight: 700;
			letter-spacing: 0.5px;
			margin-bottom: 30px;
			font-size: 2rem;
		}

		.grid {
			display: grid;
			grid-template-columns: 1fr;
			gap: 20px;
		}

		.card {
			background: #fff;
			padding: 22px;
			border-radius: 16px;
			box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
			transition: all 0.3s ease;
		}

		.card:hover {
			transform: translateY(-4px);
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
		}

		.tryout-row {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 18px;
			flex-wrap: wrap;
		}

		.meta {
			display: flex;
			gap: 14px;
			align-items: center;
		}

		.icon-wrapper {
			width: 56px;
			height: 56px;
			border-radius: 14px;
			background: linear-gradient(135deg, #e3f0ff, #d4e8ff);
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.icon {
			width: 40px;
			height: 40px;
		}

		.title {
			font-size: 1.1rem;
			font-weight: 700;
			color: #2d3f6f;
		}

		.subtitle {
			font-size: 0.9rem;
			color: #7a8bad;
			margin-top: 2px;
		}

		.progress-container {
			flex: 1;
			min-width: 240px;
		}

		.progress-text {
			font-size: 0.85rem;
			color: #5b6b88;
			margin-bottom: 6px;
		}

		.track {
			height: 14px;
			background: #e9eef8;
			border-radius: 999px;
			overflow: hidden;
		}

		.fill {
			height: 100%;
			background: linear-gradient(90deg, #4b8dfb, #64c2ff);
			border-radius: 999px;
			transition: width 0.4s ease;
		}

		.btn {
			padding: 10px 18px;
			background: linear-gradient(90deg, #3b5a91, #506fb6);
			color: #fff;
			border-radius: 12px;
			text-decoration: none;
			font-weight: 600;
			display: inline-flex;
			align-items: center;
			gap: 8px;
			transition: all 0.3s ease;
		}

		.btn:hover {
			background: linear-gradient(90deg, #4e6ab5, #6f8de0);
			transform: scale(1.05);
		}

		.small {
			font-size: 13px;
			color: #666;
		}

		.card.empty {
			text-align: center;
			padding: 60px 20px;
			color: #7b879c;
		}

		.icon-empty {
			font-size: 42px;
			color: #a9b5cc;
			margin-bottom: 8px;
		}

		@media (max-width: 780px) {
			.tryout-row {
				flex-direction: column;
				align-items: flex-start;
			}

			.progress-container {
				width: 100%;
			}
		}

	</style>
</head>

<body>
	<!-- Navbar dari halaman Buku -->
	<header>
		<div class="header-container">
			<a href="<?= base_url('member/member.html') ?>" style="text-decoration:none;">
				<div class="logo">FIVY</div>
			</a>
			<nav class="menu">
				<ul>
					<li><a href="<?= base_url('member/home') ?>">Home</a></li>
					<li><a href="<?= base_url('member/buku') ?>">Daftar Bacaan</a></li>
					<li><a href="<?= base_url('member/latihan_soal') ?>">Latihan Soal</a></li>
					<li><a href="<?= base_url('member/tryout') ?>">Try Out</a></li>
				</ul>
			</nav>

			<div class="user-section">
				<!-- Dropdown Profil -->
				<div class="profile-dropdown" id="profileDropdown">
					<div class="profile-capsule" onclick="toggleDropdown()">
						<img
							src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=150&h=150&q=80"
							alt="Profile" class="profile-pic" />
						<span class="profile-name">Halo, Davin</span>
						<span class="dropdown-icon">▼</span>
					</div>
					<div class="dropdown-menu">
						<!-- <a class="dropdown-item" href="<?= base_url('profile/profile.html') ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                  <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4.5 20.25a8.25 8.25 0 0115 0" />
              </svg>
              Profile
            </a>
            <a class="dropdown-item" href="<?= base_url('forum_diskusi/forum_diskusi.html') ?>">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" d="M5 6h14M5 12h10M5 18h7" />
              </svg>
              Forum Diskusi
            </a> -->
						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" d="M15 3h4a2 2 0 0 1 2 2v4m-6 12h4a2 2 0 0 0 2-2v-4m-6 0L3 3m0 18L21 3" />
							</svg>
							Keluar
						</a>
					</div>
				</div>

				<!-- Lencana Verified -->
				<div class="verified-dropdown" id="verifiedDropdown">
					<div class="verified-icon" onclick="toggleVerifiedDropdown()">
						<div class="verified-shape">
							<svg class="check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
								<path fill="none" stroke="#007BFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
									d="M6 12l4 4 8-8" />
							</svg>
						</div>
					</div>
					<div class="verified-dropdown-menu" id="dropdownMenu">
						<div class="countdown-label">Berakhir pada Hari Ini</div>
						<div class="time-display" id="countdownTimer">11:33:11</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<script>
		// Efek scroll header
		const header = document.querySelector('header');
		window.addEventListener('scroll', () => {
			if (window.scrollY > 10) header.classList.add('scrolled');
			else header.classList.remove('scrolled');
		});

		// Dropdown profil
		function toggleDropdown() {
			const dropdown = document.getElementById("profileDropdown");
			dropdown.classList.toggle("open");
		}
		window.addEventListener('click', function (e) {
			const dropdown = document.getElementById("profileDropdown");
			if (!dropdown.contains(e.target)) dropdown.classList.remove("open");
		});

		// Verified countdown
		function toggleVerifiedDropdown() {
			document.getElementById("verifiedDropdown").classList.toggle("open");
		}

		function startCountdown(hours, minutes, seconds) {
			let totalSeconds = hours * 3600 + minutes * 60 + seconds;

			function updateTimer() {
				if (totalSeconds < 0) return;
				const h = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
				const m = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
				const s = String(totalSeconds % 60).padStart(2, '0');
				document.getElementById("countdownTimer").textContent = `${h}:${m}:${s}`;
				totalSeconds--;
			}
			updateTimer();
			setInterval(updateTimer, 1000);
		}
		window.addEventListener('DOMContentLoaded', () => startCountdown(11, 35, 11));

	</script>

	<!-- Konten Tryout -->
	<div class="container">
		<h1>✨ Daftar Tryout</h1>
		<div class="grid">
			<?php if (empty($tryouts)): ?>
			<div class="card empty">
				<i class="bi bi-journal-x icon-empty"></i>
				<p>Belum ada tryout tersedia.</p>
			</div>
			<?php else: ?>
			<?php foreach($tryouts as $t): ?>
			<?php $p = $progress[$t->mapel] ?? ['percent'=>0,'completed'=>0,'total'=>0,'icon'=>'']; ?>
			<div class="card">
				<div class="tryout-row">
					<div class="meta">
						<div class="icon-wrapper">
							<img class="icon" src="<?= $p['icon'] ?>" alt="<?= $t->mapel ?>">
						</div>
						<div>
							<div class="title"><?= htmlspecialchars($t->judul) ?></div>
							<div class="subtitle"><?= htmlspecialchars($t->mapel) ?> • Kelas
								<?= htmlspecialchars($t->tingkat_kelas) ?></div>
						</div>
					</div>

					<div class="progress-container">
						<div class="progress-text">
							Progress: <?= $p['percent'] ?>% (<?= $p['completed'] ?>/<?= $p['total'] ?>)
						</div>
						<div class="track">
							<div class="fill" style="width: <?= $p['percent'] ?>%"></div>
						</div>
					</div>

					<div>
						<?php if (!empty($progress[$t->mapel]) && $progress[$t->mapel]['percent'] == 100): ?>
						<a class="btn secondary" href="<?= site_url('member/tryout/hasil_terakhir/'.$t->id_tryout) ?>">
							<i class="bi bi-bar-chart-line"></i> Lihat Nilai
						</a>
						<?php else: ?>
						<a class="btn" href="<?= site_url('member/tryout/soal/'.$t->id_tryout) ?>">
							<i class="bi bi-pencil-square"></i> Kerjakan
						</a>
						<?php endif; ?>
					</div>

				</div>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>

</body>

</html>
