<?php

namespace App\Http\Controllers\System;

use App\Guest;
use App\Companion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('system.client.tables.index');
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
            $guest->dataX = null;
            $guest->dataY = null;
            $guest->seated = false;
            $guest->tableName = null;
            $guest->save();

            return $guest;
        }else if($request->tipo == 'acompanante'){
            $companion = Companion::find($id);
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
        if($request->tipo == 'invitado'){
            $guest = Guest::with('companions')->find($id);
            $guest->tableName = $request->tableName;
            $guest->save();

            return $guest;
        }else if($request->tipo == 'acompanante'){
            $companion = Companion::find($id);
            $companion->tableName = $request->tableName;
            $companion->save();

            return $companion;
        }
    }
}
