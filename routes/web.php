<?php

use Illuminate\Support\Facades\Route;
use App\Models\Animal;
use App\Models\Medication;
use App\Models\Log;
use Barryvdh\DomPDF\Facade as PDF;
use TCG\Voyager\Voyager;

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

Route::get('/test', function () {
$eager = Animal::with('breed')->get();
dd($eager);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/AddAnimal', function () {
    return view('AddAnimal');
});

Route::post('/AddAnimal',[AnimalController::class,'store']);


Route::get('/AddMedication', function () {
    return view('AddMedication');
});

Route::post('/AddMedication',[MedicationController::class,'store']);

Route::get('/AddMedication', function () {
    $Animals = App\Models\Medication::all();
    return view('AddMedication');
});



Route::get('/Animal', function () {
    $Animals = App\Models\Animal::all();
    
    return view('Animal',compact('Animals'));
});

Route::get('Animalpdf/{id}', function ($id) {
    $animal = Animal::where('id', $id)->first();

    $logs = Log::with('medication')->where('animal_id',$id)->get(); 


    $pdf = PDF::loadView('Animalpdf',compact('animal', 'logs'));
    return $pdf->download('animal'.$id.'.pdf');


})->middleware('auth');


//log
Route::get('/log/add', function () {
    $animals = App\Models\Animal::all();
    $medications = App\Models\Medication:: get();
    //dd($medications);
    return view('createLog', compact('animals','medications'));
})->middleware(['auth'])->name('addLog');

Route::post('/logs',[LogController::class,'store'])->middleware(['auth'])->name('addLog');


//AnimalController
Route::get('/animals',[AnimalController::class,'showAll'])->middleware(['auth'])->name('animals');
Route::get('/animal/{id}',[AnimalController::class,'showAnimal'])->middleware(['auth']);
Route::get('/dashboard',[AnimalController::class,'showAll'])->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';


