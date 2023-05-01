@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <form action="{{url('user/create')}}" method="get">
            @csrf

            <label for="name">Nome:</label>
            <input type="text" id="name">
            <br> <br>
            <label for="email">Cel:</label>
            <input type="email" id="email" placeholder="exemplo@email.com">
            <br>
            <label for="password">Senha:</label>
            <input type="password" id="password">
            <br>
            <input type="submit" value="Enviar">
            <br> <br>
        </form>

      </div>
    </div>
</div>
@endsection
