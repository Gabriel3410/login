@extends('layouts.app')

@section('content')


<div class="container mt-5">
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<form action="{{ route('upload_image')}}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf

    <div class="form-group text-center">
        <label for="image">Selecione uma imagem:</label>
        <input type="hidden" name="image_id" value="{{$image_id}}">
        <input type="file" name="image" id="image" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Enviar</button>     
</form>

@if ($images)
<div class="row">
    @foreach ($images as $image)
        <div class="col-md-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{url('storage/'. $image->path)}}" alt="{{ $image->fileName}}">
                <div style="text-align: center; font-size: 19px; font-weight: bold;">
                    <p>{{ $image->fileName}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif
</div>

<!-- Scripts do Bootstrap (jQuery e Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js" integrity="sha384-eNpTuEpD0NhCWfT1QfUX6UoOX+pZSM3p4a4XZs/YsUOW65z+LHG1bLI0HmiyZXvE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection

