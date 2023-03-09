<x-layout title="Serie Modificada ">
  <x-form action="{{route('update',$seria->id)}}" :serie="$seria->nomeSerie" botao="Atualizar"/>
</x-layout>

