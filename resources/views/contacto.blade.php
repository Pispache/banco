<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario de Contacto - Blazeclan</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 40px 20px;
      background-color: #f5f5f5;
    }

    h2 {
      text-align: center;
      color: #0a2540;
      margin-bottom: 30px;
    }

    h3 {
      text-align: center;
      color: #000000;
      margin-bottom: 30px;
    }

    .formulario-contacto {
      max-width: 700px;
      margin: auto;
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .campo {
      display: flex;
      flex-direction: column;
    }

    .campo label {
      margin-bottom: 5px;
      font-weight: 600;
      color: #0a2540;
    }

    .campo input,
    .campo textarea,
    .campo select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .campo input:focus,
    .campo textarea:focus,
    .campo select:focus {
      outline: none;
      border-color: #00c2ff;
      box-shadow: 0 0 3px rgba(0,194,255,0.4);
    }

    .boton-enviar {
      background-color: #00c2ff;
      color: white;
      font-weight: bold;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .boton-enviar:hover {
      background-color: #008ab3;
    }
  </style>
</head>
<body>

  <h2>Contáctanos</h2>
  <h3>Por favor, llene el formulario y Blazeclan se pondrá en contacto con usted.</h3>
  <form class="formulario-contacto">
    <div class="campo">
      <label for="nombre">Nombre completo *</label>
      <input type="text" id="nombre" name="nombre" required />
    </div>
    <div class="campo">
      <label for="correo">Correo electrónico *</label>
      <input type="email" id="correo" name="correo" required />
    </div>
    <div class="campo">
      <label for="empresa">Empresa</label>
      <input type="text" id="empresa" name="empresa" />
    </div>
    <div class="campo">
      <label for="pais">País *</label>
      <select id="pais" name="pais" required>
        <option value="">Seleccione su país</option>
        <option>Guatemala</option>
        <option>El Salvador</option>
        <option>Honduras</option>
        <option>Colombia</option>
        <option>México</option>
        <option>Otro</option>
      </select>
    </div>
    <div class="campo">
      <label for="mensaje">Mensaje *</label>
      <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
    </div>
    <button type="submit" class="boton-enviar">Enviar Mensaje</button>
  </form>

</body>
</html>
