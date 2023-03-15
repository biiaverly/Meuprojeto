<x-layout title="Episodios Bia">
    <ul class="list-group">
        @foreach ($temporada->episodios as $episodios)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episodio {{ $episodios->numero }}          
            </li>
        @endforeach
    </ul>
</x-layout>
