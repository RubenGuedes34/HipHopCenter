<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'id_lastAlbum' => null,
            'id_lastPlaylist' => null,
            'email_verified_at' => now(),
            'type' => 0,
            'active_status' => 0,
            'avatar'=> 'chatify.user_avatar.default',
            'dark_mode' => 0,
            'messenger_color' => '#2180f3',
            'password' => Hash::make('12345678'), // password
            'remember_token' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
