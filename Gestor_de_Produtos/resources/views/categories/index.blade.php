<x-layout title="Listagem de Categorias">
    <h2>Categorias Disponíveis</h2>
    <ul>
        @forelse ($categories as $category)
            <a href="/categories/{{ $category->id }}"><li>{{ $category->name }}</li></a>
        @empty
            <li>Nenhuma categoria encontrada.</li>
        @endforelse
    </ul>
</x-layout>