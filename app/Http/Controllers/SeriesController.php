<?php

namespace App\Http\Controllers;

use App\Models\laravel_alura;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
    //     $series =[
    //         'Lost',
    //         'How i meet your mother',
    //         'Friends'
    //     ];

    // $series= DB::select('SELECT nomeSerie FROM laravel_alura;');

        // $series= laravel_alura::all();
        // return view('series.index',[
        //     'series'=>$series
        // ]);        

        $series= laravel_alura::query()->orderBy('nomeSerie')->get();
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
        $serie=laravel_alura::create($request->all());
        $serie=$serie->nomeSerie;
        $request->session()->flash('mensagem.sucesso',"Serie {$serie} inserida.");
        return redirect('/series');
    }
    public function destroy(laravel_alura $id)
    {   
        // dd($id);
        $id->delete();
        return redirect('series')->with('mensagem.sucesso',"Serie {$id->nomeSerie} removida.");
    }
    public function modificar(laravel_alura $id)
    {   $seriaa=$id;
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