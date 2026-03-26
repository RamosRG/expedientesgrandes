<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --vino-oscuro: #5a0a1a;
            --vino-medio: #8a2a3a;
            --vino-claro: #a03a4a;
            --vino-suave: #b04a5a;
            --vino-palido: #f8f0f2;
            --crema: #f9f5f0;
            --oro: #d4af37;
            --oro-oscuro: #b8941f;
            --texto-oscuro: #2c1810;
            --texto-medio: #5a4a42;
            --sombra-suave: rgba(90, 10, 26, 0.08);
            --sombra-media: rgba(90, 10, 26, 0.15);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--vino-oscuro) 0%, var(--vino-medio) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 450px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
        }

        .login-header {
            background: linear-gradient(135deg, var(--vino-oscuro) 0%, var(--vino-medio) 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.1;
            z-index: 0;
        }

        .login-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .login-header p {
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .login-body {
            padding: 40px 30px;
            background: white;
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--texto-oscuro);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--vino-medio);
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e1d5d8;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--vino-medio);
            box-shadow: 0 0 0 4px rgba(138, 42, 58, 0.1);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--texto-medio);
            font-size: 1.2rem;
        }

        .toggle-password:hover {
            color: var(--vino-medio);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--texto-medio);
        }

        .checkbox-label input {
            width: 18px;
            height: 18px;
            accent-color: var(--vino-medio);
        }

        .forgot-link {
            color: var(--vino-medio);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--vino-oscuro);
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--vino-medio) 0%, var(--vino-oscuro) 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px var(--sombra-media);
        }

        .btn-login i {
            font-size: 1.2rem;
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 2px solid var(--vino-palido);
        }

        .login-footer p {
            color: var(--texto-medio);
            font-size: 0.9rem;
        }

        .login-footer a {
            color: var(--vino-medio);
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            color: var(--vino-oscuro);
            text-decoration: underline;
        }

        .remember-email {
            background-color: var(--vino-palido);
            padding: 8px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: var(--texto-oscuro);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .remember-email button {
            background: none;
            border: none;
            color: var(--vino-medio);
            cursor: pointer;
            font-weight: 600;
        }

        .remember-email button:hover {
            color: var(--vino-oscuro);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Sistema de Gestión</h1>
            <p>Inicia sesión para acceder al portal</p>
        </div>

        <div class="login-body">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>

            <?php
            // CORREGIDO: Usar la variable pasada desde el controlador
            $remember_email = $remember_email ?? '';
            ?>

            <form action="<?= site_url('login/auth') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               placeholder="correo@ejemplo.com"
                               value="<?= old('email', $remember_email) ?>"
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-wrapper password-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="••••••••"
                               required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" value="1" <?= $remember_email ? 'checked' : '' ?>>
                        <span>Recordar mi correo</span>
                    </label>
                    <a href="<?= site_url('login/olvide') ?>" class="forgot-link">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Iniciar Sesión
                </button>
            </form>

            <div class="login-footer">
                <p>Sistema de Gestión de Procesos &copy; <?= date('Y') ?></p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>