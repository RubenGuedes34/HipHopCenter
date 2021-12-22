<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome','Likes', 'path', 'duracao','id_artista','id_album','id_genero',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id');
    }

    public function artista()
    {
        return $this->belongsTo(Artist::class, 'id_artista', 'id');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id');
    }


    public function playlist()
    {
        return $this->belongsToMany(Playlist::class,'musica_playlist','id_musica','id_playlist');
    }
}

