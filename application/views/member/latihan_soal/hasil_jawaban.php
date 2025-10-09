<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hasil Jawaban</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #d0e7ff, #f7fcff);
      overflow: hidden;
    }

    .wrapper {
      height: 100vh;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      background: #ffffff;
      padding: 50px;
      border-radius: 30px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
      max-width: 1200px;
      width: 100%;
      animation: fadeIn 1s ease;
      gap: 40px;
      align-items: center;
      justify-content: space-evenly;
    }

    .chart-box {
      flex: 1.2;
      min-width: 360px;
      display: flex;
      justify-content: center;
    }

    .info-box {
      flex: 1;
      min-width: 300px;
    }

    h1 {
      font-size: 36px;
      color: #2c3e50;
      margin-bottom: 30px;
      font-weight: 700;
    }

    .summary {
      font-size: 20px;
      color: #34495e;
      line-height: 2;
      margin-bottom: 30px;
    }

    .btn-back {
      display: inline-block;
      padding: 14px 30px;
      background-color: #3b5a91;
      color: #fff;
      border: none;
      border-radius: 14px;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .btn-back:hover {
      background-color: #2d4773;
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        padding: 30px 20px;
        gap: 30px;
        text-align: center;
      }

      h1 {
        font-size: 28px;
      }

      .summary {
        font-size: 18px;
      }

      .btn-back {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <div class="chart-box">
        <canvas id="resultChart" width="340" height="340"></canvas>
      </div>
      <div class="info-box">
        <h1>Hasil Jawaban Kamu</h1>
        <div class="summary" id="summary"></div>
        <a href="<?= base_url('member/latihan_soal') ?>" class="btn-back">← Kembali ke Latihan</a>
      </div>
    </div>
  </div>
  <script>
  const benar = <?= $total_benar ?>;
  const salah = <?= $total_salah ?>;
  const total = <?= $total_soal ?>;
  const nilai = <?= $nilai ?>;

  // Tampilkan ringkasan teks
  document.getElementById("summary").innerHTML = `
    <p><strong>Total Soal:</strong> ${total}</p>
    <p><strong>Jawaban Benar:</strong> ${benar}</p>
    <p><strong>Jawaban Salah:</strong> ${salah}</p>
    <p><strong>Nilai Akhir:</strong> ${nilai}</p>
  `;

  // Buat chart donat hasil
  const ctx = document.getElementById('resultChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Benar', 'Salah'],
      datasets: [{
        data: [benar, salah],
        backgroundColor: ['#4CAF50', '#E74C3C'],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        datalabels: {
          color: '#fff',
          font: { weight: 'bold', size: 16 },
          formatter: (value, ctx) => {
            const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
            const percent = ((value / total) * 100).toFixed(0);
            return percent + '%';
          }
        },
        legend: {
          position: 'bottom'
        },
        tooltip: {
          callbacks: {
            label: (context) => `${context.label}: ${context.parsed} soal`
          }
        }
      }
    },
    plugins: [ChartDataLabels]
  });
</script>

</body>
</html>
