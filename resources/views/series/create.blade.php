<x-layout title="Nova Série">
    <form action="salvar" method="post">
        @csrf
        <div class="mb-3">
            <label for="nomeSerie" class="form-label">Nome:</label>
            <input type="text" id="nomeSerie" name="nomeSerie" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
