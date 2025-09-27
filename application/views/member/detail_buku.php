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
      <img src="<?= $book->cover ?>" alt="<?= $book->judul ?>" class="cover-img">
    </div>
    <div class="hero-text">
      <h1><?= $book->judul ?></h1>
      <p><?= $book->mapel ?> - <?= $book->kelas ?></p>
    </div>
  </div>
</section>


  <section class="book-section">
  <h2 class="section-title">Daftar Bab</h2>

  <div class="babs-container">
  <div class="babs-card">
    <?php if(!empty($babs)): ?>
      <?php foreach($babs as $bab): ?>
        <div class="bab-card">
          <h3><?= $bab->judul_bab ?></h3>
          <p><?= nl2br($bab->isi) ?></p>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Belum ada bab untuk buku ini.</p>
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
