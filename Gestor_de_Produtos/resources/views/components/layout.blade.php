@props(['title'])

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} - Gestor de Produto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul class="rubik">
                <div class="nav_item">
                    <li><a href="/">Produtos</a></li>
                    <li><a href="/brands">Marcas</a></li>
                    <li><a href="/categories">Categorias</a></li>
                    <li><a href="https://autogestor.net/contato/">Fale Conosco<span></span></a></li>
                </div>

                @auth
                    <div class="login-box">
                        <li><a href="{{ route('dashboard') }}">Meu Dashboard</a></li>

                        @if (Auth::user()->is_admin)
                            <li><a href="{{ route('admin.manage_users') }}">Gerenciar Usuários (Admin)</a></li>
                        @else
                            @if (Auth::user()->can_manage_products)
                                <li><a href="{{ route('management.products') }}">Gestão de Produtos</a></li>
                            @endif
                            @if (Auth::user()->can_manage_categories)
                                <li><a href="{{ route('management.categories') }}">Gestão de Categorias</a></li>
                            @endif
                            @if (Auth::user()->can_manage_brands)
                                <li><a href="{{ route('management.brands') }}">Gestão de Marcas</a></li>
                            @endif
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-logout">Sair</button>
                            </form>
                        </li>
                    </div>
                @else
                    <div class="login-box">
                        <li><a href="{{ route('login') }}">Fazer Login</a></li>
                        <li><a href="{{ route('register') }}" class="button">Registrar</a></li>
                    </div>
                @endauth
            </ul>
        </nav>
    </header>
    <main>
        <h1>{{$title}}</h1>
        {{ $slot }}
    </main>
    <footer>
    </footer>
</body>
</html>