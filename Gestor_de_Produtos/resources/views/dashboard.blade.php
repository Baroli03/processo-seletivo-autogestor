<x-layout title="Meu Dashboard">
    <h2>Bem-vindo ao seu Dashboard, {{ Auth::user()->name }}!</h2>

    <p>Esta é a sua área pessoal. Aqui você pode encontrar informações relevantes para o seu perfil de usuário.</p>

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <div>
        @if (Auth::user()->is_admin)
            <p>Você é um **administrador**!</p>
            <ul>
                <li>Sua única função é: <a href="{{ route('admin.manage_users') }}">Gerenciar Usuários</a>.</li>
            </ul>
        @else
            <p>Você tem acesso de **usuário normal**.</p>
            <h3>Minhas Permissões de Gestão:</h3>
            <ul>
                @if (Auth::user()->can_manage_products)
                    <li><a href="{{ route('management.products') }}">Gestão de Produtos</a></li>
                @endif
                
                @if (Auth::user()->can_manage_categories)
                    <li><a href="{{ route('management.categories') }}">Gestão de Categorias</a></li>
                @endif

                @if (Auth::user()->can_manage_brands)
                    <li><a href="{{ route('management.brands') }}">Gestão de Marcas</a></li>
                @endif

                @if (!Auth::user()->can_manage_products && !Auth::user()->can_manage_categories && !Auth::user()->can_manage_brands)
                    <li>Você não possui permissões de gestão específicas.</li>
                @endif
            </ul>
        @endif
    </div>

    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>
</x-layout>