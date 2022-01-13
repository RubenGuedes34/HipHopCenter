<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = user::where(['id'=> 4])->first();
        $this->actingAs($user);
        $response = $this->get('/homepage');

        $response->assertStatus(200);
    }

    public function test_example2Playlist()
    {
        $user = user::where(['id'=> 4])->first();
        $this->actingAs($user);
        $response = $this->get('/createPlaylist');

        $response->assertStatus(200);
    }

}
