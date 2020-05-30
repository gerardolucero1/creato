<?php

namespace App\Http\Controllers\system;

use App\Evidence;
use App\AdminList;
use App\AdminTask;
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
        $listTask = AdminList::with('project')->find($id);
        return view('system.projects.task.index', compact('listTask'));
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
        $listTask = AdminList::find($id);
        $listTask->name = $request->name;
        $listTask->category = $request->category;
        $listTask->save();
        // $listtask->fill($request->all())->save();
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
    
    public function getTasks($id){
        $tasks = AdminTask::where('admin_list',$id)->get();
        return $tasks;

    }

    public function showTasks($id)
    {
        $task = AdminTask::find($id);
        return view('system.projects.task.show', compact('task'));
    }

    public function storeTasks(Request $request){
        $task = AdminTask::create($request->all());
        return;
    }

    public function completeTasks(Request $request, $id){
        $task = AdminTask::find($id);
        $task->fill($request->all())->save();
        return;

    }

    public function destroyTasks($id)
    {
        $task = AdminTask::find($id);
        $task->delete();
        return;
    }

    public function taskGalleryStore(Request $request, $id)
    {

        if($archivo = $request->file('file')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

        }

        $evidence = new Evidence();
        $evidence->adminTask_id = $id;
        $evidence->fill(['image' => asset($url.$path)])->save();
        
        return back()
        ->with('info', 'Fotos cargadas con exito');
      
    }
    
}
