<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([GenerosSeeder::class],);
        $this->call([ArtistsSeeder::class],);
        $this->call([AlbunsSeeder::class],);
        $this->call([MusicasSeeder::class],); 
        $this->call([UsersSeeder::class],);
        $this->call([PlaylistsSeeder::class],);
        \App\Models\User::factory(100)->create();
    }
}
