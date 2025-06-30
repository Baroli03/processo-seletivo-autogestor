<x-layout :title="'Produtos da marca: ' . $brand->name">

    <h2>Você está vendo os produtos da marca: <strong>{{ $brand->name }}</strong></h2>
    <hr>
    <a href="{{ route('brands.index') }}">&larr; Voltar para todas as marcas</a>

    <div>
        @forelse ($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
                </div>
                <div class="product-details">
                    <h4>{{ $product->name }}</h4>
                    <p><small>Marca: {{ $product->category->name }}</small></p>
                    <p><strong>R$ {{ number_format($product->price, 2, ',', '.') }}</strong></p>
                </div>
            </div>
        @empty
            <p>Nenhum produto encontrado nesta categoria.</p>
        @endforelse
    </div>

</x-layout>