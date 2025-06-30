<x-layout title="Dashboard Admin">
    <h2>Bem-vindo ao Dashboard do Administrador, {{ Auth::user()->name }}!</h2>

    <p>Esta é a área restrita para administradores. Aqui você pode gerenciar todas as funcionalidades do sistema.</p>

    <div>
        <h3>Opções de Administração:</h3>
        <ul>
            <li><a href='/admin/manage-users'>Gerenciar Usuários</a></li>
            <li><a href='/admin/manage-permissions'>Gerenciar Produtos</a></li>
        </ul>
        <p><small>Lembre-se de criar as rotas e controladores para estas funcionalidades!</small></p>
    </div>

    <div>
        <a href="{{ route('dashboard') }}">Voltar para Meu Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout">Sair</button>
        </form>
    </div>
</x-layout>
