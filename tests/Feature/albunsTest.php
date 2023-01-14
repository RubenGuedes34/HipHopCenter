<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Album;

class albuns extends TestCase
{

    public function testAlbumExists(){
        $this->assertDatabaseHas(Album::class, ['nome' => 'The Notorious']);
    }

    public function test_editAlbum(){
        //$album->nome = "Maria Leal Hit Songs";
        $album = Album::find(3);
        $album->Likes = 2;
        $album->save();
        $this->assertDatabaseHas(Album::class, ['nome' => 'Maria Leal Hit Songs']);
    }


}