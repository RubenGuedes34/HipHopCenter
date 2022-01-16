<?php

namespace Database\Seeders;
use App\Models\Playlist;
use Illuminate\Database\Seeder;

class PlaylistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        $playlists = [
            [
                'id' => 1,
                'nome' => 'Quem ta triste nao ta mais',
                'Likes'=> 500,
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nome' => 'Musicas para Alternas',
                'Likes'=> 500,
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nome' => 'Seferovic Playlist',
                'Likes'=> 500,
                'id_user' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];
        Playlist::insert($playlists);


    }
}
