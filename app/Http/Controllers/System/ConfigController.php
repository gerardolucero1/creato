<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $config = Config::find(1);
        return view('system.config.index', compact('config'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('dashboard'));
        $reglas = array('image' => 'mimes:jpeg,png');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('dashboard')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['dashboard' => asset($url.$path)])->save();
        }
            
        

        return back();

        
        
    }

    public function bienvenido(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('welcome'));
        $reglas = array('image' => 'mimes:jpeg,png');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('welcome')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['welcome' => asset($url.$path)])->save();
        }

        return back();
    }

    public function mesas(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('tables'));
        $reglas = array('image' => 'mimes:jpeg,png');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('tables')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['tables' => asset($url.$path)])->save();
        }

        return back();
    }

    public function imgIndex(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('index'));
        $reglas = array('image' => 'mimes:jpeg,png,webp');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('index')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['index' => asset($url.$path)])->save();
        }

        return back();
    }

    public function nosotros1(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('nosotros1'));
        $reglas = array('image' => 'mimes:jpeg,png,webp');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('nosotros1')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['nosotros1' => asset($url.$path)])->save();
        }

        return back();
    }

    public function nosotros2(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('nosotros2'));
        $reglas = array('image' => 'mimes:jpeg,png,webp');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('nosotros2')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['nosotros2' => asset($url.$path)])->save();
        }

        return back();
    }

    public function nosotros3(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('nosotros3'));
        $reglas = array('image' => 'mimes:jpeg,png,webp');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('nosotros3')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['nosotros3' => asset($url.$path)])->save();
        }

        return back();
    }

    public function nosotros4(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('nosotros4'));
        $reglas = array('image' => 'mimes:jpeg,png,webp');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('nosotros4')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['nosotros4' => asset($url.$path)])->save();
        }

        return back();
    }

    public function contacto(Request $request, $id)
    {
        $config = Config::find($id);
        //Nombre del input
        $input  = array('image' => Input::file('contact'));
        $reglas = array('image' => 'mimes:jpeg,png,webp');

        $v = \Validator::make($input,  $reglas);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Imagen Dashboard
        if($archivo = $request->file('contact')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $config->fill(['contact' => asset($url.$path)])->save();
        }

        return back();
    }

    public function color(Request $request, $id)
    {
        $config = Config::find($id);
        $config->color= $request->color;

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexImagen()
    {
        $config = Config::find(1);
        return compact('config');
    }
}
