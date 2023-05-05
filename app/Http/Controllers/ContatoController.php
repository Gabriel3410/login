<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\User;
use App\Models\Image;


class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = User::orderBy('name')->get();
     //   dd($users);
        $contato = Contato::orderBy('cpf')->get();
        return view('contato.index', ['contato' => $contato, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contato = Contato::orderBy('user_id')->get();
        $images = Image::orderBy('image_id')->get();
        $users = User::orderBy('name')->get();
        return view('contato.create', ['users' => $users, 'images' => $images, 'contato' => $contato]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $validated = $request->validate([
            'user_id' => 'required',
            'image_id' =>'required',
            'cpf' => 'required|string|cpf',
            'cel' => 'required|celular-com-ddd'
        ]);
        
        $contatoExist = Contato::where('user_id', $request->user_id)->exists();
        //dd($contatoExist);

        if($contatoExist)
        {
            $contato = Contato::where('user_id', $request->user_id)->first();
            $contato->image_id  = $request->image_id;
            $contato->user_id   = $request->user_id;
            $contato->cpf       = $request->cpf;
            $contato->cel       = $request->cel;
            $contato->save();
            
            return redirect('/')->with('status', 'Alteredo com sucesso');
        }else{

            $contato = new Contato;
            $contato->image_id  = $request->image_id;
            $contato->user_id   = $request->user_id;
            $contato->cpf       = $request->cpf;
            $contato->cel       = $request->cel;
            $contato->save();

            return redirect('/')->with('status', 'inserido com sucesso');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contato = Contato::find($id);
        $users = User::orderBy('name')->get();
        return view('contato.show', ['contato' => $contato, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::orderBy('name')->get();
        $contato = Contato::find($id);
        
        return view('contato.edit', ['contato'=> $contato,'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'image_id' => 'required',
            'user_id' => 'required',
            'cpf' => 'required',
            'cel' => 'required',
        ]);

        $contato = Contato::findOrFail($id);
        $contato->image_id = $request->image_id;
        $contato->user_id = $request->user_id;
        $contato->cpf = $request->cpf;
        $contato->cel = $request->cel;
        $contato->save();

        return redirect('/')->with('status', 'Alterado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = Contato::find($id);
        $contato->delete();

        return redirect('home')->with('status', 'Excluido com sucesso');
    }
}
