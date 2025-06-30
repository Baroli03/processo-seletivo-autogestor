<x-layout title="Produtos">
    

    @forelse ($products as $product)
    <div class="product-card">
        <div class="product-image">
            <div class="product-image">
                @if ($product->image_path)
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
                @else
                    <div style="width: 200px; height: 150px; background: #f0f0f0; display: grid; place-content: center;">
                        <small>Sem Imagem</small>
                    </div>
                @endif
        </div>
        <div class="product-details">
            <table>
                <thead>
                    <tr>
                        <td>
                            <strong>{{ $product->name}}</strong>
                        </td>
                    </tr>
                </thead>
               <tbody>
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Categoria:</strong></td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Preço:</strong></td>
                            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    @empty
        <p>Nenhum produto encontrado.</p>
    @endforelse

</x-layout>