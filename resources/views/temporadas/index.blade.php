<x-layout title="Temporadas de {{ $serie->nomeSerie }}">
    <ul class="list-group">
        @foreach ($serie->temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                    Temporada {{ $temporada->numerotemp }}               

                <span class="badge bg-secondary">
                    {{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>