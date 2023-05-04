<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function form_image()
    {
        //dd('teste');
        return view('upload/fomr_image');
    }
}
