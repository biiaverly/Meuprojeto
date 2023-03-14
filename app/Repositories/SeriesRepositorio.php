<?php

namespace App\Repositories;

use App\Http\Requests\SerieFormRequest;
use App\Models\laravel_alura;

interface SeriesRepositorio
{
    public function add (SerieFormRequest $request):laravel_alura;
}


