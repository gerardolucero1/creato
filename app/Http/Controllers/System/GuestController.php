<?php

namespace App\Http\Controllers\System;

use App\User;
use App\Guest;
use App\GuestList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        return view('system.client.guests.index', compact('user'));
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

}
