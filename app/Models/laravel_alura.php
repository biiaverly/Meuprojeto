<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laravel_alura extends Model
{
    use HasFactory;
    protected $table="laravel_alura";
    protected $fillable = ['nomeSerie'];

    public function temporadas()
    {
        return $this->hasMany(temporada::class,'series_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered',function(Builder $querybuilder){
        $querybuilder->orderby('nomeSerie');
        });        
    }
    
}
