<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;
use App\Http\Middleware\Authenticate;
use App\Models\laravel_alura;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
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
Route::get('/', function () {return redirect('/series');});
// Route::resource('/series',SeriesController::class)->only(['index','create','store']);
Route::controller(SeriesController::class)->group(function(){
    Route::get('/series','index')->name('home');
    Route::get('/series/create','create')->name('criar')->middleware(Authenticate::class);
    Route::post('/series/salvar','store')->name('salvar');    
});

Route::post('/series/modificar/{id}',[SeriesController::class,'update'])->name('update');
Route::post('/series/destroy/{id}',[SeriesController::class,'destroy'])->name('destroy');
Route::get('/series/modificar/{id}',[SeriesController::class,'modificar'])->name('modificar');

Route::get('/series/temporada/{serie}',[TemporadaController::class,'index'])->name('temporada.index')->middleware(Authenticate::class);

Route::get('/series/temporada/{temporada}/episodios',[EpisodiosController::class,'index'])->name('episodios.index');
Route::post('/series/temporada/{temporada}/episodios',[EpisodiosController::class,'update'])->middleware(Authenticate::class);

Route::controller(LoginController::class)->group(function()
{   
    Route::get('/login','index')->name('login');
    Route::post('/login','login')->name('entrar');
    Route::get('/logout','destroy')->name('logout');

    Route::get('/login/registar','create')->name('criarUsuario');
    Route::post('/login/registar','store')->name('salvarUsuario');
});


