<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = [
            [
                'id' => 1,
                'nome' => 'Nas',
                'Data_de_nascimento' => NULL,
                'Likes'=> 332,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nome' => 'Kanye West',
                'Data_de_nascimento' => NULL,
                'Likes'=> 3233,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nome' => 'Maria Leal',
                'Data_de_nascimento' => NULL,
                'Likes'=> 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nome' => 'Tony Carreira',
                'Data_de_nascimento' => NULL,
                'Likes'=> 89,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nome' => 'Xutos & Pontapés',
                'Data_de_nascimento' => NULL,
                'Likes'=> 89,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nome' => 'Eminem',
                'Data_de_nascimento' => NULL,
                'Likes'=> 33333,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nome' => '2pac',
                'Data_de_nascimento' => NULL,
                'Likes'=> 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nome' => 'B.I.G',
                'Data_de_nascimento' => NULL,
                'Likes'=> 333,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'nome' => 'Wu-Tang Clan',
                'Data_de_nascimento' => NULL,
                'Likes'=> 89,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        Artist::insert($artists);
    }
}
