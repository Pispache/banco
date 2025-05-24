<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #fff 100%);
            min-height: 100vh;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .login-card {
            max-width: 400px;
            border-radius: 28px;
            box-shadow: 0 8px 32px rgba(80,40,190,0.13);
            overflow: hidden;
            background: #fff;
        }
        .login-header {
            background: linear-gradient(135deg, #6c47ff 60%, #7f53ff 100%);
            padding: 36px 24px 24px 24px;
            text-align: center;
        }
        .login-header svg {
            margin-bottom: 10px;
        }
        .login-title {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .login-welcome {
            color: #6c47ff;
            font-size: 1.2rem;
            font-weight: 600;
        }
        .login-subtext {
            color:#888;
            font-size: 1rem;
        }
        .login-form input[type="email"],
        .login-form input[type="password"] {
            border: none;
            border-bottom: 2px solid #dadada;
            border-radius: 0;
            background: transparent;
            box-shadow: none;
            font-size: 1rem;
            padding-left: 0;
            padding-right: 0;
        }
        .login-form input[type="email"]:focus,
        .login-form input[type="password"]:focus {
            border-bottom: 2.5px solid #7f53ff;
            box-shadow: none;
            outline: none;
        }
        .login-form label {
            font-weight: 600;
            color: #333;
        }
        .login-form .form-check-input {
            border-radius: 6px;
            border: 2px solid #dadada;
        }
        .login-form .form-check-input:checked {
            background-color: #6c47ff;
            border-color: #6c47ff;
        }
        .login-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .login-form .forgot-link {
            color: #7f53ff;
            font-size: 0.95rem;
            text-decoration: none;
        }
        .login-form .forgot-link:hover {
            text-decoration: underline;
        }
        .login-btn {
            background: linear-gradient(90deg, #7f53ff 60%, #6c47ff 100%);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 14px;
            width: 100%;
            padding: 8px 0;
            font-size: 1rem;
            box-shadow: 0 4px 16px rgba(127,83,255,0.18);
            margin-bottom: 8px;
            transition: background 0.2s;
        }
        .login-btn:hover {
            background: linear-gradient(90deg, #6c47ff 60%, #7f53ff 100%);
        }
        .register-btn {
            border-radius: 12px;
            border: 2px solid #7f53ff;
            color: #7f53ff;
            background: #fff;
            font-weight: 500;
            width: 100%;
            margin-top: 8px;
            padding: 6px 0 6px 0;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            box-shadow: none;
            outline: none;
            display: inline-block;
            transition: background 0.2s, color 0.2s, border-color 0.2s;
        }
        .register-btn:hover {
            background: #7f53ff;
            color: #fff;
            border-color: #7f53ff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-card">
            <!-- Header morado con logo y nombre -->
            <div class="login-header">
                <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#fff"/><path d="M24 13l6 6h-4v6h-4v-6h-4l6-6z" fill="#6c47ff"/></svg>
                <div class="login-title">BANCO</div>
            </div>
            <!-- Formulario -->
            <div style="background: #fff; padding: 28px 24px 18px 24px;">
                <div class="mb-2 login-welcome">¡Bienvenido!</div>
                <div class="mb-4 login-subtext">Por favor, inicia sesión con tus datos</div>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    </div>
                    <div class="login-actions mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Recuérdame</label>
                        </div>
                        <a class="forgot-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" class="login-btn">Iniciar sesión</button>
                </form>
            </div>
            <!-- Botón de registro -->
            <div style="padding: 0 24px 24px 24px; background: #fff;">
                <a href="{{ route('register') }}" class="register-btn">¿No tienes cuenta? Regístrate</a>
            </div>
        </div>
    </div>
</body>
</html>
