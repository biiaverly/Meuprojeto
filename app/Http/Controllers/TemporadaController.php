<?php

namespace App\Http\Controllers;

use App\Models\laravel_alura;
use App\Models\temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    public function index(laravel_alura $serie)
    {
        foreach($serie->temporadas as $temporada)
        {
            // dd($serie->temporadas,$temporada,$serie);
        }
        return view('temporadas.index',['serie'=>$serie]);
    }
}