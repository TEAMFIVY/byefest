<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Latihan Soal</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		/* === Reset & Global === */
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			text-decoration: none;
		}

		body {
			font-family: 'Poppins', sans-serif;
			background: linear-gradient(to right, #eef2f3, #cfd9df);
			color: #2c3e50;
			line-height: 1.6;
			min-height: 100vh;
			padding-top: 100px;
			transition: background 0.4s ease;
		}

		/* === Header === */
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
			transition: background-color 1s ease;
		}

		.header-container {
			max-width: 1200px;
			margin: auto;
			display: grid;
			grid-template-columns: 1fr auto 1fr;
			align-items: center;
		}

		header.scrolled {
			background-color: rgba(18, 46, 73, 0.404);
			/* agak transparan saat scroll */
		}


		.profile-dropdown {
			position: relative;
			display: inline-block;
		}

		.profile-capsule {
			display: flex;
			align-items: center;
			gap: 10px;
			padding: 8px 16px;
			background: white;
			border-radius: 999px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			cursor: pointer;
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


		.verified-dropdown {
			position: relative;
			display: inline-block;
		}

		.verified-icon {
			width: 40px;
			height: 40px;
			cursor: pointer;
		}

		.verified-shape {
			width: 100%;
			height: 100%;
			background: white;
			clip-path: polygon(50% 0%, 85% 15%, 100% 50%, 85% 85%,
					50% 100%, 15% 85%, 0% 50%, 15% 15%);
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			transition: box-shadow 0.3s ease;
		}

		.verified-shape:hover {
			box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
		}

		.check-icon {
			display: block;
		}

		.verified-dropdown-menu {
			position: absolute;
			top: 130%;
			right: 0;
			background: white;
			border-radius: 12px;
			padding: 12px;
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
			min-width: 110px;
			opacity: 0;
			transform: translateY(-10px);
			pointer-events: none;
			transition: all 0.3s ease;
			z-index: 100;
		}

		.verified-dropdown.open .verified-dropdown-menu {
			opacity: 1;
			transform: translateY(0);
			pointer-events: auto;
		}

		.time-display {
			font-size: 14px;
			font-weight: 600;
			color: #2c3e50;
			text-align: center;
		}

		.countdown-label {
			font-size: 12px;
			color: #888;
			text-align: center;
			margin-bottom: 4px;
			font-weight: 500;
		}


		.user-section {
			justify-self: end;
			display: flex;
			align-items: center;
			gap: 8px;
			/* profil dan badge lebih rapat */
		}

		.header-left {
			justify-self: start;
		}

		.header-center {
			justify-self: center;
		}

		.user-section {
			justify-self: end;
			display: flex;
			align-items: center;
			gap: 8px;
			/* antara profil dan verified badge */
		}

		.logo {
			justify-self: start;
			font-size: 30px;
			font-weight: bold;
			color: white;
		}

		a .logo {
			text-decoration: none;
			color: inherit;
			/* biar warna tetap ikut dari .logo */
			color: #ffffff;
			/* pastikan warnanya putih */
		}

		.menu ul {
			list-style: none;
			display: flex;
			gap: 24px;
		}

		.menu ul li a {
			color: #ffffff;
			font-weight: 500;
			transition: color 0.3s ease;
		}

		.menu ul li a:hover {
			color: #a7c4ff;
		}

		/* === Section Title === */
		.section-title {
			text-align: center;
			margin-top: 95px;
			font-size: 2.6rem;
			color: #2c3e50;
			font-weight: 700;
			animation: fadeInDown 0.8s ease-out;
		}

		/* === Dropdown Section === */
		.dropdown-section {
			max-width: 700px;
			margin: 40px auto;
			padding: 40px;
			background: #ffffff;
			border-radius: 20px;
			box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
			animation: fadeInUp 1.2s ease-out;
		}

		label {
			font-weight: 600;
			font-size: 1.1rem;
			margin-bottom: 10px;
			display: block;
			color: #3b5a91;
		}

		select {
			width: 100%;
			padding: 14px;
			border-radius: 12px;
			border: 1px solid #ccc;
			font-size: 16px;
			margin-bottom: 30px;
			background-color: #fff;
			transition: all 0.3s ease;
		}

		select:focus {
			outline: none;
			border-color: #3b5a91;
			box-shadow: 0 0 0 3px rgba(59, 90, 145, 0.15);
		}

		.bab-list {
			background-color: #f1f6fb;
			padding: 20px;
			border-radius: 16px;
			box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.05);
			animation: fadeInBab 1.4s ease-out;
		}

		.bab-list ul {
			list-style: none;
			padding: 0;
			margin: 0;
			display: flex;
			flex-direction: column;
			gap: 14px;
		}

		.bab-list li {
			padding: 14px 18px;
			border-radius: 12px;
			background-color: #ffffff;
			font-size: 16px;
			font-weight: 500;
			cursor: pointer;
			display: flex;
			justify-content: space-between;
			align-items: center;
			transition: all 0.35s ease;
			border: 1px solid #dce3ea;
			transform: translateY(20px);
			opacity: 0;
			animation: revealItem 0.4s ease forwards;
		}

		.bab-list li:nth-child(1) {
			animation-delay: 0.1s;
		}

		.bab-list li:nth-child(2) {
			animation-delay: 0.2s;
		}

		.bab-list li:nth-child(3) {
			animation-delay: 0.3s;
		}

		.bab-list li:nth-child(4) {
			animation-delay: 0.4s;
		}

		.bab-list li:nth-child(5) {
			animation-delay: 0.5s;
		}

		.bab-list li:nth-child(6) {
			animation-delay: 0.6s;
		}

		.bab-list li:nth-child(7) {
			animation-delay: 0.7s;
		}

		.bab-list li:nth-child(8) {
			animation-delay: 0.8s;
		}

		.bab-list li:nth-child(9) {
			animation-delay: 0.9s;
		}

		.bab-list li:hover {
			background-color: #e4f0ff;
			transform: translateX(8px);
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
		}

		.bab-list li::after {
			content: '➔';
			color: #3b5a91;
			font-size: 18px;
			font-weight: bold;
			transition: transform 0.3s ease;
		}

		.bab-list li:hover::after {
			transform: translateX(5px);
		}

		/* === Animations === */
		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(60px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		@keyframes fadeInDown {
			from {
				opacity: 0;
				transform: translateY(-40px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		@keyframes fadeInBab {
			from {
				opacity: 0;
				transform: scale(0.95);
			}

			to {
				opacity: 1;
				transform: scale(1);
			}
		}

		@keyframes revealItem {
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		/* === Responsive === */
		@media (max-width: 768px) {

			.header-container,
			.menu ul {
				flex-direction: column;
				align-items: flex-start;
			}

			.dropdown-section {
				padding: 30px 20px;
			}

			.section-title {
				font-size: 2rem;
			}

			.profile-capsule {
				width: 100%;
				justify-content: flex-start;
			}
		}

		.empty-state {
			text-align: center;
			margin-top: 60px;
			animation: fadeInUp 0.6s ease;
		}

		.empty-state img {
			max-width: 160px;
			margin-bottom: 20px;
			opacity: 0.8;
		}

		.empty-state h3 {
			font-size: 1.8rem;
			color: #3b5a91;
			margin-bottom: 10px;
		}

		.empty-state p {
			font-size: 1rem;
			color: #555;
		}

		.soal-wrapper {
			display: flex;
			justify-content: space-between;
			gap: 40px;
			padding: 60px 80px;
			max-width: 1400px;
			margin: auto;
			align-items: flex-start;
			animation: fadeInUp 1s ease;
		}

		.soal-left {
			padding: 30px;
			background: linear-gradient(to right, #f0f4ff, #e8f0fe);
			border-radius: 20px;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
			display: flex;
			flex-direction: column;
			gap: 25px;
			max-width: 500px;
		}

		.soal-left h1 {
			font-size: 26px;
			font-weight: 600;
			color: #2c3e50;
		}

		.soal-left p {
			font-size: 16px;
			color: #555;
			line-height: 1.6;
		}

		.progress-list {
			display: flex;
			flex-direction: column;
			gap: 20px;
		}

		.progress-item {
			display: flex;
			flex-direction: column;
			gap: 8px;
		}

		.progress-label {
			display: flex;
			align-items: center;
			gap: 12px;
			font-weight: 600;
			color: #34495e;
		}

		.progress-track {
			height: 22px;
			background: #dfe6f3;
			border-radius: 10px;
			overflow: hidden;
		}

		.progress-fill {
			height: 100%;
			background: linear-gradient(to right, #4e9af1, #64c2ff);
			color: white;
			font-size: 13px;
			font-weight: 500;
			padding-left: 10px;
			display: flex;
			align-items: center;
			border-radius: 10px 0 0 10px;
			transition: width 0.5s ease;
		}

		.progress-image {
			max-width: 200px;
			align-self: center;
			margin-top: 15px;
		}


		.soal-right {
			flex: 1;
			padding: 40px;
			background: #ffffff;
			border-radius: 20px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
			min-height: 400px;
		}

		.empty-state {
			text-align: center;
			padding: 20px;
			font-size: 1rem;
			color: #777;
			animation: fadeInUp 0.5s ease;
		}

		/* Responsif */
		@media (max-width: 992px) {
			.soal-wrapper {
				flex-direction: column;
				padding: 40px 20px;
			}

			.soal-left,
			.soal-right {
				width: 100%;
			}
		}
	</style>
</head>

<body>
	<header>
		<div class="header-container">
			<a href="../member/member.html" style="text-decoration: none;">
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
			<!-- Gabungan: Profil + Verified -->
			<div class="user-section">
				<!-- Profil tetap utuh -->
				<div class="profile-dropdown" id="profileDropdown">
					<div class="profile-capsule" onclick="toggleDropdown()">
						<img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=150&h=150&q=80"
							alt="Profile" class="profile-pic" />
						<span class="profile-name">Halo, Davin</span>
						<span class="dropdown-icon">▼</span>
					</div>
					<div class="dropdown-menu">
						<!-- <a class="dropdown-item" href="../profile/profile.html"
							style="display: flex; align-items: center; gap: 8px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
								viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M4.5 20.25a8.25 8.25 0 0115 0" />
							</svg>
							Profile
						</a>
						<a class="dropdown-item" href="../forum_diskusi/forum_diskusi.html">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" d="M5 6h14M5 12h10M5 18h7" />
							</svg>
							Forum Diskusi
						</a> -->
						<a class="dropdown-item" href="<?= base_url('auth/logout')?>">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor"
									d="M15 3h4a2 2 0 0 1 2 2v4m-6 12h4a2 2 0 0 0 2-2v-4m-6 0L3 3m0 18L21 3" />
							</svg>
							Keluar
						</a>
					</div>
				</div>

				<!-- Verified badge -->
				<div class="verified-dropdown" id="verifiedDropdown">
					<div class="verified-icon" onclick="toggleVerifiedDropdown()">
						<div class="verified-shape">
							<svg class="check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
								height="20">
								<path fill="none" stroke="#007BFF" stroke-width="3" stroke-linecap="round"
									stroke-linejoin="round" d="M6 12l4 4 8-8" />
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
		</div>
	</header>
	<main class="soal-wrapper">
		<div class="soal-left">
			<h1>Progress Belajar Kamu 📘</h1>
			<p>
				Pantau perkembanganmu dalam mengerjakan soal-soal interaktif. Raih target belajar dengan konsisten dan
				menyenangkan!
			</p>
			<div class="progress-list">
                <?php foreach ($progress as $mapel => $p): ?>
                    <div class="progress-item">
                        <div class="progress-label">
                            <img src="<?= $p['icon'] ?>" alt="<?= $mapel ?>" />
                            <span><?= $mapel ?></span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: <?= $p['persentase'] ?>%">
                                <?= $p['bab_selesai'] ?>/<?= $p['total_bab'] ?> Bab
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
			<img class="progress-image" src="https://img.icons8.com/fluency/200/student-male--v1.png"
				alt="Siswa Belajar">
		</div>

        <?php 
        $dataBab = [];
        foreach($latihan as $row){
            $dataBab[$row->mapel][] = [
                'id_latihan' => $row->id_latihan,
                'bab'        => $row->bab
            ];
        } ?>

		<div class="soal-right">
			<label for="mapel">Pilih Mata Pelajaran:</label>
			<select id="mapel" onchange="tampilkanBab()">
                <option value="">-- Pilih --</option>
                <?php foreach($latihan as $aa) { ?>
                    <option value="<?= $aa->mapel ?>"><?= $aa->mapel ?></option>
                <?php } ?>
			</select>

			<div class="bab-list" id="babContainer" style="display: none;">
				<label>Daftar Bab:</label>
				<ul id="babList"></ul>
			</div>

			<div class="empty-state" id="emptyState">
				<p>Silakan pilih mata pelajaran untuk melihat daftar bab.</p>
			</div>
		</div>
	</main>
	<script>
        const dataBab = <?= json_encode($dataBab) ?>;

        function tampilkanBab() {
            const mapel = document.getElementById('mapel').value;
            const babContainer = document.getElementById('babContainer');
            const babList = document.getElementById('babList');
            babList.innerHTML = '';

            if (mapel && dataBab[mapel]) {
                dataBab[mapel].forEach((bab) => {
                    const li = document.createElement('li');
                    li.textContent = bab.bab;
                    li.style.cursor = 'pointer';
                    li.onclick = () => {
                        window.location.href = "<?= site_url('member/latihan_soal/soal/') ?>" + bab.id_latihan;
                    };
                    babList.appendChild(li);
                });
                babContainer.style.display = 'block';
                document.getElementById('emptyState').style.display = 'none';
            } else {
                babContainer.style.display = 'none';
                document.getElementById('emptyState').style.display = 'block';
            }
        }
    </script>
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

		function toggleVerifiedDropdown() {
			document.getElementById("verifiedDropdown").classList.toggle("open");
		}

		function startCountdown(hours, minutes, seconds) {
			let totalSeconds = hours * 3600 + minutes * 60 + seconds;

			function updateTimer() {
				if (totalSeconds < 0) {
					clearInterval(timerInterval);
					return;
				}

				const h = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
				const m = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
				const s = String(totalSeconds % 60).padStart(2, '0');

				document.getElementById("countdownTimer").textContent = `${h}:${m}:${s}`;
				totalSeconds--;
			}

			updateTimer(); // run once immediately
			const timerInterval = setInterval(updateTimer, 1000);
		}

		window.addEventListener('DOMContentLoaded', () => {
			startCountdown(11, 35, 11);
		});

	</script>
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

</html>
