@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
            <form action="{{url('contato/create')}}" method="post">
              @csrf
              <label class="form-label" for="user_id">Usuário:

                @foreach ($users as $item)
                  @if ($item->name === auth()->user()->name)
                      <input type="hidden" name="user_id" value="{{ $item->id}}">
                      {{$item->name}}
                  @endif             
                @endforeach

              </label>
              <br> 
              <label for="cpf" class="form-label">Cpf:</label>
              <input type="text" id="cpf" name="cpf" value="
              
                @if(isset(auth()->user()->contato->cpf))
                  {{ auth()->user()->contato->cpf }}
                @endif
                              
                " class="form-control" placeholder="999.999.999-99">
              <br> <br>
              <label for="cel" class="form-label">Cel:</label>
              <input type="text" id="cel" name="cel" value="
                @if(isset(auth()->user()->contato->cel))
                  {{ auth()->user()->contato->cel }}
                @endif
                            
                "class="form-control" placeholder="(99) 99999-9999">
          
              <input type="submit" class="btn btn-primary btn-lg btn-block mt-2" value="Enviar">
              <br> <br>
            </form>
      </div>
    </div>
</div>
@endsection
