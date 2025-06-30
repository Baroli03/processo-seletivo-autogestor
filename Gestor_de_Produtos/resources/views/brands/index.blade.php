<x-layout title="Listagem de Marcas">
    <div class="list-container">

        <div class="category-list">
            @forelse ($brands as $brand)
                <a href="/brands/{{ $brand->id }}" class="category-item">
                    
                    <div class="category-details">
                        <span class="category-name">{{ $brand->name }}</span>
                        <span class="category-product-count">
                            {{ $brand->products_count }} 
                            {{ Str::plural('produto', $brand->products_count) }}
                        </span>
                    </div>

                    <div class="category-action-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>

                </a>
            @empty
                <div class="empty-list-message">
                    <p>Nenhuma marca encontrada.</p>
                    <p>Clique em "Adicionar Marca" para começar.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>