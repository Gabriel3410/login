@extends('layouts.app')

@section('content')
  <b>Nome: {{$user->name}}</b> <br>
  <b>Email: {{$user->email}}</b>
@endsection