<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //

    public function store(Request $request) {
        //return request();
        $animal = request()->validate(
            ['name' => 'required',
             'pettype' => 'required', 
             'breed' => 'required',
             'gender' => 'required', 
             'age' => 'required',
             'weight' => 'required',
             'size' => 'required',
             'chipnumber' => 'required',
             'insurancenumber' => 'required',
        ]); 

        return view($animal);
    }

}
