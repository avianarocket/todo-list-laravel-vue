<?php

namespace App\Http\Controllers;

use App\Jobs\NotificarNovaTarefa;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        return Tarefa::all();
    }

    public function store(Request $request)
    {
        $tarefa = Tarefa::create($request->all());
        NotificarNovaTarefa::dispatch($tarefa);
        return $tarefa;
    }

    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($request->all());
        return $tarefa;
    }
}
