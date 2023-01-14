<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Artist;

class artists extends TestCase
{
    public function testArtistExists(){
        $this->assertDatabaseHas(Artist::class, ['nome' => '2pac']);
    }

    public function test_editArtist(){
        //$artist->nome = Wu-Tang Clan";
        $artist = Artist::find(9);
        $artist->Likes = 99;
        $artist->save();
        $this->assertDatabaseHas(Artist::class, ['nome' => 'Wu-Tang Clan']);
    }

}