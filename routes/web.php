<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\SeriesController;
use App\Models\laravel_alura;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('/series');
});
// Route::resource('/series',SeriesController::class)->only(['index','create','store']);
Route::controller(SeriesController::class)->group(function(){
    Route::get('/series','index');
    Route::get('/series/create','create')->name('criar');
    Route::post('/series/salvar','store');    
});

Route::post('/series/destroy/{id}',[SeriesController::class,'destroy'])->name('destroy');
Route::post('/series/edit/{id}',[SeriesController::class,'edit'])->name('edit');


