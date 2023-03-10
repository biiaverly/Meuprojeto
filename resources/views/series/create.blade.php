<x-layout title="Adicionar nova serie ">
    <form action="{{route('salvar')}}" method="POST">
        @csrf
    
        <div class="row mb-2">
            
            <div class="col-8">
                <label for="nomeSerie" class="form-label">Nome da serie:</label>
                <input type="text" 
                value="{{old('nomeSerie')}}" 
                id="nomeSerie" 
                name="nomeSerie" 
                class="form-control">
            </div>

            <div class="col-2">
                <label for="temporadaqt" class="form-label">N de temporadas:</label>
                <input type="text" 
                value="{{$serie??''}}" 
                id="temporadaqt" 
                name="temporadaqt" 
                class="form-control">
            </div>
            <div class="col-2">
                <label for="episodiosqt" class="form-label">N de episodios:</label>
                <input type="text" 
                value="{{$serie??''}}" 
                id="episodiosqt" 
                name="episodiosqt" 
                class="form-control">
            </div>
    
        </div>
    <button  type="submit" class="btn btn-primary">Adicionar</button>
    </form>
    </x-layout>

