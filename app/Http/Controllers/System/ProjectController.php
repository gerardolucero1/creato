<?php

namespace App\Http\Controllers\System;

use App\User;
use App\MyList;
use App\Project;
use App\Calendar;
use App\GuestList;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use Barryvdh\DomPDF\Facade as PDF;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->get();
        return view('system.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = User::orderBy('id', 'DESC')->get();
        //dd($users);
        
        
        $usersClient = [];
        foreach ($allUsers as $user) {
            if($user->hasRole('cliente')){
                array_push($usersClient, $user);
            }
        }
        
        $fullUsers = collect($usersClient);
        $users = $fullUsers->pluck('name', 'id');
        //dd($users);
        
        return view('system.projects.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {

        $project = Project::create($request->all());

        // Store in AWS S3
        if($archivo = $request->file('banner')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $project->fill(['banner' => asset($url.$path)])->save();
        }

        // Obtenemos el proyecto creado
        $project = Project::orderBy('id', 'DESC')->first();

        $calendar = new Calendar();
        $calendar->eventName = $project->title;
        $calendar->startDate = $project->date;
        $calendar->endDate = $project->date;
        $calendar->type = 'BODA';
        $calendar->save();

        // Creamos la lista de invitados asociada al proyecto que acacabamos de crear
        $guestList = new GuestList();
        $guestList->project_id = $project->id;
        $guestList->name = 'Lista de '. $project->title;
        $guestList->save();        

        return redirect()->route('projects.edit', $project->id)
            ->with('info', 'Proyecto creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('system.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $allUsers = User::orderBy('id', 'DESC')->get();
        //dd($users);
        
        
        $usersClient = [];
        foreach ($allUsers as $user) {
            if($user->hasRole('cliente')){
                array_push($usersClient, $user);
            }
        }
        
        $fullUsers = collect($usersClient);
        $users = $fullUsers->pluck('name', 'id');

        return view('system.projects.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $id)
    {
        $project = Project::find($id);

        //Comprobamos que el slug no se repita pero ignoramos el slug propio
        $v = \Validator::make($request->all(), [
            'slug' => ['required', Rule::unique('projects')->ignore($project->id)],
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $project->fill($request->all())->save();
        // Banner
        if($archivo = $request->file('banner')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $project->fill(['banner' => asset($url.$path)])->save();
        }

        return redirect()->route('projects.edit', $project->id)
            ->with('info', 'Proyecto actualizado con exito');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePlans(Request $request, $id)
    {
        $project = Project::find($id);

        // Planos
        if($archivo = $request->file('plans')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $project->fill(['plans' => asset($url.$path)])->save();
        }

        return back()
            ->with('info', 'Planos cargados con exito');
    }

    public function review($id){
        $project = Project::find($id);
        return view('system.projects.review', compact('project'));
    }

    public function pdf($id){
        $project = Project::find($id);
        $pdf = PDF::loadView('system.projects.PDF.guestList', compact('project'));
        return $pdf->stream();
    }
}
