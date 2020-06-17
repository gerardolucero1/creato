<?php

namespace App\Http\Controllers\System;

use App\User;
use App\Guest;
use App\GuestList;
use Illuminate\Http\Request;
use App\Imports\GuestsImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\Config;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $config = Config::find(1);
        return view('system.client.guests.index', compact('user','config'));
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
        $request = Input::json()->all();

        foreach ($request as $invitado) {
            $guest                      = new Guest();
            $guest->guestList_id        = $invitado['guestList_id'];
            $guest->name                = $invitado['name'];
            $guest->lastName            = $invitado['lastName'];
            $guest->secondLastName      = $invitado['secondLastName'];
            $guest->genere              = $invitado['genere'];
            $guest->email               = $invitado['email'];
            $guest->phone               = $invitado['phone'];
            $guest->guests              = $invitado['guests'];
            $guest->dataX               = $invitado['dataX'];
            $guest->dataY               = $invitado['dataY'];
            $guest->seated              = $invitado['seated'];
            $guest->status              = $invitado['status'];
            $guest->origin              = $invitado['origin'];
            $guest->groupName           = $invitado['groupName'];

            $guest->save();
        }
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return GuestList::where('id', $user->project->id)->with('guests')->first();
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
        $guest = Guest::find($id);
        $guest->fill($request->all())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);
        $guest->delete();
    }

    public function importExcel(Request $request){
            try {
                $file = $request->file('excel');
                Excel::import(new GuestsImport, $file);
            } catch (\ErrorException $th) {
                return back()->withError('Revisa que todos los campos esten completos. Descarga el documento de prueba.');
            } catch(\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $th){
                return back()->withError('Revisa tu documento, debe ser un excel.');
            } catch(\Illuminate\Database\QueryException $th){
                return back()->withError('Parece que intentas agregar un valor donde no corresponde.');
            } catch(\Exception $th){
                return back()->withError('Revisa tu documento.');
            }
            return back()->with('info', 'Se ha cargado el archivo con exito.');
        
    }

}
