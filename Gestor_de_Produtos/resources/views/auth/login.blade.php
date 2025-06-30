<x-layout title="Login">
    <div> 
        <h2>Fazer Login</h2>

        @if ($errors->any())
            <div> 
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div> 
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div> 
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div> 
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Lembrar-me</label>
            </div>
            <button type="submit">Entrar</button>
        </form>

        <p>Não tem conta? <a href="{{ route('register') }}">Registre-se aqui</a></p>
    </div>
</x-layout>