<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $gallery = Gallery::where('user_id', $id)->get();
        return $gallery; 
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
    public function store(Request $request, $id)
    {
        // $input  = array('image' => Input::file('file'));
        // $reglas = array('image' => 'mimes:jpeg,png,jpg');

        // $v = \Validator::make($input,  $reglas);
 
        // if ($v->fails())
        // {
        //     return redirect()->back()->withInput()->withErrors($v->errors());
        // }

        if($archivo = $request->file('file')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

        }

        $gallery = new Gallery();
        $gallery->user_id = $id;
        $gallery->fill(['image' => asset($url.$path)])->save();
        
        return back()
        ->with('info', 'Fotos cargadas con exito');
      
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
        $imagen = Gallery::find($id);
        $imagen->delete();
        return;
    }
}
