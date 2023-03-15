<?php

namespace App\Repositories;

use App\Http\Requests\SerieFormRequest;
use App\Models\epsodio;
use App\Models\laravel_alura;
use App\Models\temporada;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepositorio implements SeriesRepositorio
{
    public function add(SerieFormRequest $request): laravel_alura
    {
        return DB::transaction(function () use ($request) {
            $serie = laravel_alura::create($request->all());
            $seasons = [];
            for ($i = 1; $i <= $request->temporadaqt; $i++) {
                $seasons[] = [
                    'serieid' => $serie->id,
                    'numerotemp' => $i,
                ];
            }
            temporada::insert($seasons);
            $temporada =temporada::all();
            $episodios = [];

            foreach($temporada as $temporada)
            {
                $idtemp=$temporada->id;
                for ($j = 1; $j <= $request->episodiosqt; $j++) {
                    $episodios[] = [
                        'idtemp' =>$idtemp,
                        'numero' => $j
                    ];
                }
            }
            epsodio::insert($episodios);


            return $serie;
        });
    }
}



