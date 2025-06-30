<x-layout :title="'Produtos da Categoria: ' . $category->name">

    <div class="page-container">

        <div class="page-header">
            <h2>{{ $category->name }}</h2>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                &larr; Voltar para Categorias
            </a>
        </div>

        <div class="product-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if($product->image_path)
                            <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
                        @else
                            <div class="image-placeholder"><span>Sem Imagem</span></div>
                        @endif
                    </div>
                    <div class="product-details">
                        <p class="product-brand"><small>{{ $product->brand->name }}</small></p>
                        <h4 class="product-name">{{ $product->name }}</h4>
                        <p class="product-price">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                </div>
            @empty
                <div class="empty-list-message" style="grid-column: 1 / -1;">
                    <p>Nenhum produto encontrado nesta categoria.</p>
                </div>
            @endforelse
        </div>

    </div>

</x-layout>