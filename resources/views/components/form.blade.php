    <form action="{{$action}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nomeSerie" class="form-label">Nome:</label>
            <input type="text" value="{{$serie??''}}" id="nomeSerie" name="nomeSerie" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{$botao}}</button>
    </form>
