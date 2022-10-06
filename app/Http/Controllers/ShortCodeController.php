<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shorts=ShortCode::all();
        return view("shorts.index",['shorts'=>$shorts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shorts=ShortCode::all();
        return view('shorts.create', ['shorts'=>$shorts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shortcode' => 'required|unique:short_codes',
            'replace' => 'required|unique:short_codes',
        ],
            [
                'shortcode.required' => 'Valstybinis numeris privalomas',
                'replace.required' => 'Valstybinis numeris negali būti trumpesnis, nei 2 simboliai',

            ]);
        $shorts = new ShortCode();
        $shorts->shortcode=$request->shortcode;
        $shorts->replace=$request->replace;

        $shorts->save();
        return redirect()->route('shorts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function show(ShortCode $shortCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function edit( $shortCode)    {
        $shortCode=ShortCode::find($shortCode);

        return view('shorts.update', ['shortCode'=>$shortCode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $shortCode)
    {
        $shortCode=ShortCode::find($shortCode);
        $shortCode->shortcode=$request->shortcode;
        $shortCode->replace=$request->replace;

        $shortCode->save();
        return redirect()->route('shorts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function destroy( $shortCode)
    {
        $shortCode=ShortCode::find($shortCode);
        $shortCode->delete();
        return redirect()->route('shorts.index');
    }
}
