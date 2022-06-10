<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function showAll()
    {
        $animals = Animal::get();
        //$log = \App\Models\Log:: with('medication')->get()->where('animal_id','=',$animals->id);
        //dd($log);
        return view('animals' , compact('animals'));
    }
 
    public function showAnimal($id){
        $animal = \App\Models\Animal::find($id);
        $log = \App\Models\Log:: with('medication')->where('animal_id', '=', $animal->id)->orderBy('id', 'DESC')->first();
    
        //dd($result);
        return view('animal', compact('animal','log'));
    }
}
