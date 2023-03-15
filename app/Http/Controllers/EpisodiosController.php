<?php

namespace App\Http\Controllers;

use App\Models\laravel_alura;
use App\Models\temporada;
use PhpParser\Node\Stmt\Echo_;

use function GuzzleHttp\Promise\all;

class EpisodiosController extends Controller
{
    public function index(temporada $temporada)
    {   

        return view('Episodios.index',['temporada'=>$temporada]);
    }   
}
