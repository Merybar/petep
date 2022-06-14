<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicationController extends Controller
{
    //

    public function store(Request $request) {
        //return request();
        $medications = request()->validate(
            ['name' => 'required',
             'price' => 'required', 
             'quantity' => 'required', 
             'description' => 'required',
        ]); 

        return view($medications);
    }

}
