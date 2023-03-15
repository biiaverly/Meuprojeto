<x-layout title="Episodios Bia">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($temporada->episodios as $episodios)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episodio {{ $episodios->numero }}  
                <input type="checkbox"
                name="episodes[]"
                value="{{ $episodios->id }}"
                @if ($episodios->watched) checked @endif />        
            </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>
