<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;
use App\Http\Middleware\Authenticate;
use App\Mail\SeriesCriadas;
use App\Models\laravel_alura;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

Route::get('/', function () {return redirect('/series');});
// Route::resource('/series',SeriesController::class)->only(['index','create','store']);
Route::controller(SeriesController::class)->group(function(){
    Route::get('/series','index')->name('home');
    Route::get('/series/create','create')->name('criar')->middleware(Authenticate::class);
    Route::post('/series/salvar','store')->name('salvar');   
    Route::post('/series/modificar/{id}','update')->name('update');
    Route::post('/series/destroy/{id}','destroy')->name('destroy');
    Route::get('/series/modificar/{id}','modificar')->name('modificar'); 
});
Route::controller(LoginController::class)->group(function()
{   
    Route::get('/login','index')->name('login');
    Route::post('/login','login')->name('entrar');
    Route::get('/logout','destroy')->name('logout');

    Route::get('/login/registar','create')->name('criarUsuario');
    Route::post('/login/registar','store')->name('salvarUsuario');
});
Route::get('/series/temporada/{serie}',[TemporadaController::class,'index'])->name('temporada.index')->middleware(Authenticate::class);
Route::get('/series/temporada/{temporada}/episodios',[EpisodiosController::class,'index'])->name('episodios.index');
Route::post('/series/temporada/{temporada}/episodios',[EpisodiosController::class,'update'])->middleware(Authenticate::class);
Route::get('/email',function(){
    return new SeriesCriadas(
        'Dark',
        1,
        5,
        10,
    );
});


