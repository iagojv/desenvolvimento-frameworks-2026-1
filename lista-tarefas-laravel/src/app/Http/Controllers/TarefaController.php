<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::latest()->get();
        return view('tarefas.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        return view('tarefas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:80'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', 'in:pendente,fazendo,finalizado'],
            'categoria_id' => ['nullable', 'exists:categorias,id'],
        ]);

        Tarefa::create($dados);

        return redirect()->route('tarefas.index')->with('ok', 'Tarefa criada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefas.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        $categorias = \App\Models\Categoria::all();
        return view('tarefas.edit', compact('tarefa', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:80'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', 'in:pendente,fazendo,finalizada'],
            'categoria_id' => ['nullable', 'exists:categorias,id'],
        ]);

        $tarefa->update($dados);

        return redirect()->route('tarefas.index')->with('ok', 'Tarefa atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('ok', 'Tarefa removida!');
    }
}
