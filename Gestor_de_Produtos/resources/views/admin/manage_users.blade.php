<x-layout title="Gerenciar Usuários (Admin)">
    <div class="page-container">

        {{-- Cabeçalho da página --}}
        <div class="page-header">
            <h2>Gerenciamento de Usuários</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>

        {{-- Alertas de Sucesso e Erro --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-container">
            <table class="management-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th class="text-center">Admin?</th>
                        <th class="text-center">Produtos?</th>
                        <th class="text-center">Categorias?</th>
                        <th class="text-center">Marcas?</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td class="text-center">
                                <input type="checkbox" form="update-form-{{ $user->id }}" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }} {{ $user->id === Auth::id() ? 'disabled' : '' }}>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" form="update-form-{{ $user->id }}" name="can_manage_products" value="1" {{ $user->can_manage_products ? 'checked' : '' }} {{ $user->is_admin ? 'disabled' : '' }}>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" form="update-form-{{ $user->id }}" name="can_manage_categories" value="1" {{ $user->can_manage_categories ? 'checked' : '' }} {{ $user->is_admin ? 'disabled' : '' }}>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" form="update-form-{{ $user->id }}" name="can_manage_brands" value="1" {{ $user->can_manage_brands ? 'checked' : '' }} {{ $user->is_admin ? 'disabled' : '' }}>
                            </td>
                            
                            <td>
                                <div class="action-buttons">
                                    <form id="update-form-{{ $user->id }}" action="{{ route('admin.update_permission', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-action btn-save">Salvar</button>
                                    </form>

                                    @if ($user->id !== Auth::id())
                                        <form action="{{ route('admin.delete_user', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o usuário {{ $user->name }}? Esta ação é irreversível.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">Excluir</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>