@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo, {{auth()->user()->name}}</h1>
</div>
<div class="container">
    
        
    
    @foreach ($users as $item)
        @if ($item->name === auth()->user()->name)
            <a class="btn btn-warning m-2" href="{{ url('/user/'.$item->id.'/edit')}}">Editar Cadastro</a> 
            <a class="btn btn-warning m-2" href="{{url('/contato/create')}}">Informações adicionais</a>
            <a class="btn btn-warning m-2" href="{{url('/contato/'.$item->id.'/edit' )}}">Editar Informações</a> <br>
        @else

        @endif
    @endforeach

</div>
@endsection
