<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'Likes','id_artista',
    ];

    public function musicas()
    {
        return $this->hasMany(Musica::class, 'id_album', 'id');
    }

    public function artista()
    {
        return $this->belongsTo(Artist::class, 'id_artista', 'id');
    }
}
