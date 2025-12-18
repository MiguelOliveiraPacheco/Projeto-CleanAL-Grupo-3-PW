{{-- resources/views/livewire/auth-register.blade.php --}}
<div>
    @if($success)
        <div style="color: green; padding: 15px; background: #e6ffe6; margin-bottom: 20px; border-radius: 5px;">
            ✅ Conta criada com sucesso! Redirecionando para login...
        </div>

        <script>
            setTimeout(() => {
                window.location.href = '/login';
            }, 2000);
        </script>
    @else
        <form wire:submit.prevent="register">
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Nome Completo</label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"
                    required
                    placeholder="João Silva"
                >
                @error('name')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

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
                    placeholder="Mínimo 6 caracteres"
                >
                @error('password')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Confirmar Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    wire:model="password_confirmation"
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"
                    required
                    placeholder="Repita a password"
                >
            </div>

            <button
                type="submit"
                style="width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;"
            >
                📝 Criar Conta
            </button>

            <div style="margin-top: 15px; text-align: center;">
                <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;">
                    ← Já tem conta? Faça login
                </a>
            </div>
        </form>
    @endif
</div>
