<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class redirectTo extends Controller
{
    public function __invoke()
    {
        return view('/cars.index');

    }
}
