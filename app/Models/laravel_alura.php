<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laravel_alura extends Model
{
    use HasFactory;
    protected $table="laravel_alura";
    protected $fillable = ['nomeSerie'];

    public function temporadas()
    {
        return $this->hasMany(temporada::class,'series.id');
    }

}
