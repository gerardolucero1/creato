<?php

namespace App\Http\Controllers\system;

use App\Task;
use App\User;
use App\ListTask;
use App\BlockList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlocktaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $block = BlockList::orderBy('id', 'DESC')->get();
        return $block;*/
        
            return view('system.task.block');
        
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

        if($request->copiar){
            $bloque = BlockList::find(1);
            $bloque_1 = BlockList::create($request->all());

            foreach ($bloque->lists_task as $list) {
                $new_list = new ListTask();
                $new_list->blockList_id = $bloque_1->id;
                $new_list->slug = $list->slug;
                $new_list->name = $list->name;
                $new_list->save();

                    foreach ($list->tasks as $task) {
                        $new_task = new Task();
                        $new_task->listTask_id = $new_list->id;
                        $new_task->name = $task->name;
                        $new_task->slug = $task->slug;
                        $new_task->category = $task->category;
                        $new_task->complete = $task->complete;
                        $new_task->save();
                    }

            }
        }else{
            $block = BlockList::create($request->all());
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
        $block = BlockList::find($id);
        $block->fill($request->all())->save();
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
        $block = BLockList::find($id);
        $block->delete();
        return;
    }

    public function getBlock(){
        $blocks = BlockList::with('user')->with('lists_task')->orderBy('id', 'DESC')->get();
        $tasks = Task::all();

        $data = [$blocks, $tasks];
        return $data;
    }

    public function getUsers(){
        $allUsers = User::orderBy('id', 'DESC')->get();
        //dd($users);
        
        
        $usersClient = [];
        foreach ($allUsers as $user) {
            if($user->hasRole('cliente')){
                array_push($usersClient, $user);
            }
        }
        
        $users = collect($usersClient);

        return $users;
    }
}
