<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #fff 100%);
            min-height: 100vh;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .login-card {
            width: 100%;
            max-width: 500px;
            min-width: 320px;
            margin: 0 auto;
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
        .login-form input[type="email"] {
            border: 1.5px solid #dadada;
            border-radius: 24px;
            background: #fff;
            box-shadow: none;
            font-size: 1rem;
            padding: 8px 18px;
            height: 38px;
            transition: border-color 0.2s;
        }
        .login-form input:focus {
            border-color: #7f53ff;
            box-shadow: none;
            outline: none;
            background: #fff;
        }
        .login-form label {
            font-weight: 400;
            color: #222;
            font-size: 0.95rem;
            margin-bottom: 0px;
            margin-left: 2px;
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
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-card">
            <div class="login-header">
                <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#fff"/><path d="M24 13l6 6h-4v6h-4v-6h-4l6-6z" fill="#6c47ff"/></svg>
                <div class="login-title">BANCO</div>
            </div>
            <div style="background: #fff; padding: 28px 24px 18px 24px;">
                <div class="mb-2 login-welcome">¿Olvidaste tu contraseña?</div>
                <div class="mb-4 login-subtext">Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.</div>
                @if (session('status'))
                    <div class="alert alert-success mb-3" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="login-form">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                    <button type="submit" class="login-btn mt-3">Enviar enlace de restablecimiento</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
