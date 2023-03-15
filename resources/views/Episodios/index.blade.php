<x-layout title="Episodios Bia">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($temporada->episodios as $episodios)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episodio {{ $episodios->numero }}  
                <input type="checkbox"
                name="episodios[]"
                value="{{ $episodios->id }}"
                @if ($episodios->assistido) checked @endif />        
            </li>
            @endforeach
            
        </ul>
        <button class="btn btn-primary btn-sm mb-2 mt-2">Salvar</button>

        <a href="{{route('home')}}" class="btn btn-danger btn-sm mb-2 mt-2" >
            Home
            </a>    </form>

</x-layout>
