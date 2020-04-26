<?php

namespace App\Http\Controllers\system;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Project;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('system.users.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('system.users.profile.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $profile = Profile::create($request->all());
        //Imagen
        if($archivo = $request->file('file')){

            
            $nombre =  $archivo->getClientOriginalName().'.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('file/'), $nombre);
            $profile->fill(['file' => asset('file/'.$nombre)])->save();
        }

        return redirect()->route('system.users.profile.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('system.users.profile.edit', compact('profile'));
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
        $profile = Profile::where('user_id', $id)->first();
        
         //Imagen
         if($archivo = $request->file('banner')){
            
            $nombre =  $archivo->getClientOriginalName();
            $archivo->move(public_path('file/'), $nombre);
            $profile->fill(['banner' => asset('file/'.$nombre)])->save();
        }
        
        
        if($archivo = $request->file('photo')){

            $nombre =  $archivo->getClientOriginalName();
            $archivo->move(public_path('file/'), $nombre);
            $profile->fill(['photo' => asset('file/'.$nombre)])->save();
        }
        

        return view('system.users.profile.index');
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

    /* Perfil de cliente */
    public function indexClient()
    {
        
        return view('system.client.profile.index');
    }

    public function getProfileClient($id)
    {
        $user = User::where('id', $id)->with('profile')->first();
        $project = Project::where('client_id', $user->id)->first();

        $array = [$user, $project];
        return $array;
    }

    public function storeClient(Request $request, $id)
    {
        $profile = Profile::where('user_id', $id)->first();
        
        
         //Imagen
         if($archivo = $request->file('banner')){
            
            $nombre =  $archivo->getClientOriginalName();
            $archivo->move(public_path('file/'), $nombre);
            $profile->fill(['banner' => asset('file/'.$nombre)])->save();
        }
        
        
        if($archivo = $request->file('photo')){

            $nombre =  $archivo->getClientOriginalName();
            $archivo->move(public_path('file/'), $nombre);
            $profile->fill(['photo' => asset('file/'.$nombre)])->save();
        }
        
        return;
      
    }

}
