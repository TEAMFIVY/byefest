<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>EduPrime Admin | Dashboard</title>

	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						primary: {
							50: '#f0f9ff',
							100: '#e0f2fe',
							200: '#bae6fd',
							300: '#7dd3fc',
							400: '#38bdf8',
							500: '#0ea5e9',
							600: '#0284c7',
							700: '#0369a1',
							800: '#075985',
							900: '#0c4a6e',
						},
						dark: {
							50: '#f8fafc',
							100: '#f1f5f9',
							200: '#e2e8f0',
							300: '#cbd5e1',
							400: '#94a3b8',
							500: '#64748b',
							600: '#475569',
							700: '#334155',
							800: '#1e293b',
							900: '#0f172a',
						}
					},
					fontFamily: {
						sans: ['Inter', 'ui-sans-serif', 'system-ui'],
						display: ['Poppins', 'ui-sans-serif', 'system-ui'],
					},
					animation: {
						'fade-in': 'fadeIn 0.5s ease-out forwards',
						'slide-up': 'slideUp 0.5s ease-out forwards',
						'float': 'float 6s ease-in-out infinite',
					},
					keyframes: {
						fadeIn: {
							'0%': {
								opacity: '0'
							},
							'100%': {
								opacity: '1'
							}
						},
						slideUp: {
							'0%': {
								transform: 'translateY(20px)',
								opacity: '0'
							},
							'100%': {
								transform: 'translateY(0)',
								opacity: '1'
							}
						},
						float: {
							'0%, 100%': {
								transform: 'translateY(0)'
							},
							'50%': {
								transform: 'translateY(-10px)'
							}
						}
					}
				}
			}
		}

	</script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
		rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<style>
		:root {
			--primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			--secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
			--accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
			--success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
			--warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
			--glass-bg: rgba(255, 255, 255, 0.08);
			--glass-border: rgba(255, 255, 255, 0.18);
		}

    html, body {
      scrollbar-width: none; /* untuk Firefox */
      -ms-overflow-style: none; /* untuk IE/Edge lama */
    }

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Inter', sans-serif;
			background: #f6f9ff;
			color: #334155;
			overflow-x: hidden;
		}

		.glass-effect {
			background: var(--glass-bg);
			backdrop-filter: blur(12px);
			-webkit-backdrop-filter: blur(12px);
			border: 1px solid var(--glass-border);
			box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
		}

		.sidebar {
			background: var(--primary-gradient);
			box-shadow: 0 0 45px rgba(102, 126, 234, 0.25);
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			z-index: 50;
		}

		.sidebar-content {
			overflow-y: auto;
			flex: 1;
			padding-bottom: 1rem;
		}

		.sidebar-content::-webkit-scrollbar {
			width: 6px;
		}

		.sidebar-content::-webkit-scrollbar-track {
			background: rgba(255, 255, 255, 0.1);
			border-radius: 10px;
		}

		.sidebar-content::-webkit-scrollbar-thumb {
			background: rgba(255, 255, 255, 0.3);
			border-radius: 10px;
		}

		.sidebar-content::-webkit-scrollbar-thumb:hover {
			background: rgba(255, 255, 255, 0.5);
		}

		.nav-item {
			transition: all 0.3s ease;
			border-radius: 12px;
			position: relative;
			overflow: hidden;
		}

		.nav-item::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
			transition: all 0.6s ease;
		}

		.nav-item:hover::before {
			left: 100%;
		}

		.nav-item:hover {
			transform: translateX(8px);
		}

		.nav-item.active {
			background: rgba(255, 255, 255, 0.15);
			box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
		}

		.card {
			background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
			border-radius: 20px;
			transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			overflow: hidden;
			position: relative;
			border: 1px solid rgba(255, 255, 255, 0.7);
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
		}

		.card::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 5px;
			background: var(--primary-gradient);
		}

		.card:hover {
			transform: translateY(-8px) scale(1.01);
			box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
		}

		.badge {
			font-size: 0.75rem;
			font-weight: 600;
			padding: 0.4rem 0.9rem;
			border-radius: 20px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
		}

		.header {
			background: rgba(255, 255, 255, 0.85);
			backdrop-filter: blur(15px);
			-webkit-backdrop-filter: blur(15px);
			border-bottom: 1px solid rgba(226, 232, 240, 0.7);
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
		}

		.dropdown-menu {
			box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
			border: 1px solid rgba(226, 232, 240, 0.8);
			border-radius: 16px;
			overflow: hidden;
			backdrop-filter: blur(20px);
			-webkit-backdrop-filter: blur(20px);
			background: rgba(255, 255, 255, 0.9);
		}

		.chart-container {
			position: relative;
			height: 70px;
			width: 100%;
			margin-top: 20px;
		}

		.mini-chart {
			width: 100%;
			height: 100%;
			opacity: 0.8;
		}

		@keyframes countUp {
			from {
				opacity: 0;
				transform: translateY(15px) scale(0.95);
			}

			to {
				opacity: 1;
				transform: translateY(0) scale(1);
			}
		}

		.counting-badge {
			animation: countUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
		}

		@keyframes pulse {
			0% {
				box-shadow: 0 0 0 0 rgba(79, 172, 254, 0.4);
			}

			70% {
				box-shadow: 0 0 0 10px rgba(79, 172, 254, 0);
			}

			100% {
				box-shadow: 0 0 0 0 rgba(79, 172, 254, 0);
			}
		}

		.pulse {
			animation: pulse 2s infinite;
		}

		.bg-shape-1 {
			position: absolute;
			top: -100px;
			right: -100px;
			width: 400px;
			height: 400px;
			border-radius: 50%;
			background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
			z-index: -1;
		}

		.bg-shape-2 {
			position: absolute;
			bottom: -80px;
			left: -80px;
			width: 300px;
			height: 300px;
			border-radius: 50%;
			background: linear-gradient(135deg, rgba(79, 172, 254, 0.1) 0%, rgba(0, 242, 254, 0.1) 100%);
			z-index: -1;
		}

		.floating-element {
			animation: float 8s ease-in-out infinite;
		}

		.progress-ring {
			transform: rotate(-90deg);
		}

		.progress-ring__circle {
			transition: stroke-dashoffset 0.8s ease;
			stroke-linecap: round;
		}

	</style>
</head>

<body class="flex relative overflow-x-hidden min-h-screen">
	<div class="bg-shape-1"></div>
	<div class="bg-shape-2"></div>

	<div id="sidebar-container"></div>

	<div class="flex-1 flex flex-col min-h-screen">
		<div id="header-container"></div>
		<main class="flex-1 p-8">
			<h2 class="text-2xl font-semibold mb-8 text-slate-800 font-display" data-aos="fade-up">📊 Dashboard Overview</h2>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
				<div class="card p-6 relative" data-aos="fade-up" data-aos-delay="100">
					<span class="badge bg-indigo-100 text-indigo-600 absolute top-5 right-5 counting-badge"
						id="badgeSiswa">0</span>
					<div class="mb-5">
						<div
							class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 text-2xl floating-element">
							<i class="bi bi-people-fill"></i>
						</div>
					</div>
					<h3 class="text-lg font-semibold mb-2 text-slate-800 font-display">Total Siswa</h3>
					<p class="text-slate-500 text-sm mb-3">Jumlah siswa aktif yang terdaftar</p>
					<div class="chart-container">
						<canvas class="mini-chart" id="siswaChart"></canvas>
					</div>
				</div>
				<div class="card p-6 relative" data-aos="fade-up" data-aos-delay="200">
					<span class="badge bg-emerald-100 text-emerald-600 absolute top-5 right-5 counting-badge"
						id="badgeGuru">0</span>
					<div class="mb-5">
						<div
							class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center text-emerald-600 text-2xl floating-element">
							<i class="bi bi-person-badge"></i>
						</div>
					</div>
					<h3 class="text-lg font-semibold mb-2 text-slate-800 font-display">Total Guru</h3>
					<p class="text-slate-500 text-sm mb-3">Jumlah guru pengajar yang terdaftar</p>
					<div class="chart-container">
						<canvas class="mini-chart" id="guruChart"></canvas>
					</div>
				</div>
				<div class="card p-6 relative" data-aos="fade-up" data-aos-delay="300">
					<span class="badge bg-amber-100 text-amber-600 absolute top-5 right-5 counting-badge"
						id="badgeTryout">0</span>
					<div class="mb-5">
						<div
							class="w-14 h-14 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 text-2xl floating-element">
							<i class="bi bi-pencil-square"></i>
						</div>
					</div>
					<h3 class="text-lg font-semibold mb-2 text-slate-800 font-display">Try Out UTBK</h3>
					<p class="text-slate-500 text-sm mb-3">Jumlah try out aktif yang sedang berlangsung</p>
					<div class="chart-container">
						<canvas class="mini-chart" id="tryoutChart"></canvas>
					</div>
				</div>
				<div class="card p-6 relative" data-aos="fade-up" data-aos-delay="400">
					<span class="badge bg-purple-100 text-purple-600 absolute top-5 right-5 counting-badge"
						id="badgeAktif">0</span>
					<div class="mb-5">
						<div
							class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 text-2xl floating-element">
							<i class="bi bi-calendar-check"></i>
						</div>
					</div>
					<h3 class="text-lg font-semibold mb-2 text-slate-800 font-display">Aktivitas Hari Ini</h3>
					<p class="text-slate-500 text-sm mb-3">Jumlah siswa yang login hari ini</p>
					<div class="chart-container">
						<canvas class="mini-chart" id="aktivitasChart"></canvas>
					</div>
				</div>
			</div>
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
				<div class="card p-6" data-aos="fade-up" data-aos-delay="500">
					<div class="flex justify-between items-center mb-6">
						<h3 class="text-lg font-semibold text-slate-800 font-display flex items-center">
							<i class="bi bi-clock-history text-primary-600 mr-2"></i>Aktivitas Terbaru
						</h3>
						<button class="text-xs text-primary-600 font-medium hover:text-primary-700 transition-colors duration-200">
							Lihat Semua
						</button>
					</div>
					<div class="space-y-5">
						<div class="flex items-start" data-aos="fade-up" data-aos-delay="550">
							<div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 mr-4">
								<i class="bi bi-person-plus"></i>
							</div>
							<div class="flex-1">
								<p class="text-sm font-medium text-slate-800">Siswa baru terdaftar</p>
								<p class="text-xs text-slate-500 mt-1">Andi Pratama bergabung dengan kelas IPA</p>
								<p class="text-xs text-slate-400 mt-2">2 jam yang lalu</p>
							</div>
						</div>
						<div class="flex items-start" data-aos="fade-up" data-aos-delay="600">
							<div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 mr-4">
								<i class="bi bi-pencil-square"></i>
							</div>
							<div class="flex-1">
								<p class="text-sm font-medium text-slate-800">Try out baru dijadwalkan</p>
								<p class="text-xs text-slate-500 mt-1">UTBK Saintek #12 dimulai besok</p>
								<p class="text-xs text-slate-400 mt-2">5 jam yang lalu</p>
							</div>
						</div>
						<div class="flex items-start" data-aos="fade-up" data-aos-delay="650">
							<div
								class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-content-center text-emerald-600 mr-4">
								<i class="bi bi-check-circle"></i>
							</div>
							<div class="flex-1">
								<p class="text-sm font-medium text-slate-800">Pembayaran dikonfirmasi</p>
								<p class="text-xs text-slate-500 mt-1">Sinta Melani melunasi pembayaran</p>
								<p class="text-xs text-slate-400 mt-2">Kemarin, 09:42 AM</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card p-6" data-aos="fade-up" data-aos-delay="700">
					<h3 class="text-lg font-semibold mb-6 text-slate-800 font-display flex items-center">
						<i class="bi bi-graph-up text-primary-600 mr-2"></i>Ringkasan Kinerja
					</h3>
					<div class="grid grid-cols-2 gap-5">
						<div class="bg-indigo-50 p-5 rounded-2xl flex flex-col justify-between" data-aos="zoom-in"
							data-aos-delay="750">
							<p class="text-xs text-indigo-700 font-medium mb-2">KEHADIRAN</p>
							<div class="flex items-end justify-between">
								<p class="text-2xl font-bold text-indigo-800">92%</p>
							</div>
						</div>
						<div class="bg-amber-50 p-5 rounded-2xl flex flex-col justify-between" data-aos="zoom-in"
							data-aos-delay="800">
							<p class="text-xs text-amber-700 font-medium mb-2">NILAI RATA-RATA</p>
							<div class="flex items-end justify-between">
								<p class="text-2xl font-bold text-amber-800">78.5</p>
							</div>
						</div>
						<div class="bg-emerald-50 p-5 rounded-2xl flex flex-col justify-between" data-aos="zoom-in"
							data-aos-delay="850">
							<p class="text-xs text-emerald-700 font-medium mb-2">KELULUSAN</p>
							<div class="flex items-end justify-between">
								<p class="text-2xl font-bold text-emerald-800">87%</p>
							</div>
						</div>
						<div class="bg-purple-50 p-5 rounded-2xl flex flex-col justify-between" data-aos="zoom-in"
							data-aos-delay="900">
							<p class="text-xs text-purple-700 font-medium mb-2">KEPUASAN</p>
							<div class="flex items-end justify-between">
								<p class="text-2xl font-bold text-purple-800">94%</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

	<script>
		// Fungsi untuk memuat konten dari file eksternal
		async function loadComponent(url, elementId) {
			try {
				const response = await fetch(url);
				if (!response.ok) {
					throw new Error(`HTTP error! status: ${response.status}`);
				}
				const html = await response.text();
				document.getElementById(elementId).innerHTML = html;
			} catch (e) {
				console.error(`Gagal memuat komponen dari ${url}:`, e);
			}
		}

		// Panggil fungsi untuk memuat sidebar dan header saat halaman dimuat
		document.addEventListener('DOMContentLoaded', () => {
			loadComponent('../layout/sidebar.html', 'sidebar-container');
			loadComponent('../layout/header.html', 'header-container');

			// Inisialisasi AOS setelah semua konten dimuat
			setTimeout(() => {
				AOS.init({
					duration: 800,
					easing: 'ease-out-quad',
					once: true,
					offset: 50
				});
			}, 500);
		});

		// Skrip dan fungsi yang sudah ada
		function toggleSidebar() {
			const sidebar = document.querySelector(
			".sidebar-mobile"); // Menggunakan class yang sesuai dengan sidebar di file HTML
			const overlay = document.getElementById("overlay");
			sidebar.classList.toggle("hidden");
			overlay.classList.toggle("hidden");
		}

		function toggleDropdown() {
			document.getElementById("dropdownMenu").classList.toggle("hidden");
		}

		window.onclick = function (e) {
			const dropdown = document.getElementById("dropdownMenu");
			const profile = document.querySelector("header img");
			if (!e.target.closest('.relative') && !dropdown.contains(e.target)) {
				dropdown.classList.add("hidden");
			}
		}

		const statistik = {
			siswa: 150,
			guru: 20,
			tryout: 3,
			aktif: 45
		};

		function animateValue(id, start, end, duration) {
			const element = document.getElementById(id);
			let startTimestamp = null;
			const step = (timestamp) => {
				if (!startTimestamp) startTimestamp = timestamp;
				const progress = Math.min((timestamp - startTimestamp) / duration, 1);
				const value = Math.floor(progress * (end - start) + start);
				element.innerHTML = value.toLocaleString();
				if (progress < 1) {
					window.requestAnimationFrame(step);
				}
			};
			window.requestAnimationFrame(step);
		}

		setTimeout(() => {
			animateValue('badgeSiswa', 0, statistik.siswa, 1200);
			animateValue('badgeGuru', 0, statistik.guru, 1200);
			animateValue('badgeTryout', 0, statistik.tryout, 1200);
			animateValue('badgeAktif', 0, statistik.aktif, 1200);
		}, 500);

		function drawMiniChart(canvasId, color, data) {
			const canvas = document.getElementById(canvasId);
			const ctx = canvas.getContext('2d');
			canvas.width = canvas.offsetWidth;
			canvas.height = canvas.offsetHeight;
			const width = canvas.width;
			const height = canvas.height;
			ctx.clearRect(0, 0, width, height);
			ctx.beginPath();
			ctx.moveTo(0, height);
			const points = data.length;
			const segmentWidth = width / (points - 1);
			for (let i = 0; i < points; i++) {
				const x = i * segmentWidth;
				const y = height - (data[i] / 100 * height);
				ctx.lineTo(x, y);
			}
			ctx.lineTo(width, height);
			ctx.closePath();
			const gradient = ctx.createLinearGradient(0, 0, 0, height);
			gradient.addColorStop(0, color + '80');
			gradient.addColorStop(1, color + '20');
			ctx.fillStyle = gradient;
			ctx.fill();
			ctx.strokeStyle = color;
			ctx.lineWidth = 2;
			ctx.stroke();
		}

		setTimeout(() => {
			drawMiniChart('siswaChart', '#4f46e5', [30, 45, 25, 60, 50, 70, 65, 75, 60, 40, 50, 55, 65, 70, 75, 80]);
			drawMiniChart('guruChart', '#10b981', [40, 35, 50, 45, 40, 55, 40, 35, 30, 40, 45, 50, 55, 50, 45, 50]);
			drawMiniChart('tryoutChart', '#f59e0b', [60, 65, 70, 60, 55, 50, 45, 55, 60, 65, 70, 75, 70, 65, 70, 75]);
			drawMiniChart('aktivitasChart', '#8b5cf6', [20, 25, 30, 40, 35, 45, 50, 55, 50, 45, 40, 35, 40, 45, 50, 55]);
		}, 800);

	</script>
</body>

</html>
