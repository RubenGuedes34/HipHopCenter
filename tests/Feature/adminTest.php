<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class admin extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_AdminPageAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/adminpage');

        $response->assertStatus(200);
    }

    public function test_ManageUsersAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_ManageArtistsAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/artists');

        $response->assertStatus(200);
    }

    public function test_ManageMusicsAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/musicas');

        $response->assertStatus(200);
    }

    public function test_ManagePlaylistsAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/playlists');

        $response->assertStatus(200);
    }

    public function test_ManageAlbunsAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/albuns');

        $response->assertStatus(200);
    }

    public function test_ManageGenreAccess()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/generos');

        $response->assertStatus(200);
    }

}
