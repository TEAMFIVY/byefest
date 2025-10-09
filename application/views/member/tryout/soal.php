<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kerjakan Tryout - <?= htmlspecialchars($tryout->judul) ?></title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		body{font-family:'Poppins',sans-serif;background:#f4f6fb;margin:0;padding:0;color:#333}
		.container{max-width:960px;margin:40px auto;padding:20px;position:relative}
		h1{text-align:center;color:#2c3e50;margin-bottom:20px}
		.question{background:#fff;border-radius:12px;padding:20px;box-shadow:0 4px 12px rgba(0,0,0,0.05);margin-bottom:20px}
		.question h3{font-size:1.05rem;margin-bottom:12px}
		.options label{display:block;margin-bottom:8px;background:#f1f3f5;padding:10px;border-radius:8px;cursor:pointer;transition:all .2s}
		.options input[type="radio"]{margin-right:10px}
		.options label:hover{background:#dfe7fd}
		.submit-btn{display:block;margin:30px auto 0;padding:14px 36px;font-size:1rem;font-weight:700;background:#007bff;color:#fff;border:none;border-radius:30px;cursor:pointer}
		.back-btn{position:absolute;top:10px;left:10px;background:#6c757d;color:#fff;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600}
	</style>
</head>
<body>
    <div class="container">
        <a href="<?= site_url('member/tryout') ?>" class="back-btn">&larr; Kembali</a>
        <h1><?= htmlspecialchars($tryout->judul) ?></h1>

        <form action="<?= site_url('member/tryout/simpan_jawaban') ?>" method="post">
            <input type="hidden" name="id_tryout" value="<?= $tryout->id_tryout ?>">

            <?php foreach ($soal as $index => $s): ?>
                <div class="question">
                    <h3><?= ($index + 1) . '. ' . htmlspecialchars($s->pertanyaan) ?></h3>
                    <div class="options">
                        <?php foreach ($s->opsi as $o): ?>
                            <label>
                                <input type="radio" name="jawaban[<?= $s->id_soal ?>]" value="<?= $o->id_opsi ?>" required>
                                <?= htmlspecialchars($o->teks_opsi) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="submit-btn">Kirim Jawaban</button>
        </form>
    </div>
</body>
</html>
