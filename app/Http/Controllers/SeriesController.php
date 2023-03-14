<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieFormRequest;
use App\Models\epsodio;
use App\Models\laravel_alura;
use App\Models\temporada;
use App\Repositories\SeriesRepositorio;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

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
    
        $request->session()->flash('mensagem.sucesso',"Serie {$serie->nomeSerie} inserida.");
        return redirect('/series');
    }
    public function destroy(laravel_alura $id)
    {   
        $id->delete();
        return redirect('series')->with('mensagem.sucesso',"Serie {$id->nomeSerie} removida.");
    }
    public function modificar(laravel_alura $id)
    {
        // dd($id->temporadas());
           $seriaa=$id;
        // dd($seriaa);
        return view('series.edit',['seria'=>$seriaa]);
    }
    public function update(Request $request,laravel_alura $id)
    {   
        // $novonome=$request->input('nomeSerie');
        // dd($request->input());
        // $id->nomeSerie=$novonome;
        $id->fill($request->input());
        $id->save();
        return redirect('/series')->with('mensagem.sucesso',"Serie {$id->nomeSerie} modificada.");
    }
}