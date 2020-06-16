<?php

namespace App\Http\Controllers\System;

use App\User;
use App\Guest;
use App\MyList;
use App\Project;
use App\Calendar;
use App\Companion;
use App\GuestList;
use Carbon\Carbon;
use App\NumberTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

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
        $allUsers = User::orderBy('id', 'DESC')->where('active', 1)->get();
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
        $guestList->image_size = 30;
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
        //dd($project->user->name);
        $allUsers = User::orderBy('id', 'DESC')->where('active', 1)->get();        
        
        $usersClient = [];
        foreach ($allUsers as $user) {
            if($user->hasRole('cliente')){
                array_push($usersClient, $user);
            }
        }
        
        $fullUsers = collect($usersClient);
        $users = $fullUsers->pluck('name', 'id');
        unset($users[$project->user->id]);
        //dd($users);
        return view('system.projects.show', compact('project', 'users'));
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
        $allUsers = User::orderBy('id', 'DESC')->where('active', 1)->get();
        // dd($users);
        
        
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
    public function destroy(Request $request, $id)
    {
        $project = Project::find($id);
        $project->finished = $request->type;
        $project->save();
        return back();
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
        if(is_null($request->tableNumber) || $request->tableNumber == 0){
            return back()->withError('El numero de mesas debe ser mayor a 1');
        }

        if($request->tableNumber > 100){
            return back()->withError('El numero de mesas no puede ser mayor a 100');
        }

        $counter = $request->tableNumber;

        $project = Project::find($id);

        $input  = array('image' => Input::file('plans'));
        $reglas = array('image' => 'mimes:jpeg,png');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Planos
        if($archivo = $request->file('plans')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $project->fill(['plans' => asset($url.$path)])->save();
        }

        NumberTable::where('project_id', $project->id)->delete();
        do{
            $table = new NumberTable();
            $table->project_id = $project->id;
            $table->name = $counter;
            $table->number = $counter;
            $table->save();

            $counter--;
        }while ($counter > 0);
            
        

        return back()
            ->with('info', 'Planos y mesas cargados con exito');
    }

    public function review($id){
        $project = Project::find($id);
        return view('system.projects.review', compact('project'));
    }

    public function pdf(Request $request){
        $project = Project::find($request->project_id);
        $options = $request->options;

        $pdf = PDF::loadView('system.projects.PDF.guestList', compact('project', 'options'));
        return $pdf->stream();
    }

    public function copyList(Request $request){
        try{
            $user = User::find($request->client_id);

            if(is_null($user)){
                return back()->withError('Selecciona un nombre de la lista');
            }

            $project = Project::find($request->project_id);

            Guest::where('guestList_id', $project->list->id)->delete();

            foreach ($user->project->list->guests as $guest) {
                $new_guest = new Guest();
                $new_guest->guestList_id = $project->list->id;
                $new_guest->name = $guest->name;
                $new_guest->lastName = $guest->lastName;
                $new_guest->secondLastName = $guest->secondLastName;
                $new_guest->genere = $guest->genere;
                $new_guest->email = $guest->email;
                $new_guest->phone = $guest->phone;
                $new_guest->guests = $guest->guests;
                $new_guest->dataX = null;
                $new_guest->dataY = null;
                $new_guest->seated = null;
                $new_guest->status = 'PENDIENTE';
                $new_guest->origin = $guest->origin;
                $new_guest->tableName = null;
                $new_guest->save();

                    foreach ($guest->companions as $companion) {
                        $new_companion = new Companion();
                        $new_companion->guest_id = $new_guest->id;
                        $new_companion->name = $companion->name;
                        $new_companion->lastName = $companion->lastName;
                        $new_companion->secondLastName = $companion->secondLastName;
                        $new_companion->genere = $companion->genere;
                        $new_companion->email = $companion->email;
                        $new_companion->phone = $companion->phone;
                        $new_companion->dataX = null;
                        $new_companion->dataY = null;
                        $new_companion->seated = null;
                        $new_companion->status = 'PENDIENTE';
                        $new_companion->tableName = null;
                        $new_companion->save();
                    }

            }
        }catch(\Exception $th){
            return back()->withError('Selecciona un nombre de la lista');
        }
        

        return back()->with('success', 'Se ha copiado la lista de invitados con exito');
    }

    // obtener fecha de evento para cliente
    public function clientEvent($id)
    {
        $event = Project::where('client_id', $id)->get();
        return $event;
    }

    // obtener evento mas reciente
    public function next()
    {
        $now = Carbon::now();
        $project = Project::orderBy('date', 'ASC')->where('date', '>=', $now)->first();
        return $project;
    }

    public function mesasEditorIndex($id)
    {
        $project = Project::find($id);
        return view('system.projects.mesasEditor', compact('project'));
    }

    public function mesasEditorShow($id)
    {
        $tables = NumberTable::where('project_id', $id)->get();
        return $tables;
    }

    public function mesasEditorUpdate(Request $request)
    {
        $data = json_decode(file_get_contents("php://input"));

        $table = NumberTable::where('id', $data->id)->first();
        $table->capability = $data->value;
        $table->save();
        
        return;
    }
}
