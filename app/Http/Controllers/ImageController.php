<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image=Image::all();
        return view('images.create', ['image'=>$image]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();

        $img=$request->file('image');

        $filename=$request->car_id.'_'.rand().'.'.$img->extension();

        $image->img=$filename;
        $image->car_id=$request->car_id;

        $img->storeAs('cars',$filename);
        $image->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, Request $request)
    {
      // dd('app/cars/'.$image->img);
       // $path=storage_path('app/cars/');
     //  dd($path);
        //Storage::delete('app/cars/'.$image->img);
       // Storage::disk('s3')->delete('app/cars/'.$image->img);
//        $files = Storage::files('app/cars/');
//              dd($files);
//        if(is_file($image->img))
//        {
//            unlink(public_path('app/cars/'. $image->img));
//       // unlink(storage_path('app/cars/'.$image->img));
//        }
//        else {
//            dd( "File does not exist");
//        }
//        if(Storage::exists('app/cars/'.$image->img)){
//            Storage::delete('app/cars/'.$image->img);
//
//        }else{
//           // dd('File does not exist.');
//        }

        $image->delete();

        return redirect()->back();
    }


}
