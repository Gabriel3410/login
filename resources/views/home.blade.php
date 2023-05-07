@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Bem-vindo, {{ auth()->user()->name }}</h1>
</div>

<div class="container">

    
      
<div class="position-relative">
    <div class="row align-items-center">
        <div class="position-absolute top-50 start-50"></div>
        @foreach ($images as $image)
            @if ($image->image_id === auth()->user()->id)
                <div class="col-md-3 mb-3" style="border:none">
                    <div class="card" style="border:none">
                        <div class="img-circle" style="width:100px;height:100px;overflow:hidden;border-radius:50%;margin:0 auto;">
                            <img class="card-img-top" src="{{ url('storage/'.$image->path) }}" alt="{{ $image->fileName }}" style="width:100%;height:auto;border:none;">
                        </div>
                    </div>
                </div>
                            
            @endif    
        @endforeach
    

    @foreach ($users as $item)
        @if ($item->name === auth()->user()->name)
            <div class="d-flex justify-content-center align-items-center ">
                <div class="mx-2 mb-6">
                    <a class="btn btn-primary mx-2 shadow-sm" href="{{ url('/user/'.$item->id.'/edit')}}">Editar Cadastro</a> 
                </div>
                <div class="mx-2 mb-6">    
                    <a class="btn btn-secondary mx-2 shadow-sm" href="{{ url('/contato/create/'. $item->id)}}">Contatos adicionais</a>
                </div>    
            </div>
        @endif
    @endforeach
</div> 
</div>
    @foreach ($users as $item)
        @if ($item->name === auth()->user()->name)
        <div class="container">
            <h2 class="text-center">Meus dados:</h2>
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

 
    
</div>


@endsection