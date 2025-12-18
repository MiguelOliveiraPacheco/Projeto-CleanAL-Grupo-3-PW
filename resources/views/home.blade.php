{{-- resources/views/home.blade.php --}}
    <!DOCTYPE html>
<html>
<head>
    <title>CleanAL - Página Inicial</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .user-info { background: #f0f0f0; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
<h1>CleanAL - Gestão de Limpezas</h1>

{{-- Mostrar info do utilizador se estiver logado --}}
@if($user)
    <div class="user-info">
        <h3>Olá, {{ $user->nome }}!</h3>
        <p>Email: {{ $user->email }}</p>
        <p>Telefone: {{ $user->telefone }}</p>
        <p><a href="{{ url('/logout') }}">Sair</a></p>
    </div>
@else
    <p>Não está autenticado.</p>
    <p>
        <a href="{{ url('/login') }}">Login</a> |
        <a href="{{ url('/registo') }}">Registar</a>
    </p>
@endif

<hr>

<h2>Conteúdo da Página Principal</h2>
<p>Bem-vindo ao sistema de gestão de limpezas.</p>

{{-- Se tiveres links para outras páginas --}}
@if($user)
    <h3>Menu:</h3>
    <ul>
        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('/alojamentos') }}">Alojamentos</a></li>
        <li><a href="{{ url('/limpezas') }}">Limpezas</a></li>
    </ul>
@endif
</body>
</html>
