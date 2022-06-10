<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LogController;

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

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//log
Route::get('/log/add', function () {
    $animals = App\Models\Animal::all();
    return view('createLog', compact('animals'));
})->middleware(['auth'])->name('addLog');

Route::post('/logs',[LogController::class,'store'])->middleware(['auth'])->name('addLog');


//AnimalController
Route::get('/animals',[AnimalController::class,'showAll'])->middleware(['auth'])->name('animals');
Route::get('/animal/{id}',[AnimalController::class,'showAnimal'])->middleware(['auth']);
Route::get('/dashboard',[AnimalController::class,'showAll'])->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';


