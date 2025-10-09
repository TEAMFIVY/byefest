<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Tryout | FIVY</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/buku.css') ?>">
  <style>
    body{font-family:'Poppins',sans-serif;background:#f4f6fb;margin:0;padding-top:90px}
    .container{max-width:1000px;margin:auto}
    h1{text-align:center;color:#2c3e50;margin-bottom:24px}
    .grid{display:grid;grid-template-columns:1fr;gap:18px}
    .card{background:#fff;padding:18px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,0.06)}
    .tryout-row{display:flex;justify-content:space-between;align-items:center;gap:12px}
    .meta{display:flex;gap:12px;align-items:center}
    .icon{width:48px;height:48px}
    .progress-container{width:320px}
    .track{height:16px;background:#e9eef8;border-radius:999px;overflow:hidden}
    .fill{height:100%;background:linear-gradient(90deg,#4e9af1,#64c2ff);text-align:right;padding-right:8px;color:#fff;font-weight:600}
    .btn{padding:8px 14px;background:#3b5a91;color:#fff;border-radius:10px;text-decoration:none;font-weight:600}
    .small{font-size:13px;color:#666}
    @media (max-width:780px){
      .tryout-row{flex-direction:column;align-items:flex-start}
      .progress-container{width:100%}
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
            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=150&h=150&q=80"
                alt="Profile" class="profile-pic"/>
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
                <path stroke="currentColor"
                    d="M15 3h4a2 2 0 0 1 2 2v4m-6 12h4a2 2 0 0 0 2-2v-4m-6 0L3 3m0 18L21 3" />
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
    <h1>Tryout</h1>
    <div class="grid">
      <?php if (empty($tryouts)): ?>
        <div class="card">Belum ada tryout tersedia.</div>
      <?php else: ?>
        <?php foreach($tryouts as $t): ?>
          <?php $p = $progress[$t->mapel] ?? ['percent'=>0,'completed'=>0,'total'=>0,'icon'=>'']; ?>
          <div class="card">
            <div class="tryout-row">
              <div class="meta">
                <img class="icon" src="<?= $p['icon'] ?>" alt="<?= $t->mapel ?>">
                <div>
                  <div style="font-weight:700;color:#2c3e50"><?= htmlspecialchars($t->judul) ?></div>
                  <div class="small"><?= htmlspecialchars($t->mapel) ?> • Kelas <?= htmlspecialchars($t->tingkat_kelas) ?></div>
                </div>
              </div>

              <div class="progress-container">
                <div class="small">Progress mapel: <?= $p['percent'] ?>% (<?= $p['completed'] ?>/<?= $p['total'] ?>)</div>
                <div class="track" style="margin-top:6px">
                  <div class="fill" style="width: <?= $p['percent'] ?>%"><?= $p['percent'] ?>%</div>
                </div>
              </div>

              <div>
                <a class="btn" href="<?= site_url('member/tryout/soal/'.$t->id_tryout) ?>">Kerjakan</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>
