<x-layout title="Séries">
  <a href="{{route('criar')}}" class="btn btn-dark mb-2">Adicionar</a>

  @isset($mensagemSucesso)
  <div class="alert alert-success">
      {{ $mensagemSucesso }}
  </div>
  @endisset   

  <ul class="list-group">
      @foreach ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->nomeSerie }}

        <span class="d-flex">
          <a href="{{route('edit',$serie->id)}}" class="btn btn-primary btn-sm">
            E
            </a>
          <form action="{{ route('destroy', $serie->id) }}" method="post">
            @csrf
            <button class="btn btn-danger btn-sm">
              X
            </button>
          </form>
        </li>
      </span>
      @endforeach
  </ul>
</x-layout>
