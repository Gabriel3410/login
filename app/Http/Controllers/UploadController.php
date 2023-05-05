<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class UploadController extends Controller
{
    public function form_image($id)
    {

        $images = Image::where('image_id', $id)->get();
        return view('upload/form_image', ['images' => $images, 'image_id' => $id]);
    }

    public function upload_image(Request $request)
    {
        if ($request->hasFile('image')) {
            
            // verifica se a imagem foi enviada
            $imageFileName = $request->file('image')->getClientOriginalName();

            //armazena a imagem

            $path = $request->file('image')->store('public/images');

            // inserir no banco de dados

            $image = new Image;
            $image -> image_id = $request-> image_id;
            $image->fileName = $imageFileName;
            $image->path = str_replace('public/', '' , $path);
            $image->save();

            return redirect('/contato/create/{id}')->with('success', 'Imagem enviada com sucesso!');
        }

            return redirect()->back()->with('error', ' Nenhuma imagem enviada!');

    }
}
