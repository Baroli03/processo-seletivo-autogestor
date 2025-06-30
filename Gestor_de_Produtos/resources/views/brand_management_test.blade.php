<x-layout title="Consulta de Marcas">

    <div class="page-container">

        <div class="page-header">
            <h2>Consulta de Marcas</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>

        <div class="table-container">
            <table class="management-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Marca</th>
                        <th>Nº de Produtos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->products_count }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="empty-table-message">
                                Nenhuma marca encontrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>