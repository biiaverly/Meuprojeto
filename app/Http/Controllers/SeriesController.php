<?php

namespace App\Http\Controllers;

use App\Models\laravel_alura;
use App\Models\temporada;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        //ordenado dentro do modelo
        $series= laravel_alura::query()->get(['*']);
        // $series=laravel_alura::with('temporadas')->get();
        // dd($series);
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');

        return view('series.index')->with('series',$series)->with('mensagemSucesso',$mensagemSucesso); 

    }

    public function create()
    {
        return view('series.create');

    }
    public function store(Request $request)
    {   
        // dd(laravel_alura::query()->get(['*']));
        $seriejson=laravel_alura::create($request->all());
        // dd($request->episodiosqt);
        $serie=$seriejson->nomeSerie;

        for ($i=1; $i < $request->numerotemp; $i++) 
        { 
            $temporada=$seriejson->temporadas()->create([
                'id'=>$i
            ]);      
        }

        for ($j=1; $j < $request->numerotemp; $j++) 
        { 
            $episodios=$temporada->episodio()->create([
                'id'=>$j
            ]);      
        }
    
        $request->session()->flash('mensagem.sucesso',"Serie {$serie} inserida.");
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