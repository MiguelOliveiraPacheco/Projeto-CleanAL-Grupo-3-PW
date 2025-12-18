{{-- resources/views/livewire/auth-login.blade.php --}}
<div>
    <form wire:submit.prevent="login">
        @if($error)
            <div style="color: red; margin-bottom: 15px; padding: 10px; background: #ffe6e6; border-radius: 5px;">
                {{ $error }}
            </div>
        @endif

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
            <input
                type="email"
                id="email"
                wire:model="email"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"
                required
                placeholder="exemplo@email.com"
            >
            @error('email')
            <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"
                required
                placeholder="Introduza a sua password"
            >
            @error('password')
            <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" wire:model="remember">
                <span>Lembrar-me</span>
            </label>
        </div>

        <button
            type="submit"
            style="width: 100%; padding: 12px; background: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;"
        >
            🔐 Entrar
        </button>

        <div style="margin-top: 15px; text-align: center;">
            <a href="{{ route('registo') }}" style="color: #28a745; text-decoration: none;">
                Não tem conta? Registe-se →
            </a>
        </div>
    </form>
</div>
