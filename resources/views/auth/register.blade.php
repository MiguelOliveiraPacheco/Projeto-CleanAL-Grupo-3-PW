{{-- resources/views/auth/register.blade.php --}}
    <!DOCTYPE html>
<html>
<head>
    <title>Registo - CleanAL</title>
    @livewireStyles
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
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
            color: #f5576c;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="register-box">
    <div class="logo">🧹 CleanAL</div>
    <h2>Criar Nova Conta</h2>
    <livewire:auth-register />
</div>

@livewireScripts
</body>
</html>
