<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIDs = DB::table('users')->pluck('id');

        return [
            'title' => Str::random(10),
            'description' => Str::random(10),
            'user_id' => $this->faker->randomElement($userIDs),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
