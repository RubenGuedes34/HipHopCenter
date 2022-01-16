<?php

namespace Database\Seeders;
use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbunsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = [
            [
                'id' => 2,
                'nome' => 'Illmatic',
                'Likes'=> 33,
                'id_artista' => 1,
                'capa' => 'illmatic.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 1,
                'nome' => 'Kanye West Best Songs',
                'Likes'=> 89,
                'id_artista' => 2,
                'capa' => 'kanye.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nome' => 'Maria Leal Hit Songs',
                'Likes'=> 1,
                'id_artista' => 3,
                'capa' => 'maria.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nome' => '20 anos de Tony Carreira',
                'Likes'=> 3333,
                'id_artista' => 4,
                'capa' => 'tony.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nome' => 'Rock Xutos',
                'Likes'=> 89,
                'id_artista' => 5,
                'capa' => 'xutos.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nome' => 'Real Slim Shady',
                'Likes'=> 89,
                'id_artista' => 6,
                'capa' => 'ddd.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nome' => 'Rip 2pac',
                'Likes'=> 333,
                'id_artista' => 7,
                'capa' => '2pac.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nome' => 'The Notorious',
                'Likes'=> 89,
                'id_artista' => 8,
                'capa' => 'big.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'nome' => 'Enter the Wu-Tang Clan',
                'Likes'=> 500000,
                'id_artista' => 9,
                'capa' => 'enterthewutang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];
        Album::insert($albums);
    }
}
