@extends('layouts.app')

@section('content')
  <b>Nome: 
    @foreach ($users as $item)
      {{$item->name}}
    @endforeach 
  </b> 
  <br> <b>CPF: {{ $contato->cpf }}</b> <br>
  <b>cel: {{$contato->cel}}</b>
@endsection