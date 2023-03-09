<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class epsodio extends Model
{
    use HasFactory;

    public function temporada()
    {
        return $this->belongsTo(temporada::class);
    }
}
