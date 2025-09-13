<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carousel Mapel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="buku.css">
</head>

<body>
  <header>
    <div class="header-container">
      <a href="../member/member.html" style="text-decoration: none;">
        <div class="logo">FIVY</div>
      </a>
      <nav class="menu">
        <ul>
          <li><a href="../member/member.html">Home</a></li>
          <li><a href="../buku/buku.html">Daftar Bacaan</a></li>
          <li><a href="../latihan_soal/latihan_soal.html">Latihan Soal</a></li>
          <li><a href="../tryout/tryout.html">Try Out</a></li>
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
                        <a class="dropdown-item" href="../profile/profile.html"
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
                        </a>
                        <a class="dropdown-item" href="../login/login.html">
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
        <img src="../ban.png" alt="Siswa Belajar">

      </div>
      <div class="hero-text">
        <h1>Belajar Lebih Mudah & Menyenangkan</h1>
        <p>
          FIVY adalah platform belajar online untuk siswa SMA/SMK yang dirancang agar lebih fleksibel, menyenangkan, dan
          bisa diakses kapan pun.
        </p>
        <a href="#" class="cta">Mulai Belajar Sekarang</a>
      </div>
    </div>
  </section>
  <!-- Bagian HTML -->
  <section class="book-section">
    <h2 class="section-title">Bahasa Indonesia</h2>
    <div class="book-grid">
      <div class="book-card">
        <div class="book-image">
          <img
            src="https://static.buku.kemdikbud.go.id/content/image/coverteks/coverkurikulum21/Bahasa_Indonesia_BS_KLS_X_Rev_Cover.png" />
        </div>
        <div class="book-content">
          <h3>Bahasa Indonesia Edisi Revisi Kelas X </h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img
            src="http://grafindo.co.id/wp-content/uploads/2018/01/GMP-222-12-17-034-0-Buku-Siswa-Bahasa-Indonesia-X-768x1108.jpg"
            alt="Fisika" />
        </div>
        <div class="book-content">
          <h3>Bahasa Indonesia Kelompok Wajib X</h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://siplahtelkom.com/public/products/130856/3757194/screenshot_2022.1661309925.jpg"
            alt="Kimia" />
        </div>
        <div class="book-content">
          <h3>Bahasa Indonesia Kelas X</h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img
            src="https://static.buku.kemdikbud.go.id/content/image/coverteks/coverkurikulum21/Bahasa-Indonesia-BS-KLS-XI-cover.png"
            alt="Bahasa Indonesia" />
        </div>
        <div class="book-content">
          <h3>Bahasa Indonesia Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img
            src="https://bukusekolah.id/wp-content/uploads/2023/11/Bahasa-Indonesia-Tingkat-Lanjut-Cakap-Berbahasa-dan-Bersastra-Indonesia-untuk-SMA-MA-Kelas-XII.png"
            alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Bahasa Indonesia Tingkat Lanjut XII</h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.html'">Lihat Detail</button>
        </div>
      </div>
      <div class="book-card">
        <div class="book-image">
          <img src="https://aryadutawebstore.co.id/assets/uploads/foto-produk/0f6d0454cc1cb85f0f05a9fe89a3ff23.jpg"
            alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Berbahasa dan Bersastra Indonesia</h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.html'">Lihat Detail</button>
        </div>
      </div>
    </div>
  </section>
  <section class="book-section">
    <h2 class="section-title">Matematika</h2>
    <div class="book-grid">
      <div class="book-card">
        <div class="book-image">
          <img src="https://bukusekolah.id/wp-content/uploads/2022/07/Matematika-Tingkat-Lanjut-untuk-SMA-Kelas-11.png"
            alt="Matematika" />
        </div>
        <div class="book-content">
          <h3>Matematika Tingkat Lanjut Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukumtk.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img
            src="https://bukusekolah.id/wp-content/uploads/2023/11/Matematika-Tingkat-Lanjut-untuk-SMA-MA-Kelas-XII.png"
            alt="Fisika" />
        </div>
        <div class="book-content">
          <h3>Matematika Tingkat Lanjut Kelas XII</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukumtk.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img
            src="https://bukusekolah.id/wp-content/uploads/2023/11/Buku-Panduan-Guru-Matematika-untuk-SMA-SMK-MA-Kelas-XII.png"
            alt="Kimia" />
        </div>
        <div class="book-content">
          <h3>Matematika Panduan Guru XII</h3>
          <button onclick="window.location.href='../detail_buku/detail_buku.htmlmtk'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="../mtk.jpg" alt="Bahasa Indonesia" />
        </div>
        <div class="book-content">
          <h3>Matematika Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukumtk.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://cdn.gramedia.com/uploads/items/img20221020_15334846.jpg" alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Matematika Rumpun Bisnis XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukumtk.html'">Lihat Detail</button>
        </div>
      </div>
      <div class="book-card">
        <div class="book-image">
          <img src="../mat.jpg" alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Matematika Berbasis P3 Kelas X</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukumtk.html'">Lihat Detail</button>
        </div>
      </div>
    </div>
  </section>
  <section class="book-section">
    <h2 class="section-title">Bahasa Inggris</h2>
    <div class="book-grid">
      <div class="book-card">
        <div class="book-image">
          <img
            src="https://static.buku.kemdikbud.go.id/content/image/coverteks/coverkurikulum21/Bahasa-Inggris-BS-KLS-X-cover.png"
            alt="Matematika" />
        </div>
        <div class="book-content">
          <h3>Bahasa Inggris Kelas X</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukubing.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img
            src="https://static.buku.kemdikbud.go.id/content/image/coverteks/coverkurikulum21/Inggris_BS_KLS_XII_Cover.png"
            alt="Fisika" />
        </div>
        <div class="book-content">
          <h3>Bahasa Inggris kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukubing.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="../inggris.jpg" alt="Kimia" />
        </div>
        <div class="book-content">
          <h3>Bahasa Inggris Berbasis P3 X</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukubing.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://cdn.annibuku.com/uploads/cover/Bahasa-Inggris-Tingkat-Lanjut-BS-KLS-XI-cover_md.png"
            alt="Bahasa Indonesia" />
        </div>
        <div class="book-content">
          <h3>Bahasa Inggris Tingkat Lanjut XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukubing.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://grafindo.co.id/wp-content/uploads/2018/02/English-BUKU-SISWA-XI-2.jpg"
            alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>English Skills For The Future Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukubing.html'">Lihat Detail</button>
        </div>
      </div>
      <div class="book-card">
        <div class="book-image">
          <img src="../inggris3.jpg" alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Bahasa Inggris SPLASH Kelas X</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukubing.html'">Lihat Detail</button>
        </div>
      </div>
    </div>
  </section>
  <section class="book-section">
    <h2 class="section-title">Ilmu Pengetahuan Sosial</h2>
    <div class="book-grid">
      <div class="book-card">
        <div class="book-image">
          <img src="https://cdn.annibuku.com/uploads/cover/IPS-BG-KLS-X-Cover_md.png" alt="Matematika" />
        </div>
        <div class="book-content">
          <h3>IPS Kelas X Buku Panduan Guru</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukuips.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://cdn.annibuku.com/uploads/cover/Sosiologi-BS-KLS-XI-cover_md.png" alt="Fisika" />
        </div>
        <div class="book-content">
          <h3>Sosiologi <br> Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukusos.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://bukusekolah.id/wp-content/uploads/2022/07/Geografi-untuk-SMA-Kelas-11-713x1024.png"
            alt="Kimia" />
        </div>
        <div class="book-content">
          <h3>Geografi <br> Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukugeo.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="../ekonomi.jpg" alt="" />
        </div>
        <div class="book-content">
          <h3>Ekonomi <br> Kelas XI</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukueko.html'">Lihat Detail</button>
        </div>
      </div>

      <div class="book-card">
        <div class="book-image">
          <img src="https://cdn.gramedia.com/uploads/items/9789796625611_SMA-MA-Kelas-.jpg" alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Ekonomi Kelas X <br> PEMINATAN </h3>
          <button onclick="window.location.href='../detail_buku/detail_bukueko.html'">Lihat Detail</button>
        </div>
      </div>
      <div class="book-card">
        <div class="book-image">
          <img src="https://bukusekolah.id/wp-content/uploads/2023/11/Geografi-untuk-SMA-MA-Kelas-XII.png"
            alt="Bahasa Inggris" />
        </div>
        <div class="book-content">
          <h3>Geografi <br> Kelas XII</h3>
          <button onclick="window.location.href='../detail_buku/detail_bukugeo.html'">Lihat Detail</button>
        </div>
      </div>
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
<footer>
  <div class="footer-container">
    <div class="footer-col">
      <h3>Tentang Kami</h3>
      <p>FIVY adalah solusi belajar online untuk siswa SMA/SMK dengan materi berkualitas dan tutor berpengalaman.</p>
    </div>
    <div class="footer-col">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="../member/member.html">Home</a></li>
        <li><a href="../buku/buku.html">Daftar Bacaan</a></li>
        <li><a href="../latihan_soal/latihan_soal.html">Latihan Soal</a></li>
        <li><a href="../tryout/tryout.html">Try Out</a></li>
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