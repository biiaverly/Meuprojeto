<form action="{{$action}}" method="POST">
    @csrf

    <div class="row mb-2"></div>
        <div class="col-8">
            <label for="nomeSerie" class="form-label">Nome:</label>
            <input type="text" 
            value="{{$serie??''}}" 
            id="nomeSerie" 
            name="nomeSerie" 
            class="form-control">
        </div>

    </div>
<button type="submit" class="btn btn-primary">{{$botao}}</button>
</form>
