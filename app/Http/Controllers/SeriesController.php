<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieFormRequest;
use App\Mail\SeriesCriadas;
use App\Models\epsodio;
use App\Models\laravel_alura;
use App\Models\temporada;
use App\Models\User;
use App\Repositories\SeriesRepositorio;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use function GuzzleHttp\Promise\all;
use function GuzzleHttp\Promise\each;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series= laravel_alura::query()->get(['*']);
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');
        return view('series.index')->with('series',$series)->with('mensagemSucesso',$mensagemSucesso); 
    }
    public function create()
    {
        return view('series.create');
    }
    public function store(SerieFormRequest $request,SeriesRepositorio $repositorio)
    {   
        $serie= $repositorio->add($request);   

        $arrayUsuarios=User::all();
        foreach($arrayUsuarios as $usuario)
        {
            $email= new SeriesCriadas(
                $serie->nomeSerie,
                $serie->id,
                $request->temporadaqt,
                $request->episodiosqt
            );
            Mail::to($usuario)->queue($email);
            // $when=now()->addSeconds(2);
            // Mail::to($user)->later($when,$email);
        }
        $request->session()->flash('mensagem.sucesso',"Serie {$serie->nomeSerie} inserida.");
        return redirect('/series');
    }
    public function destroy(laravel_alura $id)
    {   
        $id->delete();
        return redirect('/series')->with('mensagem.sucesso',"Serie {$id->nomeSerie} removida.");
    }
    public function modificar(laravel_alura $id)
    {
        $seriaa=$id;
        return view('series.edit',['seria'=>$seriaa]);
    }
    public function update(Request $request,laravel_alura $id)
    {   
        $id->fill($request->input());
        $id->save();
        return redirect('/series')->with('mensagem.sucesso',"Serie {$id->nomeSerie} modificada.");
    }
}