<x-layout title="login">
    <div class="login-container"> 
        <div class="login-card"> 
            <h2>Fazer Login</h2>
            <p class="login-subtitle">Bem-vindo de volta! Faça o login para continuar.</p>

            @if ($errors->any())
                <div class="form-errors"> 
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="form-group"> 
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group"> 
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-options"> 
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember">Lembrar-me</label>
                    </div>
                    <a href="#" class="forgot-password-link">Esqueceu a senha?</a>
                </div>

                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>

            <p class="register-link">
                Não tem conta? <a href="{{ route('register') }}">Registre-se aqui</a>
            </p>
        </div>
    </div>
</x-layout>