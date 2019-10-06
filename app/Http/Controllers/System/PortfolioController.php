<?php

namespace App\Http\Controllers\System;

use App\Portfolio;
use App\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use App\Http\Requests\PortfolioStoreRequest;
use App\Http\Requests\PortfolioUpdateRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('id', 'DESC')->get();
        return view('system.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioStoreRequest $request)
    {
        $portfolio = Portfolio::create($request->all());
        // Banner
        if($archivo = $request->file('banner')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $portfolio->fill(['banner' => asset($url.$path)])->save();
        }

        return redirect()->route('portfolio.edit', $portfolio->id)
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
        $portfolio = Portfolio::find($id);

        return view('system.portfolio.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);

        return view('system.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioUpdateRequest $request, $id)
    {
        $portfolio = Portfolio::find($id);

        //Comprobamos que el slug no se repita pero ignoramos el slug propio
        $v = \Validator::make($request->all(), [
            'slug' => ['required', Rule::unique('portfolios')->ignore($portfolio->id)],
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $portfolio->fill($request->all())->save();
        // Banner
        if($archivo = $request->file('banner')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

            $portfolio->fill(['banner' => asset($url.$path)])->save();
        }

        return redirect()->route('portfolio.edit', $portfolio->id)
            ->with('info', 'Portafolio actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();

        return redirect()->route('portfolio.index')
            ->with('info', 'Portafolio elimiando con exito');
    }

    public function upload($id, Request $request){
        if($archivo = $request->file('file')){

            $md5Name = md5_file($archivo->getRealPath());
            $guessExtension = $archivo->guessExtension();
            $path = $archivo->storeAs('creatoStudio', $md5Name.'.'.$guessExtension  ,'s3');

            $url = 'https://creato-studio.s3.us-east-2.amazonaws.com/';

        }

        $portfolioImage = new PortfolioImage();
        $portfolioImage->portfolio_id = $id;
        $portfolioImage->fill(['file_name' => asset($url.$path)])->save();
    }

    public function destroyImage($id){
        $image = PortfolioImage::find($id);
        $image->delete();

        return back();
    }
}
