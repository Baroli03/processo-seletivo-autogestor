@props(['title'])

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} - Gestor de Produto</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <header>
        <nav>
            <ul>
                <a href="/"><li>Produtos</li></a>
                <a href="/brands"><li>Marcas</li></a>
                <a href="/categories"><li>Categorias</li></a>
                <a href="https://autogestor.net/contato/"><li>Fale Conosco</li><span></span></a>

                @auth
                    <a href="{{ route('dashboard') }}"><li>Meu Dashboard</li></a>

                    @if (Auth::user()->is_admin)
                        <a href="{{ route('admin.manage_users') }}"><li>Gerenciar Usuários (Admin)</li></a>
                    @else
                        @if (Auth::user()->can_manage_products)
                            <a href="{{ route('management.products') }}"><li>Gestão de Produtos</li></a>
                        @endif
                        @if (Auth::user()->can_manage_categories)
                            <a href="{{ route('management.categories') }}"><li>Gestão de Categorias</li></a>
                        @endif
                        @if (Auth::user()->can_manage_brands)
                            <a href="{{ route('management.brands') }}"><li>Gestão de Marcas</li></a>
                        @endif
                    @endif

                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: inherit; font: inherit; cursor: pointer; padding: 0;">Sair</button>
                        </form>
                    </li>
                @else 
                    <a href="{{ route('login') }}"><li>Fazer Login</li></a>
                    <a href="{{ route('register') }}"><li>Registrar</li></a>
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