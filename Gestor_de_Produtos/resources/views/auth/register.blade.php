<x-layout title="Registrar">
    <div class="login-container">
        <div class="login-card">
            <h2>Criar Nova Conta</h2>
            <p class="login-subtitle">Preencha os campos abaixo para se registrar.</p>

            @if ($errors->any())
                <div class="form-errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="login-form">
                @csrf

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>

            <p class="register-link">
                Já tem conta? <a href="{{ route('login') }}">Faça login aqui</a>
            </p>
        </div>
    </div>
</x-layout>