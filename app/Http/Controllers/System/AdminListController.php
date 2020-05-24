<?php

namespace App\Http\Controllers\system;

use App\AdminList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('system.task.list');
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
        $lists = AdminList::create($request->all());
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
        $listtask = AdminList::where('project_id', $id)->get();
        return view('system.task.list')-> with ('listtask',$listtask);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listtask = AdminList::find($id);
        //form
        return $listtask;
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
        $listtask = AdminList::find($id);
        $listtask->fill($request->all())->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lists = AdminList::find($id);
        $lists->delete();
        return;
    }

    public function getLists($id){
        $listTask = AdminList::with('tasks')->orderBy('id', 'DESC')->where('project_id',$id)->get();
        return $listTask;

    }
}
