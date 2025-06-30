<x-layout title="Listagem de Categorias">
    <div class="list-container">
        

        <div class="category-list">
            @forelse ($categories as $category)
                <a href="/categories/{{ $category->id }}" class="category-item">
                    
                    <div class="category-details">
                        <span class="category-name">{{ $category->name }}</span>
                        <span class="category-product-count">
                            {{ $category->products_count }} 
                            {{ Str::plural('produto', $category->products_count) }}
                        </span>
                    </div>

                    <div class="category-action-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>

                </a>
            @empty
                <div class="empty-list-message">
                    <p>Nenhuma categoria encontrada.</p>
                    <p>Clique em "Adicionar Categoria" para começar.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>