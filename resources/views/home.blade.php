@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Bem-vindo, {{ auth()->user()->name }}</h1>
</div>

<div class="container">

    
      
   
    <div class="row">
        @foreach ($images as $image)
            @if ($image === auth()->user()->image_id)
                <div class="col-md-3 mb-3">
                    <div class="card" style="border:none">
                        <div class="img-circle">
                            <img class="card-img-top rounded-circle" src="{{url('storage/'. $image->path)}}" alt="{{ $image->fileName}}" style="width: 300px; height: 300px;">
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-3 mb-3">
                <div class="card" style="border:none">
                    <div class="img-circle">
                        <img class="card-img-top rounded-circle" src="{{url('storage/'. $image->path)}}" alt="{{ $image->fileName}}" style="width: 300px; height: 300px;">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    

    @foreach ($users as $item)
        @if ($item->name === auth()->user()->name)
        <div class="container">
            <h2 class="text-center">Meus dados:</h2>
            <p class="text-center">Aqui estão as informações do meu usuário:</p>
            <ul class="list-group d-flex justify-content-center">
                <li class="list-group-item text-center"><b>{{ $item->name }}</b></li>
                <li class="list-group-item text-center"><b>{{ $item->email }}</b></li> 
                <h2 class="text-center">Dados adicionais:</h2>
                @foreach ($contato as $item)
                    @if ($item->user_id === auth()->user()->id)
                       <li class="list-group-item text-center"><b>{{ $item->cpf }}</b></li>
                       <li class="list-group-item text-center"><b>{{ $item->cel }}</b></li>
                    @endif
                @endforeach
            </ul>        
        </div>        
        @endif   
    @endforeach

    @foreach ($users as $item)
        @if ($item->name === auth()->user()->name)
            <div class="d-flex justify-content-center mt-4">
                <a class="btn btn-primary mx-2 shadow-sm" href="{{ url('/user/'.$item->id.'/edit')}}">Editar Cadastro</a> 
                <a class="btn btn-secondary mx-2 shadow-sm" href="{{ url('/contato/create/'. $item->id)}}">Manter cadastro</a>
            </div>
        @endif
    @endforeach
    
</div>


@endsection