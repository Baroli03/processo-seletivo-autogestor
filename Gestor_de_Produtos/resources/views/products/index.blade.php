<x-layout title="Produtos">
    
    <div class="page-container">

        <div class="page-header">
            <h2>Produtos</h2>
        </div>

        <div class="product-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if ($product->image_path)
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
                        @else
                            <div class="image-placeholder"><span>Sem Imagem</span></div>
                        @endif
                    </div>
                    <div class="product-details">
                        <h4 class="product-name">{{ $product->name}}</h4>
                        <p class="product-brand"><strong>Marca:</strong> {{ $product->brand->name }}</p>
                        <p class="product-brand"><strong>Categoria:</strong> {{ $product->category->name }}</p>
                        <p class="product-price">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                </div>
            @empty
                <div class="empty-list-message" style="grid-column: 1 / -1;">
                    <p>Nenhum produto encontrado.</p>
                </div>
            @endforelse
        </div>

    </div>

</x-layout>