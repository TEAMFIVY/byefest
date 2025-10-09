<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Hasil Tryout</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    html,body{height:100%;font-family:'Poppins',sans-serif;background:linear-gradient(135deg,#d0e7ff,#f7fcff)}
    .wrapper{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
    .container{display:flex;flex-wrap:wrap;background:#fff;padding:40px;border-radius:20px;box-shadow:0 20px 50px rgba(0,0,0,0.1);max-width:1100px;gap:30px;align-items:center}
    .chart-box{flex:1;min-width:300px;display:flex;justify-content:center}
    .info-box{flex:1;min-width:280px}
    h1{font-size:28px;color:#2c3e50;margin-bottom:18px}
    .summary{font-size:16px;color:#34495e;line-height:1.9;margin-bottom:20px}
    .btn-back{display:inline-block;padding:12px 28px;background:#3b5a91;color:#fff;border-radius:12px;text-decoration:none;font-weight:600}
    @media (max-width:768px){.container{flex-direction:column;text-align:center}}
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
        <a href="<?= site_url('member/tryout') ?>" class="btn-back">← Kembali ke Tryout</a>
      </div>
    </div>
  </div>

  <script>
    const benar = <?= (int)$total_benar ?>;
    const salah = <?= (int)$total_salah ?>;
    const total = <?= (int)$total_soal ?>;
    const nilai = <?= (float)$nilai ?>;

    document.getElementById("summary").innerHTML = `
      <p><strong>Total Soal:</strong> ${total}</p>
      <p><strong>Jawaban Benar:</strong> ${benar}</p>
      <p><strong>Jawaban Salah:</strong> ${salah}</p>
      <p><strong>Nilai Akhir:</strong> ${nilai}</p>
    `;

    const ctx = document.getElementById('resultChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Benar','Salah'],
        datasets: [{ data: [benar,salah], backgroundColor: ['#4CAF50','#E74C3C'], borderWidth:2 }]
      },
      options: {
        responsive:true,
        plugins: {
          datalabels: {
            color: '#fff',
            font: { weight: 'bold', size: 14 },
            formatter: (value, ctx) => {
              const total = ctx.chart.data.datasets[0].data.reduce((a,b)=>a+b,0);
              return total ? Math.round((value/total)*100) + '%' : '0%';
            }
          },
          legend: { position:'bottom' }
        }
      },
      plugins: [ChartDataLabels]
    });
  </script>
</body>
</html>
