<?php

namespace App\Http\Controllers\System;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

            $nombre = time().$archivo->getClientOriginalName();
            $archivo->move('portfolios', $nombre);
            $portfolio->fill(['banner' => asset('portfolios/'.$nombre)])->save();
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

        $portfolio->fill($request->all())->save();
        // Banner
        if($archivo = $request->file('banner')){

            $nombre = time().$archivo->getClientOriginalName();
            $archivo->move('portfolios', $nombre);
            $portfolio->fill(['banner' => asset('portfolios/'.$nombre)])->save();
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
}
