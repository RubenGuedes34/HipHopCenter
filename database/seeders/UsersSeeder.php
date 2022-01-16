<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $users = [
            [
                'name' => 'Tomás',
                'email' => 'tomasoliveira1018@gmail.com',
                'id_lastAlbum' => NULL,
                'id_lastPlaylist' => NULL,
                'email_verified_at' => now(),
                'type' => 2,
                'password' =>  Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Diogo',
                'email' => 'diogo@gmail.com',
                'id_lastAlbum' => NULL,
                'id_lastPlaylist' => NULL,
                'email_verified_at' => now(),
                'type' => 2,
                'password' =>  Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Ruben',
                'email' => 'ruben@gmail.com',
                'id_lastAlbum' => NULL,
                'id_lastPlaylist' => NULL,
                'email_verified_at' => now(),
                'type' => 0,
                'password' =>  Hash::make('12345678'),
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            
            ]

        ];
        User::insert($users);

        
    }
}
