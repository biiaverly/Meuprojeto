@component('mail::message')
# {{ $nomeSerie }} criada

A série {{ $nomeSerie }} com {{ $temporadaqt }} temporadas e {{ $episodiosqt }} episódios por temporada foi criada.

Acesse aqui:

@component('mail::button', ['url' => route('temporada.index', $series_id)])
    Ver série
@endcomponent

@endcomponent
