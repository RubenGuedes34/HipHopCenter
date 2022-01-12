<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    
    ];




    public function musicas()
    {
        return $this->hasMany(Musica::class, 'id_genero', 'id');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> edb26ad528f0a252d73399d5dcccf6309c635566
