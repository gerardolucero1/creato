<?php

namespace App\Http\Controllers\System;

use App\Guest;
use App\Companion;
use App\GuestList;
use App\NumberTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Config;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::find(1);
        return view('system.client.tables.index', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->tipo == 'invitado'){
            $guest = Guest::find($id);
            $guest->dataX = $request->dataX;
            $guest->dataY = $request->dataY;
            $guest->seated = $request->seated;
            $guest->save();
        }else if($request->tipo == 'acompanante'){
            $companion = Companion::find($id);
            $companion->dataX = $request->dataX;
            $companion->dataY = $request->dataY;
            $companion->seated = $request->seated;
            $companion->save();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->tipo == 'invitado'){
            $guest = Guest::with('companions')->find($id);
                $table = NumberTable::find($guest->tableName);
                $table->ocuped = $table->ocuped - 1;
                $table->save();
            $guest->dataX = null;
            $guest->dataY = null;
            $guest->seated = false;
            $guest->tableName = null;
            $guest->save();
                

            return $guest;
        }else if($request->tipo == 'acompanante'){
            $companion = Companion::find($id);
                $table = NumberTable::find($companion->tableName);
                $table->ocuped = $table->ocuped - 1;
                $table->save();
            $companion->dataX = null;
            $companion->dataY = null;
            $companion->seated = false;
            $companion->tableName = null;
            $companion->save();
                

            return $companion;
        }
    }

    public function invitados()
    {
        $user = Auth::user();
        return $guests = Guest::orderBy('id', 'DESC')->where('guestList_id', $user->project->list->id)
                ->where('status', 'CONFIRMADO')
                ->with('companions')
                ->get();
    }

    public function project()
    {
        $user = Auth::user();

        return $user->project;
    }

    public function asignarMesa(Request $request, $id){
        $table = NumberTable::find($request->tableId);
        $table->ocuped = $table->ocuped + 1;
        $table->save();

        if($request->tipo == 'invitado'){
            $guest = Guest::with('companions')->find($id);
                if (!is_null($guest->tableName)) {
                    $oldTable = NumberTable::find($guest->tableName);
                    $oldTable->ocuped = $oldTable->ocuped - 1;
                    $oldTable->save();
                }
                
            $guest->tableName = $table->id;
            $guest->save();

            return $guest;
        }else if($request->tipo == 'acompanante'){
            $companion = Companion::find($id);
                if (!is_null($companion->tableName)) {
                    $oldTable = NumberTable::find($companion->tableName);
                    $oldTable->ocuped = $oldTable->ocuped - 1;
                    $oldTable->save();
                }
                
            $companion->tableName = $table->id;
            $companion->save();

            return $companion;
        }
    }

    public function guardarTamano(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"));
        $user = Auth::user();
        
        $guestList = GuestList::find($user->project->list->id);
        $guestList->image_size = $data->size;
        $guestList->save();
        return;
    }

    public function obtenerTamano()
    {
        $user = Auth::user();
        
        $guestList = GuestList::find($user->project->list->id);
        return $guestList->image_size;
    }

    public function obtenerMesas()
    {
        $user = Auth::user();
        return $user->project->tables;
    }

    public function deleteTable(Request $request)
    {
        
        $data = json_decode(file_get_contents("php://input"));
        foreach ($data as $table){
            $table = NumberTable::find($table);
            $table->delete();
        }
        
    }

}
