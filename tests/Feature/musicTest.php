<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Musica;

class musics extends TestCase
{
    public function testMusicExists(){
        $this->assertDatabaseHas(Musica::class, ['nome' => 'Sonhos de menino']);
    }

    public function test_editMusica(){
        //$musica->nome = "O Homem Do Leme";
        $musica = Musica::find(17);
        $musica->Likes = 999;
        $musica->save();
        $this->assertDatabaseHas(Musica::class, ['nome' => 'O Homem Do Leme']);
    }

}