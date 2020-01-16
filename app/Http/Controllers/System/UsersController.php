<?php

namespace App\Http\Controllers\System;

use App\User;
use App\Profile;
use App\Conversation;
use App\MyList;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('system.users.index', compact('users'));
    }

    public function clientesIndex()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('system.users.clientesIndex', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('system.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $v = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($user = User::create($request->all())){
            $user->assignRole($request->rol);
            if($request->has('password')){
                $user->password = bcrypt($request->password);
            }

            $user->save();

            $ultimoUsuario = User::orderBy('id', 'DESC')->first();

            if($ultimoUsuario->hasRole('cliente')){
                $my_list = new MyList();
                $my_list->client_id = $ultimoUsuario->id;
                $my_list->name = 'Mi primer lista';
                $my_list->order = 1;
                $my_list->category = 'GENERAL';
                $my_list->save();
            }

            $users = User::all();
            foreach ($users as $user) {
                if ($user->hasRole("super-admin")){
                    $conversation = new Conversation;
                    $conversation->user_id = $user->id;
                    $conversation->contact_id = $ultimoUsuario->id; 
                    $conversation->last_message = "primer mensaje";
                    $conversation->last_time = "2019-12-20 06:28:30";
                    $conversation->save();

                    $conversation = new Conversation;
                    $conversation->user_id = $ultimoUsuario->id;
                    $conversation->contact_id = $user->id; 
                    $conversation->save();

                }
            }

            $profile = new Profile();
            $profile->last_name = "apellido paterno";
            $profile->second_name = "apellido materno";
            $profile->photo = "http://localhost:8000/file/escanor.jpg";
            $profile->banner = "http://localhost:8000/file/banner escanor.jpg";
            $profile->description = "descripción";
            $profile->phone = "123456789";
            $profile->user_id = $ultimoUsuario->id;
            $profile->save();

            

            return redirect()->route('users.edit', $user->id)
                ->with('info', 'Usuario creado con exito');
        }
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
        $user = User::find($id);
        $roles = Role::all()->pluck('name', 'id');
        return view('system.users.edit', compact('user', 'roles'));
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
        $v = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->rol);

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('info', 'Usuario eliminado con exito');
    }
}
