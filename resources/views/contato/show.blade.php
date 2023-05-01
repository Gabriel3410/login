@extends('layouts.app')

@section('content')
  <b>Nome: {{$contato->user->name}}</b>
  <b>CPF: {{ $contato->cpf }}</b> <br>
  <b>cel: {{$contato->cel}}</b>
@endsection