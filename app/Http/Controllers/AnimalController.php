<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function showAll()
    {
        $result = Animal::get();
        //dd($result);
        return view('animals',['animals' => $result]);
    }

    public function showAnimal($id){
        $result = Animal::where('id', $id)->first();
        //dd($result);
        return view('animal',['animal' => $result]);
    }
}
