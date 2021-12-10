<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome','Likes',
    ];



    public function musica()
    {
        return $this->belongsToMany(Musica::class);
    }
}
