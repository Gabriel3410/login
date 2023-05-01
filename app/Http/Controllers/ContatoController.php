<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\User;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contato = Contato::orderBy('cpf')->get();
        return view('contato.index', ['contato' => $contato]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('contato.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'cpf' => 'nullable|required|string|',
            'cel' => 'nullable|required|string|' 
        ]);

        $contato = new Contato;
        $contato->user_id = $request->user_id;
        $contato->cpf = $request->cpf;
        $contato->cel = $request->cel;
        $contato->save();

        return redirect('home')->with('status', 'inserido com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contato = Contato::find($id);

        return view('contato.show', ['contato' => $contato]);
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
            'cpf' => 'required',
            'cel' => 'required',
        ]);

        $contato = Contato::findOrFail($id);
        $contato->user_id;
        $contato->cpf = $request->cpf;
        $contato->cel = $request->cel;
        $contato->save();

        return redirect('home')->with('status', 'Alterado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = Contato::find($id);
        $contato->delete();

        return redirect('/contato')->with('status', 'Excluido com sucesso');
    }
}
