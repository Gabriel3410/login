@extends('layouts.app')

@section('content')
    <form action="{{route('upload_image')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image">
        <button type="submit">Enviar</button>
    </form>

    @if ($images)
        @foreach ($images as $image)
            <img src="{{ url('storage/' . $image->path) }}" alt="{{$image->fileName}}"> <br>
        @endforeach        
    @endif

@endsection