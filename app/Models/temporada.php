<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temporada extends Model
{
    use HasFactory;
    protected $fillable = ['id'];


    public function episodios(){
        
        return $this->hasMany(epsodio::class,'idtemp','id');
    }

    public function serie()
    {
        return $this->belongsTo(laravel_alura::class);
    }
}
