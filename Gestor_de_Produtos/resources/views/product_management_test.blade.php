<x-layout title="Gestão de Produtos">

    <div class="page-container">

        <div class="page-header">
            <h2>Gestão de Produtos</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>

        <div class="table-container">
            <table class="management-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-table-message">
                                Nenhum produto encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>