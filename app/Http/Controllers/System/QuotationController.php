<?php

namespace App\Http\Controllers\system;

use Illuminate\Http\Request;
use app\Http\Request\QuotationStoreRequest;
use app\Http\Request\QuotationUpdateRequest;
use App\Http\Controllers\Controller;
use App\Quotation;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('system.quotation.index');
        /*
        $quotations = Quotation::orderBy('id', 'DESC')->get();
        return view('system.quotation.index', compact('quotations'));
        */
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
       // $quotation =  new Quotation();
       $quotation = Quotation::create($request->all());
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
       $quotations = Quotation::find($id);
       return $quotations;
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
        $quotation = Quotation::find($id);
        $quotation->delete();
        return back();
    }

    public function getQuotation(){

        $quotations = Quotation::all();
        return $quotations;
    }
}
