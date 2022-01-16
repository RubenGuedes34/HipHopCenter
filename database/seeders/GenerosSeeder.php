<?php

namespace Database\Seeders;
use App\Models\Genero;
use Illuminate\Database\Seeder;


class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $generos = [
            [
                'id' => 1,
                'nome' => 'Trap',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];
        Genero::insert($generos);



    }
}
