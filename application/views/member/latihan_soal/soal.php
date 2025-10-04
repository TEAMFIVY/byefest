<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Latihan Soal - Bab 1</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background: #f4f6fb;
			margin: 0;
			padding: 0;
			color: #333;
		}

		.container {
			max-width: 960px;
			margin: auto;
			padding: 40px 20px;
			position: relative;
		}

		h1 {
			text-align: center;
			color: #2c3e50;
			margin-bottom: 40px;
		}

		.question {
			background: #ffffff;
			border-radius: 12px;
			padding: 20px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
			margin-bottom: 20px;
			animation: fadeInUp 0.6s ease;
		}

		.question h3 {
			font-size: 1.1rem;
			margin-bottom: 12px;
		}

		.options label {
			display: block;
			margin-bottom: 8px;
			background: #f1f3f5;
			padding: 10px;
			border-radius: 8px;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		.options input[type="radio"] {
			margin-right: 10px;
		}

		.options label:hover {
			background: #dfe7fd;
		}

		.submit-btn {
			display: block;
			margin: 40px auto 0;
			padding: 15px 40px;
			font-size: 1rem;
			font-weight: bold;
			background-color: #007bff;
			color: white;
			border: none;
			border-radius: 30px;
			cursor: pointer;
			transition: background 0.3s ease, transform 0.2s ease;
		}

		.submit-btn:hover {
			background-color: #0056b3;
			transform: translateY(-2px);
		}

		.back-btn {
			position: absolute;
			top: 20px;
			left: 20px;
			background-color: #6c757d;
			color: #fff;
			padding: 10px 20px;
			border-radius: 8px;
			text-decoration: none;
			font-weight: 600;
			transition: background 0.3s ease;
		}

		.back-btn:hover {
			background-color: #5a6268;
		}

		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

	</style>
</head>
<body>
    <div class="container">
        <a href="<?= site_url('member/latihan_soal') ?>" class="back-btn">&larr; Kembali</a>
        <h1><?= $latihan->bab ?></h1>

        <form action="<?= site_url('member/latihan_soal/simpan_jawaban') ?>" method="post">
            <input type="hidden" name="id_latihan" value="<?= $latihan->id_latihan ?>">

            <?php foreach ($soal as $index => $s): ?>
                <div class="question">
                    <h3><?= ($index + 1) . '. ' . htmlspecialchars($s->pertanyaan) ?></h3>
                    <div class="options">
                        <?php foreach ($s->opsi as $o): ?>
                            <label>
                                <input type="radio" name="jawaban[<?= $s->id_soal ?>]" value="<?= $o->id_opsi ?>">
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
