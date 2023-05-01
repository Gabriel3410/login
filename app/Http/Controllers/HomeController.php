<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\User;



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
        $contato = Contato::orderBy('cpf')->get();
        $user = User::orderBy('name')->get();
        return view('home', ['contato' =>$contato, 'user' => $user]);
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
