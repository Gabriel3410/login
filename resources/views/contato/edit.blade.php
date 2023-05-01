@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <form action="{{ url('/contato/'.$contato->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label class="form-label" for="user_id">Usuário:</label>
            <input class="form-control" type="text" name="user_id" id="id" value="{{$contato->id}}"> 
            <br>             
            <label class="form-label" for="cpf">Cpf:</label>
            <input class="form-control" type="text" id="cpf" placeholder="999.999.999-99" value="{{$contato->cpf}} ">
            <br> <br>
            <label class="form-label" for="cel">Cel:</label>
            <input class="form-control" type="text" id="cel" placeholder="(99) 99999-9999" value="{{$contato->cel}}">

            <input type="submit" class="btn btn-primary btn-lg btn-block mt-2" value="Enviar">
        </form>
      </div>
    </div>
</div>
@endsection
