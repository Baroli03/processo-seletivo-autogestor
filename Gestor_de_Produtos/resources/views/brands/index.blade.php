<x-layout title="Listagem de Marcas">
    <h2>Marcas Disponíveis</h2>
    <ul>
        @forelse ($brands as $brand)
            <a href="/brands/{{ $brand->id }}"><li>{{ $brand->name }}</li></a>
        @empty
            <li>Nenhuma marca encontrada.</li>
        @endforelse
    </ul>
</x-layout>