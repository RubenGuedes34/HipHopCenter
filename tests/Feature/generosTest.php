<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Genero;

class generos extends TestCase
{
    
    public function testGeneroExists(){
        $this->assertDatabaseHas(Genero::class, ['nome' => 'Trap']);
    }

}