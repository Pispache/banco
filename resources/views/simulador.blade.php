<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Simulador de Costos en la Nube</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      padding: 40px;
      background: #f9f9f9;
      color: #0a2540;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .simulador {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .resultado {
      margin-top: 25px;
      background: #e0f7fa;
      padding: 15px;
      border-radius: 8px;
      font-size: 18px;
    }

    canvas {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <h1>💻 Simulador de Costos en la Nube</h1>
  <div class="simulador">
    <label for="empresa">Tamaño de la empresa</label>
    <select id="empresa">
      <option value="small">Pequeña</option>
      <option value="medium">Mediana</option>
      <option value="large">Grande</option>
    </select>

    <label for="ram">Memoria RAM (GB)</label>
    <input type="number" id="ram" min="1" value="4" />

    <label for="cpu">Número de CPUs</label>
    <input type="number" id="cpu" min="1" value="2" />

    <label for="almacenamiento">Almacenamiento (GB)</label>
    <input type="number" id="almacenamiento" min="10" value="100" />

    <label for="horas">Duración (horas)</label>
    <input type="number" id="horas" min="1" value="24" />

    <div class="resultado">
      <div id="resultado-hora">💰 Costo estimado por duración: $0.00 USD</div>
      <div id="resultado-mes">📅 Costo mensual estimado (24/7): $0.00 USD</div>
      <div id="resultado-tradicional">🖥️ Costo tradicional mensual: $0.00 USD</div>
      <div id="resultado-ahorro">📊 Ahorro estimado: $0.00 USD</div>
    </div>

    <canvas id="grafico" width="400" height="200"></canvas>
  </div>

  <script>
    const ramInput = document.getElementById('ram');
    const cpuInput = document.getElementById('cpu');
    const almacenamientoInput = document.getElementById('almacenamiento');
    const horasInput = document.getElementById('horas');
    const empresaInput = document.getElementById('empresa');
    const resultadoHora = document.getElementById('resultado-hora');
    const resultadoMes = document.getElementById('resultado-mes');
    const resultadoTradicional = document.getElementById('resultado-tradicional');
    const resultadoAhorro = document.getElementById('resultado-ahorro');

    let chart;

    function calcularCosto() {
      const ram = parseFloat(ramInput.value);
      const cpu = parseFloat(cpuInput.value);
      const almacenamiento = parseFloat(almacenamientoInput.value);
      const horas = parseFloat(horasInput.value);

      const costoRAM = ram * 0.01;
      const costoCPU = cpu * 0.05;
      const costoAlmacenamiento = almacenamiento * 0.001;
      const totalPorHora = costoRAM + costoCPU + costoAlmacenamiento;
      const totalUso = totalPorHora * horas;
      const totalMes = totalPorHora * 720;

      // Supuestos de costo tradicional
      let costoTradicional = 400;
      if (empresaInput.value === 'medium') costoTradicional = 800;
      else if (empresaInput.value === 'large') costoTradicional = 1100;

      const ahorro = Math.max(costoTradicional - totalMes, 0);

      resultadoHora.textContent = `💰 Costo estimado por duración: $${totalUso.toFixed(2)} USD`;
      resultadoMes.textContent = `📅 Costo mensual estimado (24/7): $${totalMes.toFixed(2)} USD`;
      resultadoTradicional.textContent = `🖥️ Costo tradicional mensual: $${costoTradicional.toFixed(2)} USD`;
      resultadoAhorro.textContent = `📊 Ahorro estimado: $${ahorro.toFixed(2)} USD`;

      // Actualizar gráfico
      if (chart) chart.destroy();
      const ctx = document.getElementById('grafico').getContext('2d');
      chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Tradicional', 'Nube'],
          datasets: [{
            label: 'Costo mensual (USD)',
            data: [costoTradicional, totalMes],
            backgroundColor: ['#ef4444', '#10b981']
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    [ramInput, cpuInput, almacenamientoInput, horasInput, empresaInput].forEach(input => {
      input.addEventListener('input', calcularCosto);
    });

    calcularCosto();
  </script>
</body>
</html>
