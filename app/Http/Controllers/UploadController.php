<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class UploadController extends Controller
{
    public function form_image()
    {

        $images = Image::get();
        //dd('teste');
        return view('upload/form_image', ['images' => $images]);
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
            $image->fileName = $imageFileName;
            $image->path = str_replace('public/', '' , $path);
            $image->save();

            return redirect()->back()->with('success', 'Imagem enviada com sucesso!');
        }

        return redirect()->back()->with('error', ' Nenhuma imagem enviada!');

    }
}
