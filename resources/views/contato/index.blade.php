@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <h1>Informações complementares</h1>

    <a href="{{ url('contato/create') }}" class="btn btn-primary mb-2">Inserir</a>
    
    <table class="table table-striped table-light">
        @foreach ($contato as $item) 
        <tr>  
            <td>{{$item->user->name}}</td>
            <td><a class="btn btn-primary" href="{{url('contato/'. $item->id)}}"> Visualizar</a></td>
            <td><a class="btn btn-warning" href="{{ url('contato/'. $item->id . '/edit')}}">Editar</a></td>
            <td>
                <form action="{{url('contato/'.$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir" class="btn btn-danger">
                </form>   
            </td>
            @endforeach
        </tr>
    </table>
@endsection