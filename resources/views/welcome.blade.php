<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Bienvenido a tu Banco</div>
                    <div class="card-body">
                        <h3 class="mb-4">¡Bienvenido!</h3>
                        <p>Este es el sistema bancario. Por favor, inicia sesión o regístrate para comenzar.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
