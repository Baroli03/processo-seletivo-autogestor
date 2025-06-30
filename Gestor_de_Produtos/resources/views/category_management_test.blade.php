<x-layout title="Gestão de Categorias">

    <div class="page-container">

        <div class="page-header">
            <h2>Gestão de Categorias</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>

        <div class="table-container">
            <table class="management-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Categoria</th>
                        <th>Nº de Produtos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products_count }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="empty-table-message">
                                Nenhuma categoria encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>