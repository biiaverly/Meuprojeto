<x-layout title="Séries">
  
  @auth
  <a href="{{route('criar')}}" class="btn btn-dark mb-2">Adicionar</a>
  @endauth

  @isset($mensagemSucesso)
  <div class="alert alert-success">
      {{ $mensagemSucesso }}
  </div>
  @endisset   

  <ul class="list-group">
      @foreach ($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">

            
        @auth  <a href="{{ route('temporada.index', $serie->id) }}">@endauth
            {{ $serie->nomeSerie }}
            @auth</a> @endauth
       
         
        <span class="d-flex">
          @auth            
          <a href="{{route('modificar',$serie->id)}}" class="btn btn-primary btn-sm mb-2 mt-1" >
            Editar
          </a>
          @endauth
          <form action="{{ route('destroy', $serie->id) }}" method="post">
            @csrf
            @auth              
            <button class="btn btn-danger btn-sm mb-2 mt-1">
              Excluir
            </button>
            @endauth
          </form>
        </li>
      </span>
      @endforeach
  </ul>
</x-layout>
