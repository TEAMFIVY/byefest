<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Tryout</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body{font-family:'Poppins',sans-serif;background:#f4f6fb;margin:0;padding:40px}
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
    @media (max-width:780px){ .tryout-row{flex-direction:column;align-items:flex-start} .progress-container{width:100%} }
  </style>
</head>
<body>
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
