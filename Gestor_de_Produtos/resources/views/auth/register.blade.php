<x-layout title="Registrar">
    <div> 
        <h2>Registrar Nova Conta</h2>

        @if ($errors->any())
            <div> 
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div> 
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div> 
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div> 
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div> 
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Registrar</button>
        </form>

        <p>Já tem conta? <a href="{{ route('login') }}">Faça login aqui</a></p>
    </div>
</x-layout>