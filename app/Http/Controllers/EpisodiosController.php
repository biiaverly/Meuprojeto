<?php

namespace App\Http\Controllers;

use App\Models\epsodio;
use App\Models\laravel_alura;
use App\Models\temporada;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

use function GuzzleHttp\Promise\all;

class EpisodiosController extends Controller
{
    public function index(temporada $temporada)
    {   
        return view('Episodios.index',['temporada'=>$temporada]);
    }   

    public function update(Request $request,temporada $temporada)
    {
        // dd($request->all());
        $ep_assistido=$request->episodios;
        $temporada->episodios->each(function(epsodio $episodio) use ($ep_assistido)
        {
            $episodio->assistido=in_array($episodio->id,$ep_assistido);
            // $episodio->save();
        });  
        $temporada->push();    

        return to_route('episodios.index', $temporada->id)
            ->with('mensagem.sucesso', 'Episódios marcados como assistidos');

    }
}
