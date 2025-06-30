<x-layout title="Gerenciar Usuários (Admin)">
    <h2>Gerenciamento de Usuários</h2>
    <p>Você está na tela de gerenciamento de usuários. Como administrador, sua única função é gerenciar as permissões de outros usuários.</p>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Admin?</th>
                <th>Gestão Produtos?</th>
                <th>Gestão Categorias?</th>
                <th>Gestão Marcas?</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    
                    <form action="{{ route('admin.update_permission', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td>
                            <input type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }} {{ $user->id === Auth::id() ? 'disabled' : '' }} onchange="this.form.submit()">
                        </td>
                        <td>
                            <input type="checkbox" name="can_manage_products" value="1" {{ $user->can_manage_products ? 'checked' : '' }} {{ $user->is_admin ? 'disabled' : '' }} onchange="this.form.submit()">
                        </td>
                        <td>
                            <input type="checkbox" name="can_manage_categories" value="1" {{ $user->can_manage_categories ? 'checked' : '' }} {{ $user->is_admin ? 'disabled' : '' }} onchange="this.form.submit()">
                        </td>
                        <td>
                            <input type="checkbox" name="can_manage_brands" value="1" {{ $user->can_manage_brands ? 'checked' : '' }} {{ $user->is_admin ? 'disabled' : '' }} onchange="this.form.submit()">
                        </td>
                    </form>
                    
                    <td>
                        @if ($user->id !== Auth::id())
                            <form action="{{ route('admin.delete_user', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir o usuário {{ $user->name }}? Esta ação é irreversível.');">
                                    Excluir
                                </button>
                            </form>
                        @else
                            <span>(Você)</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="{{ route('dashboard') }}">Voltar para Meu Dashboard</a></p>
</x-layout>