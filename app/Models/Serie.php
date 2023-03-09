<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    # Criando o relacionamento entre serie e temporada.
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }



}
