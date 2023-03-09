<x-layout title="Nova Série">
    <h1>Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            {{-- exibição do erro do validate --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <x-series.form :action="route('series.store')" />
</x-layout>
