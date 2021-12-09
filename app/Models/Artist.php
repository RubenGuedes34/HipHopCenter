<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'Data_de_nascimento', 'Likes',
    ];


    public function musicas()
    {
        return $this->hasMany(Musica::class, 'id_artista', 'id');
    }

    public function albuns()
    {
        return $this->hasMany(Album::class, 'id_artista', 'id');
    }

}
