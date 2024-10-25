<?php

namespace App\Http\Controllers\system;

use App\User;
use App\Profile;
use App\Project;
use App\ProfilePicture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Config;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::find(1);
        return view('system.users.profile.index', compact('config')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $config = Config::find(1);
     return view('system.users.profile.create', compact('config')); 
        
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
        $config = Config::find(1);
        return view('system.users.profile.edit', compact('profile', 'config'));
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
        $config = Config::find(1);
        return view('system.client.profile.index', compact('config'));
    }

    public function getProfileClient($id)
    {
        $user = User::where('id', $id)->with('profile')->first();
        $project = Project::where('client_id', $user->id)->first();

        $array = [$user, $project];
        return $array;
    }

    public function profilePicture(Request $request, $id)
    {
        $input  = array('image' => Input::file('file'));
        $reglas = array('image' => 'mimes:jpeg,png');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        if($archivo = $request->file('file')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

        }

        $profile = Profile::where('user_id', $id)->first();
        $profile->fill(['photo' => asset($url.$path)])->save();

        $profilePicture = new ProfilePicture();
        $profilePicture->user_id = $id;
        $profilePicture->fill(['image' => asset($url.$path)])->save();
        return back()
        ->with('info', 'Foto actualizada con exito');
      
    }

    public function bannerPicture(Request $request, $id)
    {
        $input  = array('image' => Input::file('file'));
        $reglas = array('image' => 'mimes:jpeg,png');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        if($archivo = $request->file('file')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

        }

        $profile = Profile::where('user_id', $id)->first();
        $profile->fill(['banner' => asset($url.$path)])->save();

        return back()
        ->with('info', 'Foto actualizada con exito');
      
    }

}
