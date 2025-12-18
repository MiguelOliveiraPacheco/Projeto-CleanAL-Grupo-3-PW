{{-- resources/views/auth/login.blade.php --}}
    <!DOCTYPE html>
<html>
<head>
    <title>Login - CleanAL</title>
    @livewireStyles
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <div class="logo">🧹 CleanAL</div>
    <h2>Iniciar Sessão</h2>
    <livewire:auth-login />
</div>

@livewireScripts
</body>
</html>
