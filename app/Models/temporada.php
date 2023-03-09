<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temporada extends Model
{
    use HasFactory;

    public function episodios(){
        
        return $this->hasMany(epsodio::class);
    }

    public function serie()
    {
        return $this->belongsTo(laravel_alura::class);
    }
}
