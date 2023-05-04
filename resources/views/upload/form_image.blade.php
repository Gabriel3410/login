<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fotos</title>
</head>
<body>

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
</body>
</html>