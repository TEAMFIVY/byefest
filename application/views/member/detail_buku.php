<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $book->judul ?> | Detail Buku</title>
<link rel="stylesheet" href="<?= base_url('assets/detail_buku.css') ?>">
</head>
<body>
  <header>
    <div class="header-container">
      <div class="logo">FIVY</div>
      <nav class="menu">
        <ul>
          <li><a href="<?= base_url('member') ?>">Home</a></li>
          <li><a href="<?= base_url('buku') ?>">Daftar Bacaan</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="hero-container">
      <div class="hero-image">
        <img src="<?= base_url('assets/uploads/buku/'.$book->cover) ?>" alt="<?= $book->judul ?>" class="cover-img">
      </div>
      <div class="hero-text">
        <h1><?= $book->judul ?></h1>
        <p><?= $book->mapel ?> - <?= $book->kelas ?></p>
      </div>
    </div>
  </section>


  <section class="book-section">
  <h2 class="section-title">Isi Buku</h2>

  <div class="babs-container">
  <div class="babs-card">
    <?php if(!empty($babs)): ?>
      <?php foreach($babs as $bab): ?>
        <div class="bab-card" style="margin-bottom:30px; background:#f8faff; padding:20px; border-radius:12px;">
          <h3 style="margin-bottom:20px;"><?= $bab->judul_bab ?></h3>

          <?php 
          $fotos = json_decode($bab->isi, true);
          if (is_array($fotos) && !empty($fotos)): ?>
              <div class="bab-foto" style="display:flex; flex-direction:column; gap:20px;">
                  <?php foreach($fotos as $foto): ?>
                      <div style="text-align:center;">
                          <img src="<?= base_url('assets/materi/' . $foto) ?>" 
                               alt="Foto Bab" 
                               style="max-width:75%; height:auto; border-radius:10px; border:1px solid #ddd; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                      </div>
                  <?php endforeach; ?>
              </div>
          <?php else: ?>
              <p><?= nl2br($bab->isi) ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Belum ada isi untuk buku ini.</p>
    <?php endif; ?>
</div>

</div>


</section>


  <footer>
    <div class="footer-container">
      <p>&copy; 2025 FIVY. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
