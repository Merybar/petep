<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function store(Request $request){
        $log = new Log;
        $log->weight= $request->weight;
        $log->size= $request->size;
        $log->remarks= $request->remarks;
        $log->animal_id = $request->animal;
        $log->save();
    }
}
