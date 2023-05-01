@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <h1>Categorias</h1>

    <a href="{{ url('user/create') }}" class="btn btn-primary mb-2">Inserir user</a>
    
    <table class="table table-striped table-light">
        <tr>
            <th>Nome:</th>
            <th>Visualizar</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        @foreach ($user as $item) 
        <tr>  
            <td>{{$item->name}}</td> 
            <td><a class="btn btn-primary" href="{{url('user/'. $item->id)}}"> Visualizar</a></td>
            <td><a class="btn btn-warning" href="{{ url('user/'. $item->id . '/edit')}}">Editar</a></td>
            <td>
                <form action="{{url('user/'.$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir" class="btn btn-danger">
                </form>   
            </td>
            @endforeach
        </tr>
    </table>
@endsection