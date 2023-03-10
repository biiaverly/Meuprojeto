<x-layout title="Serie '{{$seria->nomeSerie }}' Modificada  ">
  <x-form action="{{route('update',$seria->id)}}" :serie="$seria->nomeSerie" botao="Atualizar"/>
</x-layout>

