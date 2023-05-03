@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      
      <form action="{{ url('/user/' . $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Nome:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="password">Senha:</label>
          <input type="password" class="form-control" id="password" name="password" value="{{-- $user->password --}}">
        </div>

      <button type="submit" class="btn btn-primary mt-2">Enviar</button>   
      </form>
      <form action="{{url('user/'.$user->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Excluir" class="btn btn-danger mt-2">
    </form>
    </div>
  </div>
</div>
@endsection         
