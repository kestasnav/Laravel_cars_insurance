<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners=Owner::all();
        $cars=Car::all();
        return view("cars.index",['cars'=>$cars, 'owners'=>$owners]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=Owner::all();
        return view('cars.create', ['owners'=>$owners]);

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
            'reg_number' => 'required|min:2|max:6|unique:cars',
            'brand' => 'required|min:2|max:16',
            'model' => 'required|min:2|max:16',
            'owner_id' => 'required',
        ],
        [
            'reg_number.required' => 'Valstybinis numeris privalomas',
            'reg_number.min' => 'Valstybinis numeris negali būti trumpesnis, nei 2 simboliai',
            'reg_number.max' => 'Valstybinis numeris negali būti ilgesnis, nei 6 simboliai',
            'reg_number.unique' => 'Toks valstybinis numeris, jau egzistuoja',
            'brand.required' => 'Automobilio markė privaloma',
            'brand.min' => 'Automobilio markės pavadinimas, negali būti trumpesnis, nei 2 simboliai',
            'brand.max' => 'Automobilio markės pavadinimas, negali būti ilgesnis, nei 16 simbolių',
            'model.required' => 'Automobilio modelis privalomas',
            'model.min' => 'Automobilio modelio pavadinimas, negali būti trumpesnis, nei 2 simboliai',
            'model.max' => 'Automobilio modelio pavadinimas, negali būti ilgesnis, nei 16 simbolių',
            'owner_id.required' => 'Automobilio savininkas privalomas',
        ]);
        $car = new Car();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $owners=Owner::all();
        return view('cars.update', ['car'=>$car, 'owners'=>$owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'reg_number' => 'required|digits|min:2|max:6|unique:cars',
            'brand' => 'required|min:2|max:16',
            'model' => 'required|min:2|max:16',
            'owner_id' => 'required',
        ],
            [
                'reg_number.required' => 'Valstybinis numeris privalomas',
                'reg_number.min' => 'Valstybinis numeris negali būti trumpesnis, nei 2 simboliai',
                'reg_number.max' => 'Valstybinis numeris negali būti ilgesnis, nei 6 simboliai',
                'reg_number.unique' => 'Toks valstybinis numeris, jau egzistuoja',
                'brand.required' => 'Automobilio markė privaloma',
                'brand.min' => 'Automobilio markės pavadinimas, negali būti trumpesnis, nei 2 simboliai',
                'brand.max' => 'Automobilio markės pavadinimas, negali būti ilgesnis, nei 16 simbolių',
                'model.required' => 'Automobilio modelis privalomas',
                'model.min' => 'Automobilio modelio pavadinimas, negali būti trumpesnis, nei 2 simboliai',
                'model.max' => 'Automobilio modelio pavadinimas, negali būti ilgesnis, nei 16 simbolių',
                'owner_id.required' => 'Automobilio savininkas privalomas',
            ]
        );
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
