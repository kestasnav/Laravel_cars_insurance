<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners=Owner::all();
        return view("owners.index",['owners'=>$owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
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
            'name' => 'required|min:2|max:16',
            'surname' => 'required|min:2|max:16',
            'email' => 'required|unique:owners|max:24|email:rfc,dns',
        ], [
            'name.required' => 'Vardas privalomas',
            'name.min' => 'Vardas negali būti trumpesnis, nei 2 simboliai',
            'name.max' => 'Vardas negali būti ilgesnis, nei 16 simbolių',
            'surname.required' => 'Pavardė privaloma',
            'surname.max' => 'Pavardė negali būti trumpesnė, nei 2 simboliai',
            'surname.max' => 'Pavardė negali būti ilgesnė, nei 16 simbolių',
            'email.required' => 'Elektroninis paštas privalomas',
            'email.unique' => 'Toks elektroninis paštas jau panaudotas',
            'email.max' => 'Elektroninis paštas negali būti ilgesnis, nei 24 simboliai',
        ]);
        $owner = new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->email=$request->email;
        $owner->save();
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.update', ['owner'=>$owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => 'required|min:2|max:16',
            'surname' => 'required|min:2|max:16',
            'email' => 'required|unique:owners|max:24|email:rfc,dns',
        ], [
                'name.required' => 'Vardas privalomas',
                'name.min' => 'Vardas negali būti trumpesnis, nei 2 simboliai',
                'name.max' => 'Vardas negali būti ilgesnis, nei 16 simbolių',
                'surname.required' => 'Pavardė privaloma',
                'surname.max' => 'Pavardė negali būti trumpesnė, nei 2 simboliai',
                'surname.max' => 'Pavardė negali būti ilgesnė, nei 16 simbolių',
                'email.required' => 'Elektroninis paštas privalomas',
                'email.unique' => 'Toks elektroninis paštas jau panaudotas',
                'email.max' => 'Elektroninis paštas negali būti ilgesnis, nei 24 simboliai',
            ]
        );
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->email=$request->email;
        $owner->save();
        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
