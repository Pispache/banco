<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
        .login-form input[type="email"],
        .login-form input[type="password"],
        .login-form input[type="text"],
        .login-form input[type="date"] {
            border: 1.5px solid #dadada;
            border-radius: 24px;
            background: #fff;
            box-shadow: none;
            font-size: 1rem;
            padding: 10px 18px;
            height: 44px;
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
        .register-link {
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
        .register-link:hover {
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
            <div class="login-header">
                <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#fff"/><path d="M24 13l6 6h-4v6h-4v-6h-4l6-6z" fill="#6c47ff"/></svg>
                <div class="login-title">BANCO</div>
            </div>
            <div style="background: #fff; padding: 28px 24px 18px 24px;">
                <div class="mb-2 login-welcome">¡Crea tu cuenta!</div>
                <div class="mb-4 login-subtext">Completa los datos para registrarte</div>
                <form method="POST" action="{{ route('register') }}" class="login-form">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <!-- DPI -->
                    <div>
                        <x-input-label for="dpi" :value="__('DPI')" />
                        <x-text-input id="dpi" class="block w-full" type="text" name="dpi" :value="old('dpi')" required maxlength="13" minlength="13" />
                        <x-input-error :messages="$errors->get('dpi')" />
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                        <x-text-input id="fecha_nacimiento" class="block w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
                        <x-input-error :messages="$errors->get('fecha_nacimiento')" />
                    </div>

                    <!-- Dirección -->
                    <div>
                        <x-input-label for="direccion" :value="__('Dirección')" />
                        <x-text-input id="direccion" class="block w-full" type="text" name="direccion" :value="old('direccion')" required maxlength="255" />
                        <x-input-error :messages="$errors->get('direccion')" />
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <x-input-label for="telefono" :value="__('Teléfono')" />
                        <x-text-input id="telefono" class="block w-full" type="text" name="telefono" :value="old('telefono')" required maxlength="15" />
                        <x-input-error :messages="$errors->get('telefono')" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" />
                    </div>

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-2">
                        <a href="{{ route('login') }}" class="register-link">Inicia sesión</a>
                        <button type="submit" class="login-btn">Registrarme</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
