<?php

use Illuminate\Support\Facades\Route;
use App\Models\Animal;
use App\Models\Medication;
use App\Models\Log;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/AddMedication', function () {
    return view('AddMedication');
});


Route::get('Animalpdf/{id}', function ($id) {
    $animal = Animal::where('id', $id)->first();

    $logs = Log::with('medication')->where('animal_id',$id)->orderBy('created_at')->get();
    $log = Log:: with('medication')->where('animal_id', '=', $animal->id)->orderBy('created_at', 'DESC')->first(); 

    $birthday = Carbon::create($animal->birthday) -> format('d F Y');
    $now = Carbon::now();
    $age = $now -> diffInMonths($birthday);
    
    if($age>11){
        $age = $now -> diffInYears($birthday);
        $age = ("{$age} years");
    }else if($age==0){
        $age = $now -> diffInDays($birthday);
        $age = ("{$age} days");
    }else{
        $age = ("{$age} moths");
    };
    

    $pdf = PDF::loadView('Animalpdf',compact('animal', 'logs', 'log', 'age'));

    return $pdf->download('animal'.$id.'.pdf');
    //dd($logs);

})->middleware('auth');


//log
Route::get('/log/add', function () {
    $animals = App\Models\Animal::all();
    $medications = App\Models\Medication:: get();
    //dd($medications);
    return view('createLog', compact('animals','medications'));
})->middleware(['auth'])->name('addLog');

Route::post('/logs',[LogController::class,'store'])->middleware(['auth'])->name('addLog');


// require __DIR__.'/auth.php';



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
