<x-layout title="Meu Dashboard">
    <div class="page-container">

        <div class="page-header">
            <h2>Bem-vindo, {{ Auth::user()->name }}!</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout">Sair &rarr;</button>
            </form>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="dashboard-card">
            @if (Auth::user()->is_admin)
                <h3 class="card-title">Painel do Administrador</h3>
                <p>Sua função principal é o gerenciamento de usuários e suas permissões.</p>
                <div class="permission-links-grid">
                    <a href="{{ route('admin.manage_users') }}" class="permission-card">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Gerenciar Usuários</span>
                    </a>
                </div>
            @else
                <h3 class="card-title">Minhas Permissões de Gestão</h3>
                <p>Acesse as áreas de gestão para as quais você tem permissão.</p>
                <div class="permission-links-grid">
                    
                    @if (Auth::user()->can_manage_products)
                        <a href="{{ route('management.products') }}" class="permission-card">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 15h1.5a2.5 2.5 0 0 1 0 5H4"></path><path d="M19.5 15H18a2.5 2.5 0 0 0 0 5h1.5"></path><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                            <span>Gestão de Produtos</span>
                        </a>
                    @endif
                    
                    @if (Auth::user()->can_manage_categories)
                        <a href="{{ route('management.categories') }}" class="permission-card">
                           <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            <span>Gestão de Categorias</span>
                        </a>
                    @endif

                    @if (Auth::user()->can_manage_brands)
                        <a href="{{ route('management.brands') }}" class="permission-card">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10h-2.52a1 1 0 0 0-.95.69l-1.4 3.51a1 1 0 0 1-.95.69H8.82a1 1 0 0 1-.95-.69L6.47 10.7a1 1 0 0 0-.95-.69H3"></path></svg>
                            <span>Gestão de Marcas</span>
                        </a>
                    @endif

                    @if (!Auth::user()->is_admin && !Auth::user()->can_manage_products && !Auth::user()->can_manage_categories && !Auth::user()->can_manage_brands)
                        <div class="no-permissions-message">
                            <p>Você não possui permissões de gestão específicas.</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-layout>