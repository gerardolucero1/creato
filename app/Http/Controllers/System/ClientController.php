<?php

namespace App\Http\Controllers\System;

use App\Task;
use App\ListTask;
use App\BlockList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(){
        return view('system.client.dashboard');
    }

    public function obtenerListas($id){
        $bloque = BlockList::where('client_id', $id)->first();
        
        $listas = ListTask::with('tasks')->orderBy('id', 'ASC')->where('blockList_id', $bloque->id)->get();
        return $listas;
    }

    public function tareas($id){
        return view('system.client.tasks.index');
    }

    public function obtenerTareas($id){
        $lista = ListTask::with('tasks')->findOrFail($id);
        return $lista;
    }
}
