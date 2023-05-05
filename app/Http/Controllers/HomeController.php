<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\User;
use App\Models\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contato = Contato::orderBy('id')->get();
        $images = Image::orderBy('image_id')->get();
        $users = User::orderBy('name')->get();
        return view('home', ['contato' =>$contato, 'users' => $users, 'images' => $images]);
    }

    public function show(string $id)
    {
        $contato = Contato::find($id);

        return view('home', ['contato' => $contato]);
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $contato = Contato::find($id);

        return view('home', ['user' => $user, 'contato' => $contato]);
    }
}
