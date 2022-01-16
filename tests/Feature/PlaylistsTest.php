<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class Playlists extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_createPlaylists()
    {
        $user = user::where(['id'=> 1])->first();
        $this->actingAs($user);
        $response = $this->get('/createPlaylist');

        $response->assertStatus(200);
    }
}
