<?php

namespace App\Http\Controllers\System;

use App\Group;
use App\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $groups = Group::where('user_id', $id)->get();
        return $groups;
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
        $data = json_decode(file_get_contents("php://input"));
        
        $group = new Group();
        $group->user_id = Auth::user()->id;
        $group->name = $data->nombre;
        $group->save();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getGroup(Request $request){
        $data = json_decode(file_get_contents("php://input"));
        $user = Auth::user();

        return $guests = Guest::orderBy('id', 'DESC')->where('guestList_id', $user->project->list->id)
            ->where('status', 'CONFIRMADO')
            ->where('groupName', $data->nombre)
            ->with('companions')
            ->get();


        
    }
}
